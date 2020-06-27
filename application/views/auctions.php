<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.5.1.min.js"></script>
<script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/js/auctions.js"></script>

<div class="container">
    <div>
        <?= $string ?>
        <h1>Acciones</h1>
        <table>
            <tr>
                <th>RFC Empresa</th>
                <th>Acciones Totales</th>
                <th>Acciones Disponibles</th>
                <th>Precio de compra actual</th>
            </tr>
            <tbody id="companies"></tbody>
        </table>
    </div>
    <br>
    <div>
        <h1>Mi portafolio</h1>
        <table>
            <tr>
                <th>RFC Empresa</th>
                <th>Acciones compradas</th>
                <th>Precio de compra ofertado</th>
                <th>Precio de compra actual</th>
            </tr>
            <tbody id="portafolio"></tbody>
        </table>
    </div>
    <br>
    <div>
        <div id="response_messages" class="message" style="color: blue"></div>
        <br>
        <input id="company" placeholder="compañía">
        <input id="stocks" placeholder="número de acciones">
        <input id="price_offer" placeholder="precio propuesto">
        <button id="btn_compra" class="btn-icon" onclick="stocks('b')">Compra</button>
        <button id="btn_venta" class="btn-icon" onclick="stocks('s')">Venta</button>
    </div>
</div>

