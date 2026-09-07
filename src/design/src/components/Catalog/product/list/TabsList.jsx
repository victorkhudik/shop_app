import {useState} from 'react';
import {Tabs, TabList, Tab, TabPanel} from 'react-tabs';
import Products from "./Products.jsx";

export default function TabsList({title, tabs = []}) {
    const [tabIndex, setTabIndex] = useState(0);
    const icons = [
        'donate',
        'subscribes',
        'items',
        'accounts',
        'keys',
        'game-currency',
        'ufo'
    ];

    return (
        <Tabs selectedIndex={tabIndex} onSelect={(index) => setTabIndex(index)}>
            <div className="section-title">
                <strong className="h2">{title}</strong>

                <TabList>
                    {tabs.map((tab, index) => (
                        <Tab key={tab.product_type?.id || index}>
                            {icons[index] && <i className={`icon icon-${icons[index]}`}></i>}
                            <span>{tab.product_type?.name}</span>
                        </Tab>
                    ))}
                </TabList>
                    {tabs.map((tab, index) => (
                            <TabPanel/>
                        )
                    )
                    }

            </div>
            <div className="section-content">
                <Tabs selectedIndex={tabIndex} onSelect={(index) => setTabIndex(index)}>
                    {/* Скрываем ненужный TabList (отключаем интерактивность здесь) */}
                    <TabList style={{display: 'none'}}>
                        {tabs.map((tab, index) => (
                                <Tab/>
                            )
                        )
                        }
                    </TabList>

                    {tabs.map((tab, index) => (
                        <TabPanel key={tab.product_type?.id || index}>
                            <Products products={tab.products || []}/>
                        </TabPanel>
                    ))}
                </Tabs>

            </div>

        </Tabs>
    );
}