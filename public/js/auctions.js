
var sesionID = $('#sesion').val();
var idUser = $('#rfc').val();
var urlLocal = 'http://localhost:8080/';

function init() {
    $(document).ready(function() {
        setupStocksEventSource();
        setupNewPropuestaEventSrouce();
        getPropuestas();
        getAcciones();
        getPortafolio();
    });
}
function getPropuestas(){
    $.ajax({
        url: urlLocal+'propuestas',
        type: 'GET', dataType:'JSON',
        success: function (response) {
            $("#propuesta_activas").html("");
            var html_tr = "";
            response.forEach(function(entry) {
                var tipo = "";
                if (entry['tipo_accion'] == 'C'){
                    tipo = "Compra";
                } else if (entry['tipo_accion'] == 'V'){
                    tipo = "Venta";
                }
                html_tr = "<tr><td>{rfc_e}</td><td>{rfc_u}</td><td>{propuesta}</td><td>{fecha}</td><td>{tipo}</td><td>{numero}</td></tr><br>";
                html_tr = html_tr.replace("{rfc_e}", entry['RFC_usuario']);
                html_tr = html_tr.replace("{rfc_u}", entry['RFC_empresa']);
                html_tr = html_tr.replace("{propuesta}", entry['precio_accion_prop']);
                html_tr = html_tr.replace("{fecha}", entry['fecha_prop']);
                html_tr = html_tr.replace("{tipo}", tipo);
                html_tr = html_tr.replace("{numero}",entry['operacion_accion_prop']);
                $("#propuesta_activas").append(html_tr);
        });
         
        }
     });
}
function setupStocksEventSource() {
    var source = new EventSource(urlLocal+'suscribe-hilos?sessionID='+sesionID);
    source.addEventListener('bloqueo-hilos', function(e) {
         console.log(e.data);
         var data = JSON.parse(e.data);
         var is_blocked = data.bloqueo;

         if(is_blocked === true){
             $("#btn_compra").disabled = true;
             $("#btn_venta").disabled = true;
         }
         if(is_blocked === false){
             $("#btn_compra").disabled = false;
             $("#btn_venta").disabled = false;
         }
    }, false);
    source.addEventListener('finalizacion-propuesta', function(e) {
        console.log(e.data);
        var message = "";
        var data = JSON.parse(e.data);
        var is_winner = data.ganador;

        if(data.tipoAccion === "C"){
            if (is_winner === true){
                message = "Felicidades, ganaste acciones de la empresa " + data.empresa;
                document.getElementById("mensajeBueno").innerHTML = message;
                document.getElementById("mensaje_correcto").style.display = 'block';
                $("#mensaje_correcto").delay(3200).fadeOut(3000);
            }
            else if (is_winner === false) {
                message = "Lo sentimos, no ganaste acciones de la empresa " + data.empresa;
                document.getElementById("mensajeMalo").innerHTML = message;
                document.getElementById("mensaje_error").style.display = 'block';
                $("#mensaje_error").delay(3200).fadeOut(3000);
            }
        }
        else if (data.tipoAccion=== "V") {
            if (is_winner === true){
                message = "Felicidades, vendiste acciones de la empresa " + data.empresa;
                document.getElementById("mensajeBueno").innerHTML = message;
                document.getElementById("mensaje_correcto").style.display = 'block';
                $("#mensaje_correcto").delay(3200).fadeOut(3000);
            }
            else if (is_winner === false) {
                message = "Lo sentimos, no vendiste acciones de la empresa " + data.empresa;
                document.getElementById("mensajeMalo").innerHTML = message;
                document.getElementById("mensaje_error").style.display = 'block';
                $("#mensaje_error").delay(3200).fadeOut(3000);
            }
        }
         //$("#response_messages").append(message);
    }, false);
    source.addEventListener('actualizar-propuesta', function(e) {
        setTimeout(function(){location.reload()}, 8000);
    }, false);
}
function setupNewPropuestaEventSrouce() {
    var source = new EventSource(urlLocal+'suscribe-propuesta');
    source.addEventListener('propuesta-news', function(e) {
        setTimeout(function(){location.reload()}, 8000);
    }, false);
}

function getAcciones(){
    $.ajax({
       url: urlLocal+'visualizar-acciones',
       type: 'GET', dataType:'JSON',
       success: function (response) {
           $("#companies").html("");
           var html_tr = "";
           response.forEach(function(entry) {
            html_tr ="<tr><td>{rfc}</td><td>{acciones}</td><td>{total}</td><td>{precio}</td></tr><br>";
            html_tr = html_tr.replace("{rfc}", entry['rfc_empresa']);
            html_tr = html_tr.replace("{acciones}", entry['acciones_empr_disp']);
            html_tr = html_tr.replace("{total}", entry['acciones_empr_total']);
            html_tr = html_tr.replace("{precio}",  entry['precio_accion_empr'] );
            $("#companies").append(html_tr);
       });
        
       }
    });
}

function getPortafolio() {
    $.ajax({
        url: urlLocal+'visualizar-portafolio/'+idUser,
        type: 'GET', dataType:'JSON',
        success: function (response) {
            $("#portafolio").html("");
            var html_tr = "";
            response.forEach(function(entry) {
                html_tr ="<tr><td>{rfc}</td><td>{acciones}</td><td>{precio_compra}</td><td>{precio_actual}</td></tr><br>";
                html_tr = html_tr.replace("{rfc}", entry['rfc_empresa']);
                html_tr = html_tr.replace("{acciones}", entry['acciones_usr']);
                html_tr = html_tr.replace("{precio_compra}",  entry['precio_compra'] );
                html_tr = html_tr.replace("{precio_actual}", entry['precio_accion_usr']);
                $("#portafolio").append(html_tr);
            });

        }
    });
}

function stocks(action){
 var company = document.getElementById('company').value;
 var stocks = document.getElementById('stocks').value;
 var price_offer = document.getElementById('price_offer').value;

 if(company !== "" && stocks !== "" && price_offer !==""){
     if (action == 'b'){
         buyStocks(company, stocks, price_offer);
    } else if (action == 's'){
        sellStocks(company,stocks,price_offer);
    }

 }
 else{
     alert("Los campos no pueden esta vacíos");
 }

}

function buyStocks(company,stocks,price_offer){
    var request = {
        RFC_usuario: idUser,
        RFC_empresa: company,
        precio_accion_prop: price_offer,
        operacion_accion_prop: stocks,
        tipo_accion: "C"
    };
    
    $.ajax({
        url:urlLocal+'upload-propuesta/',
        type: 'POST', 
        contentType: "application/json",
        dataType: "json",
        data: JSON.stringify(request),
        success: function (response) {
            console.log(response);
            document.getElementById("mensajeBueno").innerHTML = response.mensaje;
            document.getElementById("mensaje_correcto").style.display = 'block';
            cleanData();
            $("#mensaje_correcto").delay(3200).fadeOut(3000);
            //$("#response_messages").append(response.mensaje);

        },
        error : function(error) {
            console.log(error);
            var message = error.responseJSON;
            document.getElementById("mensajeMalo").innerHTML = message.mensaje;
            document.getElementById("mensaje_error").style.display = 'block';
            $("#mensaje_error").delay(3200).fadeOut(3000);
            //$("#response_messages").append(message.mensaje);//sin lo de json parse el index era mensaje, responseText es donde esta el mensaje
        }
    });
}

function sellStocks(company,stocks,price_offer){
    var request = {
        RFC_usuario: idUser,
        RFC_empresa: company,
        precio_accion_prop: price_offer,
        operacion_accion_prop: stocks,
        tipo_accion: "V"
    };
    
    $.ajax({
        url:urlLocal+'upload-propuesta/',
        type: 'POST', contentType:'application/JSON',
        dataType: "json",
        data: JSON.stringify(request),
        success: function (response) {
            console.log(response);
            document.getElementById("mensajeBueno").innerHTML = response.mensaje;
            document.getElementById("mensaje_correcto").style.display = 'block';
            cleanData();
            $("#mensaje_correcto").delay(3200).fadeOut(3000);
        },
        error : function(error) {
            console.log(error);
            var message = error.responseJSON;
            document.getElementById("mensajeMalo").innerHTML = message.mensaje;
            document.getElementById("mensaje_error").style.display = 'block';
            $("#mensaje_error").delay(3200).fadeOut(3000);
            //$("#response_messages").append(message.mensaje);//lo mismo aca, si jala en compra jala en venta
        }
    });
}
function logout(){
    window.location.href = 'http://localhost/saserpe-client/login/logout';
}
function cleanData(){
    document.getElementById("company").value='';
    document.getElementById("stocks").value='';
    document.getElementById("price_offer").value='';
}
init();
