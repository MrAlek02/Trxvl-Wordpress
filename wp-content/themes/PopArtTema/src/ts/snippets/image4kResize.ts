const image4kResize = (): void => {
  const images = document.querySelectorAll('.js-4k-image');
  let size = null;

  if (images.length === 0) return;

  const setSizes = () => {
    const newSize = window.innerWidth > 1920 ? 'bigger' : 'smaller';
    if (size != newSize) {
      if (newSize === 'bigger') {
        images.forEach((img: HTMLImageElement) => {
          const bounds = img.getBoundingClientRect();
          img.style.width = `${(bounds.width / 1920) * 100}vw`;
          img.style.height = `${(bounds.height / 1920) * 100}vw`;
        });
      } else {
        images.forEach((img: HTMLImageElement) => {
          img.style.width = 'auto';
          img.style.height = 'auto';
        });
      }
      size = newSize;
    }
  };

  if (document.readyState === 'complete') {
    setSizes();
  } else {
    window.addEventListener('load', function () {
      setSizes();
    });
  }

  window.addEventListener('resize', setSizes);
};

export default image4kResize;
