const CATEGORIES_CACHE_KEY = 'app_categories_cache';
const POPULAR_PRODUCTS_CACHE_KEY = 'popular_products';

export const getCategories = async () => {
    return getApiData('/api/v1/categories');
};

export const getPopularProducts = async () => {
    return getApiData('/api/v1/catalog/products/popular');
}
export const getRecommendedProducts = async () => {
    return getApiData('/api/v1/catalog/products/recommended');
}

export const getOtherProducts = async () => {
    return getApiData('/api/v1/catalog/products/popular');
}

export const getOrderInfo = async (uuid) => {
    return getApiData(`/api/v1/sales/orders/${uuid}`);
}

async function getApiData(url) {
    try {
        const response = await fetch(url);
        if (!response.ok) throw new Error('Ошибка сети');

        return await response.json();
    } catch (error) {
        console.error('API Error:', error);
        return [];
    }
}

export const payOrder = async (uuid) => {
    const response = await fetch(`/api/v1/sales/orders/${uuid}/pay`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json'
        },
        credentials: 'include',
    });

    if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Ошибка проведения оплаты');
    }

    return await response.json();
};

export const cancelOrder = async (uuid) => {
    const response = await fetch(`/api/v1/sales/orders/${uuid}/cancel`, {
        method: 'POST',
        credentials: 'include',
    });

    if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Ошибка проведения оплаты');
    }

    return await response.json();
};

export const createOrder = async (productId) => {
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

    if (!response.ok) {
        const errorData = await response.json();
        throw new Error(errorData.message || 'Ошибка при оформлении заказа');
    }

    return await response.json();
}