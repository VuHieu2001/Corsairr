// product image slider

const $ =document.querySelector.bind(document);
const $$ =document.querySelectorAll.bind(document);

const thumbnails = $$('.thumbnail');


thumbnails.forEach((thumbnail,index) =>{
        thumbnail.onclick = function(){
        //  
             $('.thumbnail.active').classList.remove('active');
            this.classList.add('active');
            document.getElementById('featured').src =this.src;
  
        }

})

// Modal SignIn ,SignUP
const modalSignin = document.querySelector('.Modal.js-modal-signin');
const modalSignup = document.querySelector('.Modal.js-modal-signup');
const signIn = document.querySelector('.js-signin');
const signUp = document.querySelector('.js-signup');
const CloseSignin = document.querySelector('.Modal-close.js-close-signin');
const CloseSignup = document.querySelector('.Modal-close.js-close-signup');
const goSingin = document.querySelector('.js-go-signin');
const goSingup = document.querySelector('.js-go-signup');

function showModalSignin() {
        modalSignin.classList.add('open');
}
function hideModalSignin() {
        modalSignin.classList.remove('open');
}
signIn.addEventListener('click',showModalSignin);
CloseSignin.addEventListener('click',hideModalSignin)


function showModalSignup() {
        modalSignup.classList.add('open');
}
function hideModalSignup() {
        modalSignup.classList.remove('open');
}
signUp.addEventListener('click',showModalSignup);
CloseSignup.addEventListener('click',hideModalSignup)

function goSingIn(){
        showModalSignin();
        hideModalSignup();
}
function goSingUp(){
        showModalSignup();
        hideModalSignin();
}
goSingin.addEventListener('click',goSingIn);
goSingup.addEventListener('click',goSingUp);


