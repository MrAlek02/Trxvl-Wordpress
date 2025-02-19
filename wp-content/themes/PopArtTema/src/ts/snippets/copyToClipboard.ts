const copyToClipboard = () => {
  const copyLink = document.querySelector('.js-copy-link');

  if (!copyLink) return;

  const text = window.location.href;
  const dummy = document.createElement('input');

  copyLink.addEventListener('click', () => {
    document.body.appendChild(dummy);
    dummy.value = text;
    dummy.select();
    document.execCommand('copy');
    document.body.removeChild(dummy);
  });
};

export default copyToClipboard;
