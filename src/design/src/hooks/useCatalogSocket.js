import { useEffect } from 'react';
import { echo } from '../services/echo';

export const useCatalogSocket = (setProductsState, refetchCatalog) => {
    useEffect(() => {
        const channel = echo.channel('catalog');

        const handleUpdate = (data) => {
            setProductsState((prevState) => {
                if (!prevState) return prevState;

                console.log(data);
                const updateProduct = (p) =>
                    Number(p.id) === Number(data.id)
                        ? { ...p, quantity: data.quantity, price: data.price, special_price: data.special_price }
                        : p;

                if (prevState.data && Array.isArray(prevState.data)) {
                    return {
                        ...prevState,
                        data: prevState.data.map((item) => {
                            if (item.products && Array.isArray(item.products)) {
                                return {
                                    ...item,
                                    products: item.products.map(updateProduct)
                                };
                            }

                            return updateProduct(item);
                        }),
                    };
                }

                if (Array.isArray(prevState)) {
                    return prevState.map((item) => {
                        if (item.products && Array.isArray(item.products)) {
                            return { ...item, products: item.products.map(updateProduct) };
                        }
                        return updateProduct(item);
                    });
                }

                return prevState;
            });
        };

        const handleReconnect = () => {
            console.log('Сеть восстановлена. Синхронизация данных...');
            console.log(refetchCatalog ? '1' : '0');
            if (refetchCatalog) refetchCatalog(); // Актуализируем статус через REST API
        };

        channel.listen('.product.updated', handleUpdate);
        window.addEventListener('online', handleReconnect);

        return () => {
            channel.stopListening('.product.updated', handleUpdate);
            window.removeEventListener('online', handleReconnect);
        };
    }, [setProductsState, refetchCatalog]);
};