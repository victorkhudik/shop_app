export default function formatPrice(price, currency = 'RUB') {
    if (price === null || price === undefined || isNaN(price)) {
        return '';
    }

    return new Intl.NumberFormat('ru-RU', {
        style: 'currency',
        currency: currency,
        minimumFractionDigits: 0,
        maximumFractionDigits: 2,
    }).format(price);
};