import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);
const floatingImages = () => {
  const parallaxImgs = document.querySelectorAll('.js-floating-image');

  if (parallaxImgs.length > 0) {
    parallaxImgs.forEach((img) => {
      const startValue = parseFloat(img.getAttribute('data-start')) || -100;
      const endValue = parseFloat(img.getAttribute('data-end')) || 100;
      gsap.set(img, { y: startValue });
      ScrollTrigger.create({
        trigger: img,
        start: 'top 80%',
        end: 'bottom 20%',
        scrub: true,
        onUpdate: ({ progress }) => {
          const currentValue = startValue + (endValue - startValue) * progress;
          gsap.set(img, { y: currentValue });
        }
      });
    });
  }
};

export default floatingImages;
