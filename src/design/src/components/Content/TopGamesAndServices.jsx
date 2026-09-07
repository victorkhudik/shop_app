import './assets/TopGamesAndServices.css';

export default function TopGamesAndServices() {
    const sampleData = [
        {
            name: 'Steam',
            image: '/images/top-games-ad-services/steam.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'Telegram',
            image: '/images/top-games-ad-services/telegram.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'Roblox',
            image: '/images/top-games-ad-services/roblox.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'Brawl Stars',
            image: '/images/top-games-ad-services/brawl-stars.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'PUBG Mobile',
            image: '/images/top-games-ad-services/pubg-mobile.png',
            imageEffect: 'black-border'
        },
        {
            name: 'App Store',
            image: '/images/top-games-ad-services/app-store.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'ChatGPT',
            image: '/images/top-games-ad-services/chatgpt.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'PlayStation',
            image: '/images/top-games-ad-services/playstation.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'TikTok',
            image: '/images/top-games-ad-services/tiktok.png',
            imageEffect: 'box-shadow'
        },
        {
            name: 'Mobile Legends: Bang Bang',
            image: '/images/top-games-ad-services/mobile-legend.png',
            imageEffect: 'box-shadow'
        }
    ];

    const otherTitle = 'еще 841';

    return (
        <div className="top-games-and-services-container">
            <ul className="top-games-and-services">
                {sampleData.map((item, index) => {
                    return (
                        <li className="top-games-and-services-item" key={index}>
                            <div className={`image-wrapper ${item.imageEffect}`}>
                                <img src={item.image} className="item-image" width="72px" height="72px" alt={item.name} />
                            </div>
                            <div className="item-data">
                                <div className="item-name">
                                    <a href="#" className="item-link" title={item.name}>
                                        <strong>{item.name}</strong>
                                    </a>
                                </div>
                            </div>
                        </li>
                    );
                })}
                <li className="top-games-and-services-item other">
                    <div className="image-wrapper">
                        <i className="icon icon-ufo"></i>
                    </div>

                    <div className="item-data">
                        <div className="item-name">
                            <a href="#" className="item-link" title={otherTitle}>
                                <strong>{otherTitle}</strong>
                            </a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    );
}