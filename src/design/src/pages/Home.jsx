import React, { useState, useEffect } from 'react';
import HeroSlider from '../components/Content/HeroSlider';
import TopGamesAndServices from '../components/Content/TopGamesAndServices';
import ReplenishmentSteam from '../components/Content/ReplenishmentSteam';
import ProductSection from '../components/Catalog/product/List.jsx';
import { getPopularProducts, getRecommendedProducts } from '../services/api';

export default function Home() {
    const [popularProducts, setPopularProducts] = useState([]);
    const [recommendedProducts, setRecommendedProducts] = useState([]);
    const [loading, setLoading] = useState(true);

    useEffect(() => {
        async function fetchData() {
            try {
                const popularProductsData = await getPopularProducts();
                const recommendedProductsData = await getRecommendedProducts();
                setPopularProducts(popularProductsData);
                setRecommendedProducts(recommendedProductsData);
            } catch (error) {
                console.error('Ошибка при загрузке популярных товаров:', error);
            } finally {
                setLoading(false);
            }
        }

        fetchData();
    }, []);

    return (
        <>
            <HeroSlider />
            <div className="section bg-white">
                <TopGamesAndServices />
                <div className="separator"></div>
                <ReplenishmentSteam />
            </div>

            {loading ? (
                <p>Загрузка товаров...</p>
            ) : (
                <ProductSection
                    title="Популярные товары"
                    type="popular"
                    products={popularProducts.data}
                    isTab={true}
                />
            )}

            {loading ? (
                <p>Загрузка товаров...</p>
            ) : (
                <ProductSection
                    title="Рекомендованные товары"
                    type="recommended"
                    products={recommendedProducts.data}
                    showMoreLink="#"
                />
            )}

            <ProductSection
                title="Другие товары"
                type="other"
                showMoreLink="#"
            />
        </>
    );
}