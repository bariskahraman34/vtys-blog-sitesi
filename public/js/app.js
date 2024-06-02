const userProfileBtn = document.querySelector('.user-profile');
const userProfileList = document.querySelector('.user-operations-list');

userProfileBtn.addEventListener('click',() => {
  userProfileList.classList.toggle('active');
})

window.addEventListener('click', (e) => {
  if (!userProfileBtn.contains(e.target) && userProfileList.classList.contains('active')) {
    userProfileList.classList.remove('active');
  }
});

