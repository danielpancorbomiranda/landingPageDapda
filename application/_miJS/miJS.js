$(document).ready(function() {

    // Para rellenar el select con corsa, mokka ... etc  --- SIN AJAX
    // $(".TipoDeVehiculo").change(rellenaSelectSinAjax);

    // Para rellenar el select con corsa, mokka ... etc ---  CON AJAX (en el futuro introducir multitud de modelos)
    $(".TipoDeVehiculo").change(rellenaSelectConAjax);

    // Para Spinner una vez validado el formulario
    $(".enviar").click(spinner);

    // Una simple aspa para cerrar la ventana informacion  de los errores no válidos
    $("span.x").click(cerrarVentanaEmergente);

});

function cerrarVentanaEmergente() {
    $(this).parent().hide(); // Cierro el padre, es decir, el DIV
}

/**
 * Esta función es simple, es la primera para ver los resultados
 * Si se engorda de opciones en el futuro, se mandaria un AJAX para recibir info de la base de datos
 */
function rellenaSelectSinAjax() {
    if (($(".TipoDeVehiculo").val() == "Turismo") || ($(".TipoDeVehiculo").val() == "Comercial")) {
        $(".vehiculo").html("<option value='Corsa'>Corsa</option><option value='Astra'>Astra</option>");
    } else if ($(".TipoDeVehiculo").val() == "Todo Terreno") {
        $(".vehiculo").html("<option value='Mokka'>Mokka</option><option value='Crossland'>Crossland</option>");
    }
}

/**
 * Un AJAX para recibir info de la base de datos en JSON
 * @param {*} e 
 * 
 */
function rellenaSelectConAjax(e) {
    e.preventDefault(); // Elimino el evento por defecto
    var TipoDeVehiculoV = $('.TipoDeVehiculo').val(); // estas variables se enviaran por ajax
    console.log(TipoDeVehiculoV); // Para ir viendo utilizo los datos en la consola
    $.ajax({ // Por AJAX
        data: { TipoDeVehiculo: TipoDeVehiculoV },
        type: "POST", // Enviado por POST para más tarde recoger el dato y utilizarlo en la consulta sql
        url: "../application/_ajax/RellenaSelectVehiculo/_ajaxRellenaSelectVehiculo.php",
        beforeSend: function() { // una vez q se envia se ejecutara lo de los corchetes
        },
        success: function(data) {}
    }).done(function(data) { // Una vez realizado
        console.log(data);
        if (data != 'sin datos regresados') {
            var parseado = $.parseJSON(data); // Necesito parsear los datos y luego recorrerlos
            $(".vehiculo").html(""); // Elimino primero los options que hay en el select
            for (var i in parseado) { // Añado nuevos options
                $(".vehiculo").append("<option value='" + parseado[i].Modelo + "'>" + parseado[i].Modelo + "</option>"); // para que habra un append en el padre, es decir un td nuevo 
            }
        }
    });
}

/**
 * Para que se oculte el boton envia amarillo y aparezca un spinner de carga, he pensado que en una ventana modal
 */
function spinner() {
    $(this).hide();
    // Creo una especie de ventana modal para que el usuario vez que se está procesando su solicitud
    var divModal = $("<div class='divModal'></div>").css({
        "position": "fixed",
        "width": "100%",
        "height": "100%",
        "background-color": "#F7D900", // Este es el color de Opel
        "z-index": "55",
        "top": "0px",
        "left": "0px",
        "opacity": "0.5"
    });
    var gifCargando = "<div class='divGif'><img class='divGif' alt='Ruta erronea de spinner' src='./../application/_imagenesCSS/cargando/spinner.gif' /></div>";
    divModal.append(gifCargando);
    divModal.appendTo($("body"));
    $("div.divModal div.divGif").css({ "justify-content": "center", "display": "flex", "align-items": "center", "height": "100%", "width": "100%" });
}