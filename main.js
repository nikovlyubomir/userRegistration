//Call back function. The main purpose is to freeze/disable the submit button until the reCaptcha is verified.
function recaptcha_callback() {
    const registerBtn = document.querySelector('.btn');

    registerBtn.removeAttribute('disabled');
    registerBtn.style.cursor = 'pointer';
}