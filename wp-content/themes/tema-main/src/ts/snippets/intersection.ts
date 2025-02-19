const intersection = () => {
  const elements = document.querySelectorAll(".js-observe");

  const animate = (el) => {
    // do your animation
    el.classList.add("show");
  };

  const myObserver = new IntersectionObserver(
    (entries, observer) => {
      entries.forEach((entry) => {
        // return if the element is not intersecting on initial load
        if (!entry.isIntersecting) {
          return;
        }
        // call animation function
        animate(entry.target);
        // disable observer for that element if you want animation to happen only once
        observer.unobserve(entry.target);
      });
    },
    {
      // trigger intersection when top of the element is 200px inside of the screen
      rootMargin: "0px 0px -200px  0px",
    }
  );

  // loop trough all elements and add them to the observer
  elements.forEach((el) => {
    myObserver.observe(el);
  });
};

export default intersection;
