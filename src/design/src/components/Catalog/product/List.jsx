import React, {useState, useEffect} from 'react';
import TabsList from "./list/TabsList.jsx";
import Products from "./list/Products.jsx";

import '../assets/List.css';

export default function ProductSection({
                                           title = 'Популярные товары',
                                           type = 'popular',
                                           products = [],
                                           showMoreLink = null,
                                           isTab = null
                                       }) {
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

