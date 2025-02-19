import Swiper from 'swiper';
import {Navigation, Pagination} from "swiper/modules";

const slider = (): void => {
    const swiper = new Swiper(".mySwiper", {
        slidesPerView: 4,
        modules: [Navigation, Pagination],
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });
};

export default slider;
