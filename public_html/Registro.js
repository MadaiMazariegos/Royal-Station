
document.getElementById("registroForm").addEventListener("submit", function(event) {

    event.preventDefault();

    // Obtener los datos del pasajero
    let Nom = document.getElementById("TxtNom").value;
    let DPI = document.getElementById("TxtDpi").value;
    let Correo = document.getElementById("TxtCorreo").value;
    let Telefono = document.getElementById("TxtTel").value;

    let Dest = document.getElementById("destino");
    let Fecha = document.getElementById("Fecha").value;
    let Horario = document.getElementById("Horario").value;
    let Cant = Number(document.getElementById("cantidad").value);

    // Obtener el precio del destino
    let Precio = Number(Dest.value);

    // Calcular el total
    let Total = Precio * Cant;

    // Mostrar los datos en el boleto
    document.getElementById("datoNombre").textContent = "Pasajero: " + Nom;

    document.getElementById("datoDpi").textContent = "DPI: " + DPI;

    document.getElementById("datoCorreo").textContent = "Correo: " + Correo;

    document.getElementById("datoTelefono").textContent = "Teléfono: " + Telefono;

    document.getElementById("datoDestino").textContent =
        "Destino: " + Dest.options[Dest.selectedIndex].text;

    document.getElementById("datoFecha").textContent = "Fecha: " + Fecha;

    document.getElementById("datoHorario").textContent = "Horario: " + Horario;

    document.getElementById("datoCantidad").textContent = "Boletos: " + Cant;

    document.getElementById("total").textContent = "TOTAL: £" + Total.toFixed(2);

    // Mostrar la ventana del boleto
    document.getElementById("boleto").classList.add("mostrar");

});


// FUNCIÓN PARA CERRAR EL BOLETO
function cerrarBoleto() {

    document.getElementById("boleto").classList.remove("mostrar");

}
