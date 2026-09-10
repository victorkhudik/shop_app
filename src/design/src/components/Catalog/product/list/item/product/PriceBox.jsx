import formatPrice from "../../../../../../utils/formatPrice.js";

export default function PriceBox({product}) {
    const hasDiscount = product.special_price && Number(product.special_price) < Number(product.price);
    const displayPrice = hasDiscount ? product.special_price : product.price;

    return (
        <div className="price-box">
            <div className="price-box price-final_price" data-role="priceBox">
                <span className="price-container price-final_price">
                    <span className="price-label">Цена</span>
                    <span data-price-amount={displayPrice} data-price-type="finalPrice" className="price-wrapper ">
                        <span className="price">{formatPrice(displayPrice)}</span>
                    </span>
                </span>
                {hasDiscount && (
                    <span className="old-price">
                        <span className="price-container price-final_price">
                            <span className="price-label">Цена</span>
                            <span data-price-amount={product.price} data-price-type="oldPrice"
                                  className="price-wrapper">
                                <span className="price">{formatPrice(product.price)}</span>
                            </span>
                        </span>
                    </span>
                )}
            </div>
        </div>
    );
}