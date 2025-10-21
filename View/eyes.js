function togglePassword() {
  const passwordField = document.getElementById('password');
  const toggleIcon = document.getElementById('toggle-password').querySelector('i');
  if (passwordField.type === 'password') {
    passwordField.type = 'text';
    toggleIcon.classList.remove('bi-eye');
    toggleIcon.classList.add('bi-eye-slash');
  } else {
    passwordField.type = 'password';
    toggleIcon.classList.remove('bi-eye-slash');
    toggleIcon.classList.add('bi-eye');
  }
}
function toggleCPassword() {
  const cpasswordField = document.getElementById('cpassword');
  const toggleIcon = document.getElementById('toggle-cpassword').querySelector('i');
  if (cpasswordField.type === 'password') {
    cpasswordField.type = 'text';
    toggleIcon.classList.remove('bi-eye');
    toggleIcon.classList.add('bi-eye-slash');
  } else {
    cpasswordField.type = 'password';
    toggleIcon.classList.remove('bi-eye-slash');
    toggleIcon.classList.add('bi-eye');
  }
}
