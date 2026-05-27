<div id="modalEditar" style="display:none; position:fixed; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.5);">

  <div style="background:white; padding:20px; width:400px; margin:100px auto; border-radius:10px;">
    
    <h3>Editar producto</h3>

    <form id="formEditar" method="POST" action="../actions/upload_producto.php" enctype="multipart/form-data">

      <input type="hidden" name="id" id="edit_id">

      <label>Nombre:</label>
      <input type="text" name="nombre" id="edit_nombre">

      <label>Precio:</label>
      <input type="number" name="precio" id="edit_precio">

      <label>Categoría:</label>
      <select name="categoria" id="edit_categoria">
        <option value="CAMISA">Camisas</option>
        <option value="TAZA">Tazas</option>
        <option value="GORRA">Gorras</option>
        <option value="SUDADERA">Sudaderas</option>
      </select>

      <label>Etiqueta:</label>
      <select name="etiqueta" id="edit_etiqueta">
        <option value="">Sin etiqueta</option>
        <option value="nuevo">Nuevo</option>
        <option value="popular">Popular</option>
      </select>

      <label>Imagen:</label>
      <input type="file" name="imagen" accept="image/*">

      <br><br>
      <button type="submit">Actualizar</button>
      <button type="button" onclick="cerrarModal()">Cancelar</button>

    </form>

  </div>
</div>