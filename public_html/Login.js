function InicioSesion() {
    let Usuario = document.getElementById("TxtUsuario").value.trim();
    let Contra = document.getElementById("TxtContra").value.trim();

    if (Usuario.toLowerCase() === "admin" && Contra === "2026") {
        window.location.href = "Admin.php";
    } else {
        alert("Usuario o contraseña incorrectos");
    }
}