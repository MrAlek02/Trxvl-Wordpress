import animateElement from './animateElement';

const animateIn = () => {
  const elements = document.querySelectorAll('.js-animate-single');

  const myObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        // return if the element is not intersecting on initial load
        if (!entry.isIntersecting) {
          return;
        }
        // call animation function
        animateElement(entry.target as HTMLElement);
        // disable observer for that element if you want animation to happen only once
        observer.unobserve(entry.target);
      });
    },
    {
      rootMargin: '0px 0px 0px 0px'
    }
  );

  // loop trough all elements and add them to the observer
  elements.forEach((el) => {
    myObserver.observe(el);
  });
};

export default animateIn;
