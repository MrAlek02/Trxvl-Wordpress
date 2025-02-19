import gsap from 'gsap';
import DrawSVGPlugin from 'gsap/DrawSVGPlugin';
import { animationTypesObject } from './animationTypesObject';
import { splitElement } from './splitText';
import { animateNumberIncrement } from './incrementNumbers';
gsap.registerPlugin(DrawSVGPlugin);
const animateElement = (
  element: HTMLElement,
  animation?: {
    type?: string;
    delay?: gsap.TweenValue;
    duration?: gsap.TweenValue;
    ease?: gsap.EaseFunction | string;
  }
) => {
  const {
    type = 'froyoFadeUp',
    delay = 0,
    duration = 0.6,
    ease = 'power1.inOut'
  } = animation || {
    type: element.getAttribute('data-animation-type') || 'froyoFadeUp',
    delay: element.getAttribute('data-animation-delay') || 0,
    duration: element.getAttribute('data-animation-duration') || 0.6,
    ease: element.getAttribute('data-animation-ease') || 'power1.inOut'
  };

  //Here you can check for specific animation type and call more advanced animation on enter
  if (type === 'splitText') {
    splitElement(element);
    return;
  }
  if (type === 'incrementNumber') {
    animateNumberIncrement(element);
    return;
  }

  const from =
    animationTypesObject[type].from || animationTypesObject['froyoFadeUp'].from;
  const to =
    animationTypesObject[type].to || animationTypesObject['froyoFadeUp'].to;

  gsap.set(element, {
    opacity: 0,
    ...from
  });

  gsap.to(element, {
    opacity: 1,
    ...to,
    duration: duration || 0.6,
    delay: delay || 0,
    ease: ease || 'power3.out',
    onComplete: () => {
      //This cleans up the clipPath property after the animation is done to prevent cuting off content
      //Add other clip-path type animations to the array if you are using them
      const clipPathAnimations = [
        'revealLeft',
        'revealRight',
        'revealTop',
        'revealBottom'
      ];
      if (clipPathAnimations.includes(type)) {
        (element as HTMLElement).style.clipPath = 'unset';
      }
    }
  });
};

export default animateElement;
