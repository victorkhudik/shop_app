import { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { buyProduct } from "../../../../action/buyProduct.js";

export default function BuyProduct({product}) {
    const navigate = useNavigate();
    const isDisabled = product.quantity <= 0 || !product.is_active;
    const [loading, setLoading] = useState(false);

    const handleSubmit = async (e) => {
        e.preventDefault();

        setLoading(true);

        try {
            await buyProduct({
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