const scrollTop = () => {
  const scrollTopButton = document.querySelector('.js-scroll-top');

  scrollTopButton?.addEventListener('click', () => {
    window.scrollTo({
      top: 0,
      left: 0,
      behavior: 'smooth'
    });
  });
};

export default scrollTop;
