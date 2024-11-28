function showContent(section) {
    const contents = document.querySelectorAll('.content');
    contents.forEach(content => {
        content.classList.remove('active');
    });

    const activeContent = document.getElementById(section);
    activeContent.classList.add('active');
}

function logout() {
    // Lógica para cerrar sesión
    // Aquí puedes redirigir a la página de login o realizar otras acciones
    alert('Has cerrado sesión');
    // Redirigir a otra página, por ejemplo:
    window.location.href = '../index.html';
}
