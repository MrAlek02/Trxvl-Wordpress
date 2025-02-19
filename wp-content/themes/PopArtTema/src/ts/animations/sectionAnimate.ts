import animateElement from './animateElement';

const startAnimating = (el: HTMLElement) => {
  const elementsToAnimate = Array.from(el.querySelectorAll('.js-animate'));

  elementsToAnimate.forEach((element: HTMLElement) => {
    const type = element.getAttribute('data-animation-type');
    const delay = +element.getAttribute('data-animation-delay');
    const duration = +element.getAttribute('data-animation-duration');
    const ease = element.getAttribute('data-animation-ease');
    animateElement(element, {
      type,
      delay,
      duration,
      ease
    });
  });
};

const sectionAnimate = () => {
  const sections = document.querySelectorAll('.js-section-animate');

  const myObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        // return if the element is not intersecting on initial load
        if (!entry.isIntersecting) {
          return;
        }
        // call animation function
        entry.target.classList.add('show');
        startAnimating(entry.target as HTMLElement);
        // disable observer for that element if you want animation to happen only once
        observer.unobserve(entry.target);
      });
    },
    {
      rootMargin: '0px 0px -120px  0px'
    }
  );

  // loop trough all elements and add them to the observer
  sections.forEach((el) => {
    myObserver.observe(el);
  });
};

export default sectionAnimate;
