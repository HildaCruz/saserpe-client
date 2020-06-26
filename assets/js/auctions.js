function init() {
    $(document).ready(function() {
        setupStocksEventSource();
        setupNewPropuestaEventSrouce();
        setupEndPropuestaEventSrouce();
        setupUpdatePropuestaEventSrouce();
        getAcciones();
    });
}

function setupStocksEventSource() {
    var source = new EventSource('http://localhost:8080/suscribe-hilos?sessionID=C');
    source.addEventListener('bloqueo-hilos', function(e) {
        //var updatedStocks = JSON.parse(e.data);
        //updatedStocks.forEach(function(updatedStock) {
            alert(e.data);
        //});

    }, false);
}

function setupEndPropuestaEventSrouce() {
    var source = new EventSource('http://localhost:8080/suscribe-hilos?sessionID=C');
    source.addEventListener('finalizacion-propuesta', function(e) {
        //alert(e.data);
    }, false);
}

function setupUpdatePropuestaEventSrouce() {
    var source = new EventSource('http://localhost:8080/suscribe-hilos?sessionID=C');
    source.addEventListener('actualizar-propuesta', function(e) {
        //alert(e.data);
    }, false);
}

function setupNewPropuestaEventSrouce() {
    var source = new EventSource('http://localhost:8080/suscribe-propuesta?sessionID=C');
    source.addEventListener('propuesta-news', function(e) {
        //alert(e.data);
    }, false);
}

function getAcciones(){
    $.ajax({
       url:'http://localhost:8080/visualizar-acciones',
       type: 'GET', dataType:'JSON',
       success: function (response) {
           var company = "";
           response.forEach(function(entry) {
               var table =
                   "<tr><td>" + entry['rfc_empresa'] + "</td>"
               +   "<td>" + entry['acciones_empr_disp'] + "</td>"
               +   "<td>" + entry['acciones_empr_total'] + "</td>"
               +   "<td>" + entry['precio_accion_empr'] + "</td></tr>";

               company += (table);
               console.log(entry);
           });
           $('#companies').innerHTML = company;

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
        RFC_empresa: "1234567891",
        precio_accion_prop: "2",
        operacion_accion_prop: "1",
        tipo_accion: "C"
    };
    alert(JSON.stringify(request));
    $.ajax({
        url:'http://127.0.0.1:8080/upload-propuesta/',
        type: 'POST', dataType:'application/JSON',
        data: JSON.stringify(request),
        success: function (response) {
            console.log(response);
        }
    });
}

function sellStocks(company,stocks,price_offer){
 /*
 var request = {
        RFC_usuario:"1111111111",
        RFC_empresa: "1234567891",
        precio_accion_prop: "2",
        operacion_accion_prop: "1",
        tipo_accion: "V"
    };
    alert(JSON.stringify(request));
    $.ajax({
        url:'http://127.0.0.1:8080/upload-propuesta/',
        type: 'POST', dataType:'application/JSON',
        data: JSON.stringify(request),
        success: function (response) {
            console.log(response);
        }
    });
 * */
}

init();