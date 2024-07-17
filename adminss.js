document.getElementById('login-form').addEventListener('submit', function(event) {
    event.preventDefault();

    var adminName = document.getElementById('admin-name').value;
    var password = document.getElementById('password').value;
    var errorMessage = document.getElementById('error-message');

    // Example credentials
    var correctAdminName = 'admin';
    var correctPassword = 'password123';

    if (adminName === correctAdminName && password === correctPassword) {
        // Redirect to admin dashboard
        window.location.href = 'admin.php';
    } else {
        // Display error message
        errorMessage.textContent = 'Invalid admin name or password.';
    }
});
