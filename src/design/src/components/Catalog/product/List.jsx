import React, {useState, useEffect, useCallback} from 'react';
import TabsList from "./list/TabsList.jsx";
import Products from "./list/Products.jsx";
import { useCatalogSocket } from '../../../hooks/useCatalogSocket';
import { getPopularProducts, getRecommendedProducts } from '../../../services/api';
import '../assets/List.css';

export default function List({
                                           title = 'Популярные товары',
                                           type = 'popular',
                                           showMoreLink = null,
                                           isTab = null
                                       }) {
    const [products, setProducts] = useState({ data: [] });
    const [loading, setLoading] = useState(true);
    const getData = {
        popular: getPopularProducts,
        recommended: getRecommendedProducts
    }
    const fetchData = useCallback(async () => {
        try {
            let data = { data: [] };
            switch (type) {
                case 'popular':
                    data = await getPopularProducts();
                    break;
                case 'recommended':
                    data = await getRecommendedProducts();
                    break;
                default:
                    // Опционально: обработка других типов (например, 'other')
                    break;
            }
            setProducts(data.data);
        } catch (error) {
            console.error(`Ошибка загрузки секции ${type}:`, error);
        } finally {
            setLoading(false);
        }
    }, [type]);

    useEffect(() => {
        fetchData();
    }, [fetchData]);

    useCatalogSocket(setProducts, fetchData);
    if (loading) {
        return <p className="container">Загрузка {title.toLowerCase()}...</p>;
    }
    return (
        <section className={`section product-list type-${type}`}>
            {isTab ? (
                <TabsList tabs={products} title={title}/>
            ) : (
                <>
                <div className="section-title">
                    <strong className="h2">{title}</strong>
                    {showMoreLink && (
                        <div className="action">
                            <a href={showMoreLink} className="button button-show-more">
                                <span>Показать все</span>
                            </a>
                        </div>
                    )}
                </div>
                <div className="section-content">
                    <Products products={products} />
                </div>
                </>
            )}
        </section>
    );
}

