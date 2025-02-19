import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

const animations = () => {
  gsap.registerPlugin(ScrollTrigger);

  let tl = gsap.timeline();

  tl.from('.js-hero', {
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
  tl.from('.js-categories', {
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
  tl.from(
    '.js-destinations',
    {
      x: -100,
      opacity: 0,
      duration: 1,
      stagger: 0.2
    },
    '<'
  );
  gsap.from('.js-about', {
    scrollTrigger: '.js-about',
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
  gsap.from('.js-property', {
    scrollTrigger: '.js-property',
    y: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
  gsap.from('.js-image', {
    scrollTrigger: '.js-image',
    x: 30,
    opacity: 0,
    duration: 1
  });
  gsap.from('.js-community', {
    scrollTrigger: '.js-community',
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
  gsap.from('.js-mobile', {
    scrollTrigger: '.js-app',
    y: 100,
    opacity: 0,
    delay: 1,
    duration: 1
  });
  gsap.from('.js-content', {
    scrollTrigger: '.js-app',
    x: -100,
    opacity: 0,
    duration: 1,
    stagger: 0.2
  });
};
export default animations;
