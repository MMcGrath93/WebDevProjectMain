    // code to export data to excel
   document.getElementById("export-button").addEventListener("click", function () {

});

        // Get the modal
        var modal = document.getElementById("edit-info-modal");
        // Get the button that opens the modal
        var btn = document.getElementById("edit-info-button");
        // Get the x element that closes the modal
        var span = document.getElementsByClassName("delete")[0];

        // When the user clicks the button, open the modal 
        btn.onclick = function () {
            modal.classList.add("is-active");
        }

        // When the user clicks on x, close the modal
        span.onclick = function () {
            modal.classList.remove("is-active");
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == modal) {
                modal.classList.remove("is-active");
            }
        }


        // Get the delete modal
        var deleteModal = document.getElementById("delete-account-modal");

        // Get the delete button
        var deleteBtn = document.getElementById("delete-account-button");

        // Get the x element that closes the modal
        var closeDeleteBtn = document.getElementsByClassName("delete")[1];

        // When the user clicks the button, open the modal 
        deleteBtn.onclick = function () {
            deleteModal.style.display = "flex";
        }

        // When the user clicks on x, close the modal
        closeDeleteBtn.onclick = function () {
            deleteModal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function (event) {
            if (event.target == deleteModal) {
                deleteModal.style.display = "none";
            }
        }
