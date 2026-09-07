import React from 'react';
import { BrowserRouter, Routes, Route } from 'react-router-dom';

import Header from './components/Header/Header';
import Home from './pages/Home';
import Order from './pages/Order';

import './App.css';
import 'react-tabs/style/react-tabs.css';

function AppRoutes() {
    return (
        <Routes>
            <Route path="/" element={<Home />} />
            <Route path="/orders/:uuid" element={<Order />} />
            <Route path="*" element={<div className="container">404: Страница не найдена</div>} />
        </Routes>
    );
}

export default function App() {
    return (
        <BrowserRouter>
            <div className="page-wrapper">
                <Header />

                <main id="maincontent" className="page-main">
                    <AppRoutes />
                </main>
            </div>
        </BrowserRouter>
    );
}