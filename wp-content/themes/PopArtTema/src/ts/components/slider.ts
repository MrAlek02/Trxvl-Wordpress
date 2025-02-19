import Swiper from 'swiper';

const slider = (): void => {
  const swiper = new Swiper('.swiper', {
    slidesPerView: 'auto',
    direction: 'horizontal',
    loop: true,
    spaceBetween: 20
  });
};

export default slider;
