
var myInput = document.getElementById("password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
    document.getElementById("message").style.display = "block";
};

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
    document.getElementById("message").style.display = "none";
};

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
        // Validate length
        if(myInput.value.length >= 8) {
            length.classList.remove("invalid");
            length.classList.add("valid");
        } else {
            length.classList.remove("valid");
            length.classList.add("invalid");
        }
    }
var password = document.getElementById("password")
    , confirm_password = document.getElementById("confirm_password")
    , btn_pw = document.getElementById("btn_pw");

function validatePassword(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
        password.style.borderColor = "red";
        confirm_password.style.borderColor = "red";
    } else {
        confirm_password.setCustomValidity('');
        password.style.borderColor = "green";
        confirm_password.style.borderColor = "green";
    }
}
function validatePassword2(){
    if(password.value != confirm_password.value) {
        confirm_password.setCustomValidity("Passwords Don't Match");
        password.style.borderColor = "red";
        confirm_password.style.borderColor = "red";
    } else {
        confirm_password.setCustomValidity('');
        document.getElementById('form').submit();
    }
}
confirm_password.onkeyup = validatePassword;
btn_pw.onclick = validatePassword2;

