document.addEventListener("DOMContentLoaded", function () {
    // First toggle for the main password
    const togglePassword = document.getElementById('togglePassword');
    if (togglePassword) {
        togglePassword.addEventListener('click', function () {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            }
        });
    }

    // Second toggle for repeat password
    const toggleRepeatPassword = document.getElementById('toggleRepeatPassword');
    if (toggleRepeatPassword) {
        toggleRepeatPassword.addEventListener('click', function () {
            const repeatPasswordInput = document.getElementById('repeatPassword');
            const toggleRepeatIcon = document.getElementById('toggleRepeatIcon');
            if (repeatPasswordInput.type === 'password') {
                repeatPasswordInput.type = 'text';
                toggleRepeatIcon.classList.remove('bi-eye-slash');
                toggleRepeatIcon.classList.add('bi-eye');
            } else {
                repeatPasswordInput.type = 'password';
                toggleRepeatIcon.classList.remove('bi-eye');
                toggleRepeatIcon.classList.add('bi-eye-slash');
            }
        });
    }

    // Third toggle for the login password
    const loginPassword = document.getElementById('loginButtonPassword');
    if (loginPassword) {
        loginPassword.addEventListener('click', function () {
            const loginPasswordInput = document.getElementById('loginPassword');
            const loginToggleIcon = document.getElementById('toggleLoginRepeatIcon');
            if (loginPasswordInput.type === 'password') {
                loginPasswordInput.type = 'text';
                loginToggleIcon.classList.remove('bi-eye-slash');
                loginToggleIcon.classList.add('bi-eye');
            } else {
                loginPasswordInput.type = 'password';
                loginToggleIcon.classList.remove('bi-eye');
                loginToggleIcon.classList.add('bi-eye-slash');
            }
        });
    }
});
