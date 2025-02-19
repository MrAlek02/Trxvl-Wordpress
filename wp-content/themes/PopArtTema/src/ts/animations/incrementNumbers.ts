import gsap from 'gsap';

export const animateNumberIncrement = (element: HTMLElement) => {
  gsap.fromTo(
    element,
    {
      innerText: element.getAttribute('data-numbers-animate-from')
    },
    {
      innerText: element.getAttribute('data-numbers-animate-to'),
      duration: element.getAttribute('data-animation-duration') || 2.5,
      delay: element.getAttribute('data-animation-delay') || 0,
      ease: 'power3.out',
      snap: {
        innerText: 1
      }
    }
  );
};

const incrementNumbers = () => {
  const numbers = document.querySelectorAll('.js-increment-number');

  const myObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        // return if the element is not intersecting on initial load
        if (!entry.isIntersecting) {
          // animate(entry.target, true);
          return;
        }
        // call animation function
        animateNumberIncrement(entry.target as HTMLElement);
        // disable observer for that element if you want animation to happen only once
        observer.unobserve(entry.target);
      });
    },
    {
      // trigger intersection when top of the element is 120px inside of the screen
      rootMargin: '0px 0px 0px  0px'
    }
  );
  numbers.forEach((item) => {
    myObserver.observe(item);
  });
};

export default incrementNumbers;
