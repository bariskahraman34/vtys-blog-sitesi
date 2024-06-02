const content = document.querySelector('.blog-content');

function splitTextToParagraphs(text) {
  const paragraphs = text.split('\n');
  return paragraphs.map((paragraph) => {
    return `<p>${paragraph}</p>`;
  }).join('');
}

content.innerHTML = splitTextToParagraphs(content.innerHTML);