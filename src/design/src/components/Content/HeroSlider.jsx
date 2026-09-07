import { useRef, useEffect, useState } from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import './assets/HeroSlider.css';

export default function HeroSlider() {
    const [swiperInstance, setSwiperInstance] = useState(null);
    const prevNavigationRef = useRef(null);
    const nextNavigationRef = useRef(null);

    useEffect(() => {
        if (swiperInstance && prevNavigationRef.current && nextNavigationRef.current) {
            swiperInstance.params.navigation.prevEl = prevNavigationRef.current;
            swiperInstance.params.navigation.nextEl = nextNavigationRef.current;
            swiperInstance.navigation.destroy();
            swiperInstance.navigation.init();
            swiperInstance.navigation.update();
        }
    }, [swiperInstance]);

    return (
        <div className="hero-slider-container">
            <Swiper
                modules={[Navigation, Pagination, Autoplay]}
                slidesPerView={1}
                pagination={{ clickable: true }}
                loop={true}
                autoplay={{ delay: 5000, disableOnInteraction: false }}
                onSwiper={setSwiperInstance}
                className="main-hero-swiper"
            >
                {Array.from({ length: 6 }, (_, index) => {
                    const slideNumber = index + 1;
                    return (
                        <SwiperSlide key={slideNumber}>
                            <picture>
                                <source
                                    media="(min-width: 1024px)"
                                    srcSet={`/images/hero-slides/slide${slideNumber}.png`}
                                />
                                <source
                                    media="(min-width: 640px)"
                                    srcSet={`/images/hero-slides/slide${slideNumber}-tablet.png`}
                                />
                                <img
                                    height="263px"
                                    src={`/images/hero-slides/slide${slideNumber}-mobile.png`}
                                    alt={`Slide ${slideNumber}`}
                                />
                            </picture>
                        </SwiperSlide>
                    );
                })}
            </Swiper>

            <div className="swiper-navigation-controls-container">
                <button
                    ref={prevNavigationRef}
                    className="swiper-nav swiper-custom-prev"
                    aria-label="Предыдущий"
                    type="button"
                >
                    <i className="icon icon-arrow-left"></i>
                </button>
                <button
                    ref={nextNavigationRef}
                    className="swiper-nav swiper-custom-next"
                    aria-label="Следующий"
                    type="button"
                >
                    <i className="icon icon-arrow-right"></i>
                </button>
            </div>
        </div>
    );
}