// Verificar si el usuario está autenticado
function isAuthenticated() {
    return localStorage.getItem("loggedIn") === "true";
}

// Cerrar sesión
function logout() {
    // Eliminar el estado de autenticación
    localStorage.removeItem("loggedIn");
    // Redirigir al usuario a la página de inicio de sesión
    window.location.href = "/Nolas/vista/inicio.php";
}
