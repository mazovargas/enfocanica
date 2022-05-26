<?php
require_once('../Controlador/ControladorVehiculo.php');
require_once('../Controlador/ControladorVehiculo.php');
//require_once('layoutSuperior.php');
$Vehiculo=$controladorVehiculo->buscarVehiculo($_REQUEST['idVehiculo']);
?>


    <h1 align="center">Editar Vehiculo</h1>
    <form action="../Controlador/ControladorVehiculo.php" method="POST">
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
        <label>Kilometraje:</label>
        <input type="number" name="kilometraje" id="Kilometraje" value="<?php echo $Vehiculo->getKilometraje() ?>">
        <br>
        <label>Placa:</label>
        <input type="text" name="Placa" id="Placa" value="<?php echo $Vehiculo->getPlaca() ?>">
        <br>
        <label>V.Soat</label>
        <input type="date" name="V.Soat" id="V.Soat" value="<?php echo $Vehiculo->getV_Soat() ?>">
        <br>
        <label>V.Tecno</label>
        <input type="date" name="V.Tecno" id="V.Tecno" value="<?php echo $Vehiculo->getV_Tecno() ?>">
        <br>
        <button type="submit" name="Actualizar">Actualizar</button>
    </form>
<?php
//require_once('layoutInferior.php');
?>