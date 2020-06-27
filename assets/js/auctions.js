
var sesionID = $('#sesion').val();
var idUser = $('#rfc').val();
var urlLocal = 'http://localhost:8080/';

function init() {
    $(document).ready(function() {
        setupStocksEventSource();
        setupNewPropuestaEventSrouce();
        getAcciones();
        getPortafolio();
    });
}

function setupStocksEventSource() {
    var source = new EventSource(urlLocal+'suscribe-hilos?sessionID='+sesionID);
    source.addEventListener('bloqueo-hilos', function(e) {
         console.log(e.data);
         var data = JSON.parse(e.data);
         var is_blocked = data.bloqueo;

         if(is_blocked === true){
             //alert("bloqueo aHHH");
             $("#btn_compra").disabled = true;
             $("#btn_venta").disabled = true;
         }
         if(is_blocked === false){
             //alert("desblokeo");
             $("#btn_compra").disabled = false;
             $("#btn_venta").disabled = false;
         }

        $("#response_messages").append(e.data);
    }, false);
    source.addEventListener('finalizacion-propuesta', function(e) {
        console.log(e.data);
        var message = "";
        var data = JSON.parse(e.data);
        var is_winner = data.ganador;
        if (is_winner === true){
            message = "Felicidades, ganaste x acciones de la empresa x";
        }
        if (is_winner === true) {
            message = "Lo sentimos, no ganaste x acciones de la empresa x :c";
        }
         $("#response_messages").append(message);
         //mensajes
    }, false);
    source.addEventListener('actualizar-propuesta', function(e) {
         console.log(e.data);
         $("#response_messages").append(e.data);
         //mensajes
         //reload page
         location.reload();
    }, false);
}
function setupNewPropuestaEventSrouce() {
    var source = new EventSource(urlLocal+'suscribe-propuesta');
    source.addEventListener('propuesta-news', function(e) {
        console.log(e.data);
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

function getPortafolio(RFC_usuario) {
    $.ajax({
        url: urlLocal+'visualizar-portafolio/'+idUser,
        type: 'GET', dataType:'JSON',
        success: function (response) {
            $("#portafolio").html("");
            var html_tr = "";
            response.forEach(function(entry) {
                html_tr ="<tr><td>{rfc}</td><td>{acciones}</td><td>{precio_actual}</td><td>{precio_compra}</td></tr><br>";
                html_tr = html_tr.replace("{rfc}", entry['rfc_empresa']);
                html_tr = html_tr.replace("{acciones}", entry['acciones_usr']);
                html_tr = html_tr.replace("{precio_actual}", entry['precio_accion_usr']);
                html_tr = html_tr.replace("{precio_compra}",  entry['precio_compra'] );
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
    alert(JSON.stringify(request));
    $.ajax({
        url:'http://127.0.0.1:8080/upload-propuesta/',
        type: 'POST', contentType:'application/JSON', dataType:'application/JSON',
        data: JSON.stringify(request),
        success: function (response) {
            console.log(response);
            var message = JSON.parse(response);
        },
        error : function(error) {
            console.log(error);
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
    alert(JSON.stringify(request));
    $.ajax({
        url:'http://127.0.0.1:8080/upload-propuesta/',
        type: 'POST', contentType:'application/JSON', dataType:'application/JSON',
        data: JSON.stringify(request),
        success: function (response) {
            console.log(response);
            var message = JSON.parse(response);
        },
        error : function(error) {
            console.log(error);
        }
    });
}
function logout(){
    window.location.href = 'http://localhost/saserpe-client/login/logout';
}
init();
