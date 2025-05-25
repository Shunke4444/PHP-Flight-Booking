function showError(message) {
    const errorModal = document.getElementById('errorModal');
    const errorMessage = document.getElementById('errorMessage');
    if (errorModal && errorMessage) {
        errorMessage.textContent = message;
        errorModal.style.display = 'block';
    }
}
// function showSuccess() {
//     const successModal = document.getElementById('successModal');
//     if (successModal) {
//         successModal.style.display = 'block';
//     }
// }

document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const closeButtons = document.querySelectorAll('.close');
    const modalButtons = document.querySelectorAll('.modal-btn');

    if (form) {
        form.addEventListener('submit', function(e) {
            const password = document.getElementById('passwordSignUp')?.value;
            const confirmPassword = document.getElementById('confirm_passwordSignUp')?.value;
            if (password !== confirmPassword) {
                e.preventDefault();
                showError('Passwords do not match!');
            }
        });
    }

    const closeModal = function() {
        document.querySelectorAll('.modal').forEach(modal => {
            modal.style.display = 'none';
        });
    };

    closeButtons.forEach(btn => {
        btn.addEventListener('click', closeModal);
    });

    modalButtons.forEach(btn => {
        btn.addEventListener('click', closeModal);
    });

    window.addEventListener('click', function(event) {
        if (event.target.classList.contains('modal')) {
            closeModal();
        }
    });

    // Modern show/hide password toggle for both password fields
    document.querySelectorAll('.toggle-password').forEach(function(toggle) {
        toggle.addEventListener('click', function() {
            const input = document.querySelector(this.getAttribute('toggle'));
            if (input.type === 'password') {
                input.type = 'text';
                this.querySelector('i').classList.remove('fa-eye');
                this.querySelector('i').classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                this.querySelector('i').classList.remove('fa-eye-slash');
                this.querySelector('i').classList.add('fa-eye');
            }
        });
    });
});

window.showError = showError;
window.showSuccess = showSuccess;