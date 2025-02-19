const scrollSpy = () => {
  const sections = document.querySelectorAll('.js-scroll-spy-section');
  const items = document.querySelectorAll('.js-scroll-spy-item');

  const setActive = () => {
    const curentActive = {
      index: 0,
      top: 0
    };
    sections.forEach((section, index) => {
      const top = section.getBoundingClientRect().top - 100;
      if (top < 0 && (top > curentActive.top || curentActive.top === 0)) {
        curentActive.top = top;
        curentActive.index = index;
      }
    });
    items.forEach((item, index) => {
      if (index != curentActive.index) {
        item.classList.remove('scrollbar__item--active');
      } else {
        item.classList.add('scrollbar__item--active');
      }
    });
    requestAnimationFrame(setActive);
  };

  setActive();
};

export default scrollSpy;
