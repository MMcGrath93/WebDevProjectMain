const editModal = document.getElementById('edit-info-modal');
const editBtn = document.getElementById('edit-info-button');
const closeEditModal = document.querySelector('.delete');

editBtn.addEventListener('click', () => {
  editModal.classList.add('is-active');
});

closeEditModal.addEventListener('click', () => {
  editModal.classList.remove('is-active');
});

editBtn.addEventListener('click', () => {
  editModal.classList.add('is-active');
});

closeEditModal.addEventListener('click', () => {
  editModal.classList.remove('is-active');
});

const deleteAccountBtn = document.getElementById('delete-account-button');
const deleteAccountModal = document.getElementById('delete-account-modal');
const closeDeleteModal = document.getElementById('close-delete-modal');

deleteAccountBtn.addEventListener('click', () => {
    deleteAccountModal.classList.toggle('is-active');
});

closeDeleteModal.addEventListener('click', () => {
    deleteAccountModal.classList.remove('is-active');
});
document.getElementById("delete-account-button").addEventListener("click", function () {
    document.getElementById("delete-account-modal").style.display = "block";
    document.getElementById("delete-account-modal").classList.add("center-modal");
});
