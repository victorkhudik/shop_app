import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { placeOrder } from "../../../../action/placeOrder.js";

export default function PlaceOrder({product}) {
    const navigate = useNavigate();
    const [isDisabled, setIsDisabled] = useState(product.quantity === 0);
    const [loading, setLoading] = useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();

        setLoading(true);

        try {
            await placeOrder({
                productId: product.id,
                navigate: navigate
            });
        } catch (error) {
            alert(error.message);
        } finally {
            setLoading(false);
        }
    };
    return (
        <form data-role="tocart-form" data-product-sku={product.sku}
              action="#"
              method="post" onSubmit={handleSubmit}>
            <button type="submit" title="Купить" className="button button-buy" disabled={isDisabled || loading}>
                <span><span>{loading ? 'Оформление...' : 'Купить'}</span></span>
            </button>
        </form>
    );
}