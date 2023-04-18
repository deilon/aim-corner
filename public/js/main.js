const dropdownBtn = document.querySelector('#acct-btn');
const dropdownContent = document.querySelector('.acct-dropdown-content');

dropdownBtn.addEventListener('click', () => {
  dropdownContent.classList.toggle('block');
  dropdownContent.classList.toggle('hidden');
});

const changePassBtn = document.querySelector('#change-pass');
const profileEditBtn = document.querySelector('#edit-profile');
const profileEditForm = document.querySelector('.profile-edit');
const changePassEditForm = document.querySelector('.change-pass-edit');

changePassBtn.addEventListener('click', () => {
  profileEditBtn.classList.toggle('hidden');
  changePassBtn.classList.toggle('hidden');
  profileEditForm.classList.toggle('hidden');
  changePassEditForm.classList.toggle('hidden');
});
profileEditBtn.addEventListener('click', () => {
  profileEditBtn.classList.toggle('hidden');
  changePassBtn.classList.toggle('hidden');
  profileEditForm.classList.toggle('hidden');
  changePassEditForm.classList.toggle('hidden');
});
