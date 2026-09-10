import React from 'react';
import HeroSlider from '../components/Content/HeroSlider';
import TopGamesAndServices from '../components/Content/TopGamesAndServices';
import ReplenishmentSteam from '../components/Content/ReplenishmentSteam';
import ProductSection from '../components/Catalog/product/List.jsx';

export default function Home() {
    return (
        <>
            <HeroSlider />

            <div className="section bg-white">
                <TopGamesAndServices />
                <div className="separator"></div>
                <ReplenishmentSteam />
            </div>

            <ProductSection
                title="Популярные товары"
                type="popular"
                isTab={true}
            />

            <ProductSection
                title="Рекомендованные товары"
                type="recommended"
                showMoreLink="#"
            />

            <ProductSection
                title="Другие товары"
                type="other"
                showMoreLink="#"
            />
        </>
    );
}