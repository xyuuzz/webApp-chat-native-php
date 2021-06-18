const passwordField = document.querySelector("#password"),
        toogleButton = document.querySelector(".form .field i");

toogleButton.onclick = () => {
    if(passwordField.type === "password") {
        passwordField.type = "text";
        toogleButton.classList.add("active");
    } else {
        passwordField.type = "password";
        toogleButton.classList.remove("active");
    }
}
