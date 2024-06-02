const changeProfilePhoto = document.getElementById('change-profile-photo');
const fileInput = document.getElementById('fileInput');

function openTab(evt, tabName) {
  let tabcontents, tablinks;
  tabcontents = document.querySelectorAll(".tabcontent");
  for (const tabcontent of tabcontents) {
      tabcontent.style.display = "none";
  }
  tablinks = document.querySelectorAll(".tablink");
  for (const tabLink of tablinks) {
    tabLink.classList.remove("active");
  }
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.classList.add("active");
}
document.querySelector(".tablink").click();

changeProfilePhoto.addEventListener('click', (event) => {
  event.preventDefault();
  fileInput.click();
});

fileInput.addEventListener('change', (event) => {
  const file = event.target.files[0];
  if (file) {
    const reader = new FileReader();
    reader.onload = (e) => {
      document.querySelector('.profile-image').src = e.target.result;
    };
    reader.readAsDataURL(file);
  }
});