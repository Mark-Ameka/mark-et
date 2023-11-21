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

// show password
document.addEventListener("DOMContentLoaded", function () {
    if (document.getElementById("toggle_pass") != null) {
        document
            .getElementById("toggle_pass")
            .addEventListener("change", function () {
                var passwordInput = document.getElementById("password");
                var passwordConf = document.getElementById("password-confirm");
                var svgContainer = document.getElementById("append-svg");

                // Clear previous SVG content
                svgContainer.innerHTML = "";

                if (this.checked) {
                    passwordInput.type = "text";
                    if (passwordConf != null) {
                        passwordConf.type = "text";
                    }

                    // Create a new div element to hold the SVG content
                    var div = document.createElement("div");
                    div.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-closed absolute right-2 top-2 text-neutral-300" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M21 9c-2.4 2.667 -5.4 4 -9 4c-3.6 0 -6.6 -1.333 -9 -4" />
                                <path d="M3 15l2.5 -3.8" /><path d="M21 14.976l-2.492 -3.776" />
                                <path d="M9 17l.5 -4" /><path d="M15 17l-.5 -4" />
                            </svg>
                        `;

                    // Append the new div (containing the SVG) to the target element
                    svgContainer.appendChild(div);
                } else {
                    passwordInput.type = "password";
                    if (passwordConf != null) {
                        passwordConf.type = "password";
                    }
                    var div = document.createElement("div");
                    div.innerHTML = `
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye absolute right-2 top-2 text-neutral-300" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                <path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                            </svg>
                        `;

                    // Append the new div (containing the SVG) to the target element
                    svgContainer.appendChild(div);
                }
            });
    }
});

// display total amount
document.addEventListener("DOMContentLoaded", function () {
    var quantity_input = document.getElementById("total_quantity");
    var totalAmountElement = document.getElementById("total_amount");

    // get actual value for the quantity
    if (document.getElementById("quantity_value") != null) {
        var quantity_value = parseInt(
            document.getElementById("quantity_value").innerText
        );
    }

    // get actual value for the price
    if (document.getElementById("price_value") != null) {
        var price_value = parseFloat(
            document.getElementById("price_value").innerText
        );
    }

    // default value
    if (totalAmountElement != null) {
        totalAmountElement.textContent = "₱0.00";
    }

    if (
        quantity_input != null &&
        totalAmountElement != null &&
        quantity_value != NaN &&
        price_value != NaN
    ) {
        quantity_input.addEventListener("input", function () {
            var total_quantity = parseFloat(quantity_input.value) || 0;
            var totalAmount = total_quantity * price_value;

            if (isNaN(totalAmount)) {
                totalAmount = 0;
            }

            // Round to two decimal places
            totalAmount = totalAmount.toFixed(2);

            // Get the user's locale from the browser
            var userLocale =
                navigator.language || navigator.userLanguage || "en-US";

            // Format with comma separators and currency based on the user's locale
            totalAmount = new Intl.NumberFormat(userLocale, {
                style: "currency",
                currency: "PHP",
            }).format(totalAmount);

            totalAmountElement.textContent = totalAmount;

            if (quantity_input.value > quantity_value) {
                totalAmountElement.classList.remove("text-emerald-200");
                totalAmountElement.classList.add("text-red-600");
                totalAmountElement.textContent =
                    "You exceeded " + quantity_value;
            } else if (quantity_input.value <= quantity_value) {
                totalAmountElement.classList.remove("text-red-600");
                totalAmountElement.classList.add("text-emerald-200");
            }

            if (quantity_input.value <= -1) {
                totalAmountElement.classList.remove("text-emerald-200");
                totalAmountElement.classList.add("text-red-600");
                totalAmountElement.textContent = "You for real?";
            }
        });
    }
});

// bootstrap tooltip
document.addEventListener("DOMContentLoaded", function () {
    const tooltipTriggerList = document.querySelectorAll(
        '[data-bs-toggle="tooltip"]'
    );
    const tooltipList = [...tooltipTriggerList].map(
        (tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl)
    );
});
