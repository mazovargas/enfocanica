<?php
require_once('../Controlador/controladorProducto.php');
require_once('layoutSuperior.php');
?>

    <a href="../Controlador/controladorProducto.php?vista=registrarProducto.php">Registrar</a>
    <h1 align="center">Productos</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listaProducto as $Producto){
                    echo "<tr>";
                    echo "<td>".$Producto['idProducto']."</td>";
                    echo "<td>".$Producto['Nombre']."</td>";
                    echo "<td>$".number_format($Producto['Precio'],1,",",".") ."</td>";
                    echo " <td>
                    <form id='frmProducto$Producto[idProducto]' method = 'POST' action = '../controlador/controladorProducto.php' >
                        <input type='hidden' name = 'idProducto' value=".$Producto['idProducto']." />
                        <button type='submit' name= 'Editar'>Editar</button>
                        <input type='hidden' name='Eliminar' />
                        <button type='button' onclick='validarEliminacion($Producto[idProducto])' name= 'Eliminar'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <script>
        function validarEliminacion(idProducto){
            if(confirm('¿Realmente desea eliminar?')){
                document.getElementById('frmCategoria'+idProducto).submit();
            }
        }

    </script>
<?php
require_once('layoutInferior.php');
?>