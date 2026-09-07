import React, { useState, useEffect, useRef } from 'react';
import { Tab, Tabs, TabList, TabPanel } from 'react-tabs';
import { getCategories } from '../../../services/api';

export default function MainMenu() {
    const [isOpen, setIsOpen] = useState(false);
    const [categories, setCategories] = useState([]);
    const [loading, setLoading] = useState(false);
    const menuRef = useRef(null);

    const toggleMenu = async () => {
        const nextState = !isOpen;
        setIsOpen(nextState);

        if (nextState && categories.length === 0) {
            setLoading(true);
            const data = await getCategories();
            setCategories(data);
            setLoading(false);
        }
    };

    const renderSubCategoryList = (items, level = 2) => {
        if (!items || items.length === 0) return null;

        return (
            <ul className="submenu">
                {
                    items.map((category, index) => {
                    const hasChildren = category.children && category.children.length > 0;
                    const prevCategory = items[index - 1];
                    const prevHasChildren = prevCategory?.children && prevCategory.children.length > 0;
                    const isFirstParentAfterNonParents = hasChildren && prevCategory && !prevHasChildren;

                    return (
                        <React.Fragment key={category.id}>
                            {isFirstParentAfterNonParents && (<li className="menu-divider"/>)}
                            <li
                                key={category.id}
                                className={`menu-item level-${level} ${hasChildren ? "parent" : ""}`}
                            >
                                <a href={`/category/${category.slug}`} className="menu-item-link">
                                    {category.name}{hasChildren && (
                                    <span className="icon icon-arrow-small-right"></span>)}
                                </a>
                                {hasChildren && renderSubCategoryList(category.children, level + 1)}
                            </li>
                        </React.Fragment>
                    );
                })}
            </ul>
        );
    };

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (menuRef.current && !menuRef.current.contains(event.target)) {
                setIsOpen(false);
            }
        };

        if (isOpen) {
            document.addEventListener('mousedown', handleClickOutside);
        }

        return () => {
            document.removeEventListener('mousedown', handleClickOutside);
        };
    }, [isOpen]);

    return (
        <div className="navigation main-navigation" ref={menuRef}>
            <button className="button button-catalog" onClick={toggleMenu}>
                <i className="icon icon-catalog"></i>
                <span>Каталог</span>
            </button>

            {isOpen && (
                <div className="main-menu-dropdown">
                    {loading ? (
                        <div className="menu-loading">Загрузка категорий...</div>
                    ) : (
                        <Tabs>
                            <TabList>
                                {categories.map((category) => {
                                    return (
                                        <Tab>{category.name}<span className="icon icon-arrow-small-right"></span></Tab>
                                    );
                                })}
                            </TabList>
                            {categories.map((category) => {
                                return (
                                    <TabPanel>
                                        {renderSubCategoryList(category.children || [])}
                                    </TabPanel>
                                );
                            })}
                        </Tabs>
                    )}
                </div>
            )}
        </div>
    );
}