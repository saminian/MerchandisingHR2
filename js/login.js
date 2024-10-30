// Login Functionality
const passwordField = document.getElementById('password');
const toggleIcon = document.getElementById('togglePassword');

toggleIcon.addEventListener('click', function () {
    const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
    passwordField.setAttribute('type', type);
    this.classList.toggle('fa-eye-slash', type === 'text');
    this.classList.toggle('fa-eye', type === 'password');
});