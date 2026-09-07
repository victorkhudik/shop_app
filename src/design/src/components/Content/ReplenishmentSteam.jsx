import {useState} from 'react';

import './assets/ReplenishmentSteam.css';

export default function ReplenishmentSteam() {
    const currencyMap = [
        {
            key: "USD",
            symbol: '$'
        },
        {
            key: "KZT",
            symbol: '₸'
        },
        {
            key: "RUB",
            symbol: '₽'
        }
    ];

    const [login, setLogin] = useState('');
    const [amount, setAmount] = useState('500');
    const [activeCurrency, setActiveCurrency] = useState(currencyMap[0]);


    return (
        <div className="steam-replenishment">
            <div className="steam-replenishment-info">
                <div className="image-wrapper">
                    <img
                        src="/images/top-games-ad-services/steam.png"
                        width="72px" height="72px"
                        alt="Steam Logo"
                        className="steam-replenishment-icon"
                    />
                </div>
                <div className="steam-replenishment-title-block">
                    <div className="header">
                        <h3 className="title">Пополнение Steam</h3>
                        <span className="badge">5%</span>
                    </div>
                    <button type="button" className="button button-promo">
                        <span>Ввести промокод</span>
                        <i className="icon icon-arrow-small-right"></i>
                    </button>
                </div>
            </div>

            <form className="replenishment-form">
                <div className="fieldset steam-replenishment-input-group">
                    <input type="hidden" value={activeCurrency.symbol}/>
                    <div className="field steam-login">
                        <label className="label" htmlFor="steam-login">Логин Steam</label>
                        <div className="control">
                            <i className="icon icon-profile"></i>
                            <input
                                name="steam-login" id="steam-login"
                                type="text" required={true}
                                placeholder="Логин Steam"
                                value={login}
                                onChange={(e) => setLogin(e.target.value)}
                                className="input steam-login-input"
                            />
                            <button
                                type="button"
                                className="button button-info"
                                title="Инструкция по поиску логина"
                            >
                                i
                            </button>
                        </div>
                    </div>
                    <div className="field amount">
                        <label className="label" htmlFor="steam-amount">Сумма</label>
                        <div className="control">
                            <i className="currency-symbol">{activeCurrency.symbol}</i>
                            <div className="steam-replenishment-amount-wrapper">
                                <div className="steam-replenishment-amount-input-row">
                                    <input
                                        name="amount" id="steam-amount"
                                        required={true}
                                        min={0}
                                        type="number"
                                        value={amount}
                                        onChange={(e) => setAmount(e.target.value)}
                                        className="input amount-input"
                                    />
                                    <span className="steam-replenishment-currency-symbol" style={{marginLeft: `${Math.max(amount.length, 1)}ch`}}>
                                    {activeCurrency.symbol}
                                </span>
                                </div>
                            </div>
                        </div>

                        <div className="currencies-list">
                            {currencyMap.map((currency, index) => {
                                return (
                                    <button key={index}
                                            type="button"
                                            className={`button button-set-currency ${
                                                currency.symbol === activeCurrency.symbol ? 'active' : ''
                                            }`}
                                            onClick={() => setActiveCurrency(currency)}
                                    >
                                        {currency.symbol}
                                    </button>
                                );
                            })}
                        </div>
                    </div>
                </div>


                <div className="actions-toolbar">
                    <button type="button" className="button button-submit">
                        Оплатить {amount || 0}{activeCurrency.symbol}
                    </button>
                </div>
            </form>
        </div>
    );
}