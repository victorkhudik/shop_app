import React from 'react';
import MainMenu from './components/MainMenu.jsx';
import SearchBar from './components/SearchBar.jsx';
import Customer from "./components/Customer.jsx";
import './Header.css';

export default function Header() {
    return (
        <header className="page-header">
            <div className="header content">
                <MainMenu />
                <SearchBar />
                <Customer />
            </div>
        </header>
    );
};