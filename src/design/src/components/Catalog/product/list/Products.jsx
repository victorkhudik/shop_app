import Product from "./item/Product.jsx";
export default function Products({products}) {
    return (
        <ul className="products-list">
            {products.length ? (
                <>
                    {products.map((product, index) => {
                        return (
                            <li key={index} className="item product product-item">
                                <Product product={product} />
                            </li>
                        )
                    })}
                </>
            ) : (
                <li>
                    <span>Нет подходящих продуктов</span>
                </li>
            )}
        </ul>
    );
}