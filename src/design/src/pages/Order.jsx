import React, {useEffect, useState} from 'react';
import {useParams, Link} from 'react-router-dom';
import {getOrderInfo, payOrder, cancelOrder} from '../services/api';
import formatPrice from "../utils/formatPrice.js";
import { useOrderSocket } from '../hooks/useOrderSocket';

export default function Order() {
    const {uuid} = useParams();
    const [order, setOrder] = useState(null);
    const [timeLeft, setTimeLeft] = useState(null);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(null);
    const [isPaying, setIsPaying] = useState(false);

    const fetchOrder = async () => {
        try {
            const data = await getOrderInfo(uuid);
            setOrder(data);
        } catch (err) {
            setError(err.message);
        } finally {
            setLoading(false);
        }
    };

    const handlePay = async () => {
        setIsPaying(true);
        try {
            await payOrder(uuid);
            await fetchOrder();
        } catch (err) {
            alert(err.message);
        } finally {
            setIsPaying(false);
        }
    };

    useEffect(() => {
        fetchOrder();
    }, [uuid]);

    useOrderSocket(uuid, setOrder, fetchOrder);

    useEffect(() => {
        if (!order || order.status !== 'pending' || !order.expires_at) return;

        const interval = setInterval(() => {
            const now = new Date().getTime();
            const expirationTime = new Date(order.expires_at).getTime();
            const distance = expirationTime - now;

            if (distance <= 0) {
                cancelOrder(order.uuid);
                clearInterval(interval);
                setTimeLeft(0);
            } else {
                setTimeLeft(Math.floor(distance / 1000));
            }
        }, 1000);

        return () => clearInterval(interval);
    }, [order, uuid]);

    const formatTime = (seconds) => {
        if (seconds === null || seconds <= 0) return '00:00';
        const mins = Math.floor(seconds / 60);
        const secs = seconds % 60;
        return `${mins.toString().padStart(2, '0')}:${secs.toString().padStart(2, '0')}`;
    };

    if (loading) return <div className="container" style={{padding: '40px 0'}}>Загрузка заказа...</div>;
    if (error) return <div className="container" style={{padding: '40px 0', color: 'red'}}>Ошибка: {error}</div>;
    if (!order) return <div className="container">Заказ не найден</div>;

    return (
        <div className="container page-order" style={{padding: '20px 0'}}>
            <div className="breadcrumbs" style={{marginBottom: '20px'}}>
                <Link to="/">← На главную</Link>
            </div>

            <h1>Заказ #{order.uuid}</h1>

            {order.status === 'pending' && (
                <div className="section bg-white">
                    <h2>Товар забронирован! До окончания брони осталось:</h2>
                    <span className="timer">
                        {formatTime(timeLeft)}
                    </span>
                </div>
            )}

            <div className="section bg-white">
                <h2>Информация о товаре</h2>
                <div className="product-info">
                    <h4>{order.product.name}</h4>
                </div>

                <div className="separator"></div>
                <h2>Детали заказа</h2>
                <p><strong>Дата оформления:</strong> {order.created_at}</p>
                <p>
                    <strong>Статус: </strong>
                    <span>
                        {order.status === 'pending' ? 'Ожидает оплаты' : order.status}
                    </span>
                </p>
                {order.key && (
                    <div>
                        <h4 style={{ color: '#234e52', margin: '0 0 8px 0' }}>Ваш ключ активации:</h4>
                        <code style={{
                            display: 'inline-block',
                            padding: '8px 12px',
                            backgroundColor: '#ffffff',
                            border: '1px solid #cbd5e0',
                            borderRadius: '4px',
                            fontSize: '18px',
                            fontWeight: 'bold',
                            letterSpacing: '1px',
                            userSelect: 'all'
                        }}>
                            {order.key}
                        </code>
                    </div>
                )}

                {order.status === 'pending' && (
                    <div style={{marginTop: '24px'}}>
                        <p>
                            <strong>Сумма к оплате: {formatPrice(order.amount)}</strong>
                        </p>
                        <button
                            onClick={handlePay}
                            disabled={isPaying}
                            className="button button-pay"
                        >
                            {isPaying ? 'Обработка оплаты...' : 'Оплатить заказ'}
                        </button>
                    </div>
                )}
            </div>
        </div>
    );
}