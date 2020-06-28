
<link rel="stylesheet" href="<?php echo base_url();?>assets/css/auctions.css">
<div class="container">
<button id="btn_logout" type="button" class="btn btn-danger" onclick="logout()">Logout</button>
<input style="display:none;" id="sesion" name = "sesion" value="<?= $this->session->userdata('id_sesion');?>">
<input style="display:none;" id="rfc" name = "rfc" value="<?= $this->session->userdata('rfc_usuario');?>">
<div id="principal" class="overflow-auto">
        <?php
        echo "Sesion ID ". $this->session->userdata('id_sesion');
         ?>
        <h1>Acciones</h1>
        <div id = "tabla_empresas">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">RFC Empresa</th>
                        <th scope="col">Acciones Totales</th>
                        <th scope="col">Acciones Disponibles</th>
                        <th scope="col">Precio de compra actual</th>
                    </tr>
                </thead>
                <tbody id="companies"></tbody>
            </table>
        </div>
    <br>
    <div>
        <h1>Propuestas</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">RFC Empresa</th>
                    <th scope="col">RFC Usuario</th>
                    <th scope="col">Precio propuesto</th>
                    <th scope="col">Fecha y Hora</th>
                    <th scope="col">Tipo de Accion</th>
                    <th scope="col">No. Acciones</th>
                </tr>
            </thead>
            <tbody id="propuesta_activas"></tbody>
        </table>
    </div>
    <br>
    <div>
        <h1>Mi portafolio</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">RFC Empresa</th>
                    <th scope="col">Acciones compradas</th>
                    <th scope="col">Último precio de Compra ofertado</th>
                </tr>
            </thead>
            <tbody id="portafolio"></tbody>
        </table>
    </div>
    
    <br>
    <div id="response_messages" class="message" style="color: blue"></div>
    <div id = "mensaje_correcto" class="alert alert-success alert-dismissible fade show" role="alert">
        <strong id="mensajeBueno"></strong>
        <button id = "button_correcto" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>
    <div id = "mensaje_error" class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong id="mensajeMalo"></strong>
        <button id = "button_error" type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    </div>

    <form id="form_propuesta">
        <h1>Realizar propuesta</h1>
        <div class="form-group">
            <label for="company">Empresa</label>
            <input type="text" class="form-control" id="company" placeholder="Ingresa la compañia">
        </div>
        <div class="form-group">
            <label for="stocks">No. Acciones</label>
            <input type="number" class="form-control" id="stocks" placeholder="Número de acciones">
        </div>
        <div class="form-group">
            <label for="price_offer">Precio propuesto</label>
            <input type="number" class="form-control" id="price_offer" placeholder="Precio propuesto">
        </div>
    </form>
    <button id = "btn_compra" type="button" class="btn btn-primary" onclick="stocks('b')">Compra</button>
    <button id = "btn_venta"  type="button" class="btn btn-primary" onclick="stocks('s')">Venta</button>
</div>
</div>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.5.1.min.js"></script>
<script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/js/auctions.js"></script>


