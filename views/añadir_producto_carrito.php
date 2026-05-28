<div id="modalCarrito" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">

  <div style="background:white; padding:20px; width:400px; margin:100px auto; border-radius:10px;">
    <h3 id="modalNombre"></h3>
    <p id="modalPrecio"></p>

    <label>Cantidad:</label>
    <input type="number" id="modalCantidad" value="1" min="1">

    <input type="hidden" id="modalProductoId">

    <button onclick="agregarAlCarrito()">Agregar</button>
    <button onclick="cerrarModalCarrito()">Cancelar</button>
    </div>  
</div>