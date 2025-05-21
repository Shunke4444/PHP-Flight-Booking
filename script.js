function showError(message) {
    const errorModal = document.getElementById('errorModal');
    const errorMessage = document.getElementById('errorMessage');
    if (errorModal && errorMessage) {
        errorMessage.textContent = message;
        errorModal.style.display = 'block';
    }
}
function showSuccess() {
    const successModal = document.getElementById('successModal');
    if (successModal) {
        successModal.style.display = 'block';
    }
}


document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('registrationForm');
    const closeButtons = document.querySelectorAll('.close');
    const modalButtons = document.querySelectorAll('.modal-btn');

    if (form) {
        form.addEventListener('submit', function(e) {
            const password = document.getElementById('password').value;
            const confirmPassword = document.getElementById('confirm_password').value;
            
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

    // Sign Up
    const passwordInputSignUp = document.getElementById("passwordSignUp");
    const passwordInputConfirmation = document.getElementById("confirm_passwordSignUp");
    const showPasswordCheckboxSignUp = document.getElementById("showPasswordSignUp");

    showPasswordCheckboxSignUp.addEventListener("change", function () {
        if(this.checked){
            passwordInputSignUp.type = "text";
            passwordInputConfirmation.type = "text";
        } else{
            passwordInputSignUp.type = "password";
            passwordInputConfirmation.type = "password";
        }
    });

    // Login 
    const passwordInput = document.getElementById("password");
    const showPasswordCheckbox = document.getElementById("showPassword");

    showPasswordCheckbox.addEventListener("change", function () {
        passwordInput.type = this.checked ? "text" : "password";
    });
});
   
window.showError = showError;
window.showSuccess = showSuccess;
