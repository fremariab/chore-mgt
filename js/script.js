function openForm(errorMessage) {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("form-container").style.display = "block";
    if (errorMessage) {
        document.getElementById("error-message").innerText = errorMessage;
    }
}

function closeForm() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("form-container").style.display = "none";
}
