<?php
require_once('../Controlador/controladorCategoria.php');
require_once('../Controlador/controladorProducto.php');
require_once('layoutSuperior.php');
$Producto=$controladorProducto->buscarProducto($_REQUEST['idProducto']);
?>


    <h1 align="center">Editar Producto</h1>
    <form action="../Controlador/controladorProducto.php" method="POST">
        <label>Id Producto</label>
        <input type="text" name="idProducto" id="idProducto" readonly value="<?php echo $Producto->getidProducto() ?>"> 
        <br>
        <label>Categoria</label>
        <select name="idCategoria" id="idCategoria">
            <option value="">Seleccione</option>
            <?php
                foreach($listaCategoria as $Categoria){

            ?>
<option value="<?php echo $Categoria ['idCategoria'] ?>"
<?php if($Categoria['idCategoria'] == $Producto->getidCategoria())
{
    ?>
selected
<?php
}
?>
>
<?php echo $Categoria['nombre']; ?>
</option>
<?php
                }
?>            
        </select>
        <br>
        <label>Nombre:</label>
        <input type="text" name="nombre" id="nombre" value="<?php echo $Producto->getNombre() ?>">
        <br>
        <label>Precio:</label>
        <input type="text" name="Precio" id="Precio" value="<?php echo $Producto->getPrecio() ?>">
        <br>
        <label>Estado</label>
        <input type="text" name="Estado" id="Esatdo" value="<?php echo $Producto->getestado() ?>">
        <br>
        <button type="submit" name="Actualizar">Actualizar</button>
    </form>
<?php
require_once('layoutInferior.php');
?>