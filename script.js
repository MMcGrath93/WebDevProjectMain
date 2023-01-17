const myAccountBtn = document.getElementById('myAccountBtn');
const myAccountModal = document.getElementById('myAccountModal');
const closeModal = document.getElementById('closeModal');

myAccountBtn.addEventListener('click', () => {
    myAccountModal.classList.toggle('is-hidden');
});

closeModal.addEventListener('click',()=>{
    myAccountModal.classList.add('is-hidden');
});

document.getElementById("edit-info-button").addEventListener("click", function() {
    document.getElementById("edit-info-modal").style.display = "block";
});

document.querySelector(".delete").addEventListener("click", function() {
    document.getElementById("edit-info-modal").style.display = "none";
});
