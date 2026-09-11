import React, { useState, useEffect, useMemo } from 'react';
import {useCatalogSearch} from "../../../hooks/useCatalogSearch.js";

export default function SearchBar() {
    const [query, setQuery] = useState(() => {
        const params = new URLSearchParams(window.location.search);
        return params.get('query') || '';
    });

    const { results, loading } = useCatalogSearch(query);

    useEffect(() => {
        const urlParams = new URLSearchParams(window.location.search);

        if (query.trim()) {
            urlParams.set('query', query);
        } else {
            urlParams.delete('query');
        }

        const newUrl = urlParams.toString()
            ? `${window.location.pathname}?${urlParams.toString()}`
            : window.location.pathname;

        window.history.replaceState(null, '', newUrl);
    }, [query]);
    const total = results?.meta?.total ?? 0;
    const limit = results?.meta?.limit ?? 0;
    const products = useMemo(() => {
        return Array.isArray(results?.data) ? results.data : [];
    }, [results, loading]);
    
    return (
        <div className="search-bar">
            <form className="search-form" action="#" onSubmit={(e) => e.preventDefault()}>
                <div className="search-input-wrapper">
                    <input
                        type="text"
                        className="input search-input"
                        placeholder="Игра, приложение или услуга..."
                        value={query}
                        onChange={(e) => setQuery(e.target.value)}
                        style={{ opacity: loading ? 0.7 : 1 }}
                    />
                    <button type="button" className="button alternate button-favorite">
                        <i className="icon icon-favorite"></i>
                        <span>Избранные товары</span>
                    </button>
                </div>
                <button type="submit" className="button button-search">
                    <i className="icon icon-search"></i>
                    <span><span>{loading ? 'Поиск...' : 'Найти'}</span></span>
                </button>
            </form>
            {query.trim() !== '' && (
                <div className="search-result section bg-white">
                    {loading && (
                        <div className="search-loading">
                            <h3>Поиск товаров...</h3>
                        </div>
                    )}
                    {total < 1 ? (
                        <h3>Товаро не найдено</h3>
                    ) : (
                        <>
                            <h3>Найдено {total > 1 ? `${total} товара` : '1 товар'}</h3>
                            <ul className="search-products-list">
                                {products.map((product) => {
                                    return (
                                        <li key={product.id} className="item product product-item">
                                                <a className="product-item-link" href={product.slug} title={product.name}>
                                                    <span>{product.name}</span>
                                                </a>
                                        </li>
                                    )
                                })}
                            </ul>
                            {total > limit && (
                                <div className="action">
                                    <div className="separator"></div>
                                    <a href="#" title="Показать еще" className="button button-show-more">
                                        <span>Показать еще</span>
                                    </a>
                                </div>
                            )}
                        </>
                    )}
                </div>
            )}
        </div>
    );
}