<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.5.1.min.js"></script>
<script language="JavaScript" src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script language="JavaScript" type="text/javascript" src="<?php echo base_url();?>assets/js/auctions.js"></script>

<div class="container">
    <div>
        <?= $string ?>
        <table>
            <tr>
                <th>RFC</th>
                <th>Acciones Totales</th>
                <th>Acciones Disponibles</th>
                <th>Valor por Accion</th>
            </tr>
            <span id="companies"></span>
        </table>
    </div>

    <div>
        <div id="response_messages" class="message"></div>
        <input id="company" placeholder="compañía">
        <input id="stocks" placeholder="número de acciones">
        <input id="price_offer" placeholder="precio propuesto">
        <button class="btn-icon" onclick="stocks('b')">Compra</button>
        <button class="btn-icon" onclick="stocks('s')">Venta</button>
    </div>
</div>

