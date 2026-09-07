import formatPrice from "../../../../../../utils/formatPrice.js";
export default function PriceBox({product}) {
    return (
        <div className="price-box">
            <div className="price-box price-final_price" data-role="priceBox">
                {
                    product.special_price ? (
                        <>
                            <span className="special-price">
                                <span className="price-container price-final_price">
                                    <span className="price-label">Специальная цена</span>
                                    <span data-price-amount={product.special_price} data-price-type="finalPrice" className="price-wrapper">
                                        <span className="price">{formatPrice(product.special_price)}</span>
                                    </span>
                                </span>
                            </span>
                            <span className="old-price">
                                <span className="price-container price-final_price">
                                    <span className="price-label">Цена</span>
                                    <span data-price-amount={product.price} data-price-type="oldPrice" className="price-wrapper">
                                        <span className="price">{formatPrice(product.price)}</span>
                                    </span>
                                </span>
                            </span>
                        </>
                    ) : (
                        <span className="price-container price-final_price">
                            <span className="price-label">Цена</span>
                            <span data-price-amount={product.price}  data-price-type="finalPrice" className="price-wrapper ">
                                <span className="price">{formatPrice(product.price)}</span>
                            </span>
                        </span>
                    )
                }
                

            </div>
        </div>
    );
}