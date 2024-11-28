// Seleccionamos el checkbox y el campo de contraseña
const showPasswordCheckbox = document.getElementById('show-password');
const passwordInput = document.getElementById('pwd_inicar');

// Agregamos un evento para cambiar el tipo del input cuando el checkbox se activa
showPasswordCheckbox.addEventListener('change', function() {
    if (showPasswordCheckbox.checked) {
        passwordInput.type = 'text'; // Cambia a texto para mostrar la contraseña
    } else {
        passwordInput.type = 'password'; // Vuelve a ocultarla
    }
});
