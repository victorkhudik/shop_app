import { useEffect } from 'react';
import { echo } from '../services/echo';

export const useOrderSocket = (orderUuid, setOrderState, refetchOrder) => {
    useEffect(() => {
        if (!orderUuid) return;

        const channel = echo.channel(`order.${orderUuid}`);

        const handleOrderUpdate = (data) => {
            setOrderState((prevOrder) => {
                if (!prevOrder || prevOrder.uuid !== data.uuid) return prevOrder;

                return {
                    ...prevOrder,
                    status: data.status,
                    amount: data.amount,
                    key: data.key ?? prevOrder.key,
                };
            });
        };

        const handleReconnect = () => {
            console.log('Сеть восстановлена. Синхронизация данных...');
            if (refetchOrder) refetchOrder();
        };

        channel.listen('.order.updated', handleOrderUpdate);
        window.addEventListener('online', handleReconnect);

        return () => {
            channel.stopListening('.order.updated', handleOrderUpdate);
            window.removeEventListener('online', handleReconnect);

            echo.leaveChannel(`order.${orderUuid}`);
        };
    }, [orderUuid, setOrderState, refetchOrder]);
};