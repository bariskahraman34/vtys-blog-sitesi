const newBlogForm = document.getElementById('new-blog-form');

newBlogForm.addEventListener('submit', (e) => {
  e.preventDefault();
  // const title = document.getElementById('title').value;
  // const content = document.getElementById('content').value;
  // const categoryId = document.getElementById('category').value;
  // const tags = document.getElementById('tags').value.split(',');
  const formData = new FormData(e.target);
  const formObj = Object.fromEntries(formData);
  console.log(formObj)

});
