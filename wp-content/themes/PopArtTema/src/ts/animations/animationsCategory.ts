import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

const animationsCategory = () => {
  gsap.registerPlugin(ScrollTrigger);

  let tl = gsap.timeline();

  gsap.from('.js-recently', {
    scrollTrigger: '.js-recently',
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
  gsap.from('.js-packages', {
    scrollTrigger: '.js-packages',
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
  gsap.from('.js-honeymoon', {
    scrollTrigger: '.js-honeymoon',
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
};
export default animationsCategory;
