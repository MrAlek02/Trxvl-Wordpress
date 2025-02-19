const readTime = () => {
  const content = document.querySelector('.js-single-content');
  const readTimeBox = document.querySelector('.js-read-time');

  if (!content) return;

  const txt = content.innerHTML;
  const wordCount = txt.replace(/[^\w ]/, '').split(/\s+/).length;

  const readingTimeInMinutes = Math.floor(wordCount / 228) + 1;

  readTimeBox.innerHTML = `${readingTimeInMinutes}`;
};

export default readTime;
