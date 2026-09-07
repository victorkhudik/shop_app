export const placeOrder = async ({productId, navigate}) => {
    const response = await fetch('/api/v1/sales/orders', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        body: JSON.stringify({
            product_id: productId
        }),
    });

    const data = await response.json();

    if (!response.ok) {
        throw new Error(data.message || 'Ошибка при оформлении заказа');
    }

    if (data.order_uuid && navigate) {
        navigate(`/orders/${data.order_uuid}`);
    }

    return data;
};