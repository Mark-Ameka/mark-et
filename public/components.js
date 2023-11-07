if (document.getElementById("myAlert") != null) {
    setTimeout(function () {
        document.getElementById("myAlert").style.display = "none";
    }, 3000);
}

//profile pic

//profile pic
document.addEventListener("DOMContentLoaded", function () {
    const uploadImage = document.getElementById("upload-image");
    const chosenImage = document.getElementById("chosen-image");

    if (uploadImage != null && chosenImage != null) {
        uploadImage.addEventListener("change", function (event) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = function () {
                chosenImage.src = reader.result;
            };

            if (file) {
                reader.readAsDataURL(file);
            }
        });
    }
});
