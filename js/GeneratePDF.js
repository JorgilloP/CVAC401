console.log("Funciona el js");

//Obtener la referencia al Botón Generar
var btngenerar = document.getElementById("btn-generar");

//Agregar EventListener al Botón
btngenerar.addEventListener("click", function () {
    //Generar el PDF:
    generatePDF();
});

//Función para generar el PDF
function generatePDF() {
    // Obtener los datos del formulario
    var nombre = document.getElementById("nombre").value;
    var edad = document.getElementById("edad").value;
    var raza = document.getElementById("raza").value;
    var padecimientos = document.getElementById("padecimientos").value;

    //Crear nuevo documento PDF
    var doc = new jsPDF();

    // Establecer la fuente en negrita
    doc.setFont("helvetica", "bold");

    // Obtener la fecha actual
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, "0");
    var mm = String(today.getMonth() + 1).padStart(2, "0");
    var yyyy = today.getFullYear();
    var fecha = dd + "/" + mm + "/" + yyyy;

    // Verificar si la longitud de los padecimientos es mayor que 51 caracteres
    if (padecimientos.length > 51) {
        // Dividir el texto en líneas de máximo 51 caracteres
        var padecimientosDivididos = [];
        var words = padecimientos.split(" ");
        var line = "";
        for (var i = 0; i < words.length; i++) {
            if ((line + words[i]).length <= 51) {
                line += words[i] + " ";
            } else {
                padecimientosDivididos.push(line.trim());
                line = words[i] + " ";
            }
        }
        padecimientosDivididos.push(line.trim());
        // Unir las líneas con saltos de línea
        padecimientos = padecimientosDivididos.join("\n");
    }

    // Titulo y Fecha Actual
    var titulo = "Ficha Médica";
    var tituloX =
        doc.internal.pageSize.width / 2 -
        (doc.getStringUnitWidth(titulo) * doc.internal.getFontSize()) / 2;
    doc.text(tituloX, 10, titulo);
    doc.text(160, 10, fecha);

    // Agregar línea horizontal
    doc.setLineWidth(0.5);
    doc.line(10, 15, 200, 15);

    // Establecer la fuente en negrita solo para los nombres de los campos
    doc.setFont("helvetica", "bold");

    // Agregar los nombres de los campos del formulario al PDF
    doc.text("Nombre: ", 10, 20);
    doc.text("Edad: ", 10, 30);
    doc.text("Raza: ", 10, 40);
    doc.text("Padecimientos: ", 10, 50);

    // Restaurar el estilo de fuente regular para los datos del formulario
    doc.setFont("helvetica", "normal");

    // Agregar los datos del formulario al PDF
    doc.text(nombre, 40, 20);
    doc.text(edad, 40, 30);
    doc.text(raza, 40, 40);
    doc.text(padecimientos, 40, 60);

    // Agregar Diagnóstico y Firma del Médico en la parte inferior
    doc.text("Diagnóstico: ", 10, doc.internal.pageSize.height - 40);
    doc.text("Firma del Médico: ", 100, doc.internal.pageSize.height - 40);

    //Guardar el PDF en el cliente
    doc.save("FichaMédica.pdf");

    // Imprimir el PDF automáticamente
    window.open(doc.output("bloburl"), "_blank");
}
