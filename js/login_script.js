const container = document.getElementById('container');
const registerBtn = document.getElementById('user_register');
const loginBtn = document.getElementById('user_login');

registerBtn.addEventListener('click', () => {
    container.classList.add("active");
});

loginBtn.addEventListener('click', () => {
    container.classList.remove("active");
});