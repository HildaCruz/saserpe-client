function init() {
    $(document).ready(function() {
        setupStocksEventSource();
        setupNewPropuestaEventSrouce();
        getAcciones();
    });
}

function setupStocksEventSource() {
    var source = new EventSource('http://localhost:8080/suscribe-hilos?sessionID=C');
    source.addEventListener('bloqueo-hilos', function(e) {
         console.log(e.data);
    }, false);
    source.addEventListener('finalizacion-propuesta', function(e) {
         console.log(e.data);
    }, false);
    source.addEventListener('actualizar-propuesta', function(e) {
         console.log(e.data);
    }, false);
}
function setupNewPropuestaEventSrouce() {
    var source = new EventSource('http://localhost:8080/suscribe-propuesta');
    source.addEventListener('propuesta-news', function(e) {
        console.log(e.data);
    }, false);
}

function getAcciones(){
    $.ajax({
       url:'http://localhost:8080/visualizar-acciones',
       type: 'GET', dataType:'JSON',
       success: function (response) {
           var company = "";
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

function stocks(action){
 var company = document.getElementById('company').value;
 var stocks = document.getElementById('stocks').value;
 var price_offer = document.getElementById('price_offer').value;

 if (action = 'b'){buyStocks(company, stocks, price_offer);}
 if (action = 's'){sellStocks(company,stocks,price_offer);}
}

function buyStocks(company,stocks,price_offer){
    var request = {
        RFC_usuario:"1111111111",
        RFC_empresa: "1987654321",
        precio_accion_prop: "2.5",
        operacion_accion_prop: "1",
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
            alert(message);
        },
        error : function(error) {
            console.log(error);
        }
    });
}

function sellStocks(company,stocks,price_offer){
    var request = {
        RFC_usuario:"1111111111",
        RFC_empresa: "1987654321",
        precio_accion_prop: "2.5",
        operacion_accion_prop: "1",
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
            alert(message);
        },
        error : function(error) {
            console.log(error);
        }
    });
}

init();