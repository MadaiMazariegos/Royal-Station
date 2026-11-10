const formulario = document.getElementById("formEncuesta");
const modal = document.getElementById("ventanaGracias");
const cerrar = document.getElementById("cerrarModal");

formulario.addEventListener("submit", async function(event) {
    event.preventDefault(); // Evita que la página se recargue de forma clásica

    const datosFormulario = new FormData(formulario);

    try {
        // Enviamos los datos al archivo PHP para guardarlos en MySQL
        const respuesta = await fetch("GuardarEncuesta.php", {
            method: "POST",
            body: datosFormulario
        });

        const resultado = await respuesta.json();

        if (resultado.exito) {
            // Si se guardó en MySQL con éxito, mostramos el modal
            modal.hidden = false;
            // Limpiamos el formulario
            formulario.reset();
        } else {
            alert("No se pudo guardar: " + resultado.mensaje);
        }

    } catch (error) {
        console.error("Error de conexión:", error);
        alert("Ocurrió un error al conectar con el servidor.");
    }
});

// CERRAR VENTANA AL HACER CLIC EN EL BOTÓN "Aceptar"
cerrar.addEventListener("click", function() {
    modal.hidden = true;
});

// CERRAR LA VENTANA AL HACER CLIC FUERA DEL CUADRO
modal.addEventListener("click", function(event) {
    if (event.target === modal) {
        modal.hidden = true;
    }
});