import React, { useState } from 'react';

export default function SearchBar() {
    const [query, setQuery] = useState('');

    return (
        <form className="search-bar">
            <div className="search-input-wrapper">
                <input
                    type="text"
                    className="input search-input"
                    placeholder="Игра, приложение или услуга..."
                    value={query}
                    onChange={(e) => setQuery(e.target.value)}
                />
                <button type="button" className="button alternate button-favorite">
                    <i className="icon icon-favorite"></i>
                    <span>Избранные товары</span>
                </button>
            </div>
            <button type="submit" className="button button-search">
                <i className="icon icon-search"></i>
                <span>Найти</span>
            </button>
        </form>
    );
}