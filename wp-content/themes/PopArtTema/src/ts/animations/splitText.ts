import gsap from 'gsap';
import { SplitText } from 'gsap/SplitText';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(SplitText, ScrollTrigger);

export const splitElement = (el: HTMLElement) => {
  console.log(el);

  const split = new SplitText(el, { type: 'words,chars' });
  const duration = el.getAttribute('data-animation-duration') || 0.7;
  const delay = el.getAttribute('data-animation-delay') || 0;

  console.log(split.words.length, 'split words length: ', split.words.length);
  let animateParts = split.chars;

  //If text is longer then 10 words, animate words, else animate characters
  if (split.words.length > 10) {
    animateParts = split.words;
  }

  gsap.set(animateParts, { opacity: 0, y: 20 });
  gsap.to(animateParts, {
    opacity: 1,
    y: 0,
    duration,
    delay,
    stagger: {
      each: 0.02,
      from: 1
    },
    scrollTrigger: {
      trigger: el
    }
  });
};

const splitText = () => {
  const titles: HTMLElement[] = Array.from(
    document.querySelectorAll('.js-split-title')
  );

  titles.forEach((title) => {
    splitElement(title);
  });
};
export default splitText;
