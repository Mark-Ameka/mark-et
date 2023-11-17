if (document.getElementById("myAlert") != null) {
    setTimeout(function () {
        document.getElementById("myAlert").style.display = "none";
    }, 3000);
}

//profile pic
document.addEventListener("DOMContentLoaded", function () {
    const uploadImage = document.getElementById("upload-image");
    const chosenImage = document.getElementById("chosen-image");
    const showButton = document.getElementById("show-button");

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
            showButton.disabled = false;
        });
    }
});

// checkbox for basic conf
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("enable-change-account") != null) {
        document
            .getElementById("enable-change-account")
            .addEventListener("change", function () {
                document.getElementById("fname").disabled = !this.checked;
                document.getElementById("lname").disabled = !this.checked;
                document.getElementById("email").disabled = !this.checked;
                document.getElementById("change-account").disabled =
                    !this.checked;
            });
    }
});

// checkbox for password
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("enable-change-password") != null) {
        document
            .getElementById("enable-change-password")
            .addEventListener("change", function () {
                document.getElementById("curr_pass").disabled = !this.checked;
                document.getElementById("password").disabled = !this.checked;
                document.getElementById("password_confirmation").disabled =
                    !this.checked;
                document.getElementById("change-password").disabled =
                    !this.checked;
            });
    }
});

// dominant color
document.addEventListener("DOMContentLoaded", function () {
    var img = document.getElementById("chosen-image");
    var container = document.getElementById("container-cover");

    if (img != null && container != null) {
        var colorThief = new ColorThief();
        var dominantColor = colorThief.getColor(img);

        container.style.backgroundColor =
            "rgb(" + dominantColor.join(",") + ")";
    }
});
