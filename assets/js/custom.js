var header = document.querySelector("header");
document.addEventListener("scroll",()=>{
    if(header.offsetTop<0){
        header.classList.add("fixed");
    }
    console.log(header.offsetTop);
});

var signup = document.getElementById("signup");
var login = document.getElementById("login");
var loginBtn = document.getElementById("loginBtn");
var signUpBtn = document.getElementById("signUpBtn");
var closeLogIn = document.getElementById("close-modal2");
var closeSignUp = document.getElementById("close-modal1");

loginBtn.addEventListener("click", () => {
    signup.style.display = "none";
    login.style.display = "block";
    closeLogIn.addEventListener("click", () => {
        login.style.display = "none";
    });
});

signUpBtn.addEventListener("click", () => {
    login.style.display = "none";
    signup.style.display = "block";
    closeSignUp.addEventListener("click", () => {
        signup.style.display = "none";
    });
});

function isValid(evt){
    evt = (evt) ? evt : window.event;
    var charCode = (evt.which) ? evt.which : evt.keyCode;
    if (charCode < 14||(charCode > 48 && charCode < 90)) {
        return true;
    }
    return false;
}
