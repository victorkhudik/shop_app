import PriceBox from "./product/PriceBox.jsx";
import BuyProduct from "./product/BuyProduct.jsx";

export default function Product({product}) {
    return (
        <div className="product-item-info" id={`product-item-info_${product.id}`} data-container="product-grid">
            <a href={product.slug}
               className="product photo product-item-photo" tabIndex="-1">
                <span className={`product-image-container product-image-container-${product.id}`}>
                    <span className="product-image-wrapper">
                        <img className="product-image-photo"
                            src={product.image}
                            loading="lazy" width="228" height="152" alt={product.name}/>
                    </span>
                </span>
            </a>
            <div className="product details product-item-details" bis_skin_checked="1">
                <strong className="product name product-item-name">
                    <a className="product-item-link" href={product.slug}>
                        {product.name} </a>
                </strong>

                {product.quantity}

                <PriceBox product={product}/>

                <div className="product-item-inner" bis_skin_checked="1">
                    <div className="product actions product-item-actions" bis_skin_checked="1">
                        <div className="actions-primary" bis_skin_checked="1">
                            <BuyProduct product={product}/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
}