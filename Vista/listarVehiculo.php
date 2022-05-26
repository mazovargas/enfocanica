<?php
require_once('../Controlador/ControladorVehiculo.php');
//require_once('layoutSuperior.php');
?>

    <a href="../Controlador/controladorVehiculo.php?vista=RegistrarVehiculo.php">Registrar</a>
    <h1 align="center">Productos</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Vehiculo</th>
                <th>Kilometraje</th>
                <th>Placa</th>
                <th>V.Soat</th>
                <th>V.Tecno</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listarVehiculo as $Vehiculo){
                    echo "<tr>";
                    echo "<td>".$Vehiculo['idVehiculo']."</td>";
                    echo "<td>".$Vehiculo['Kilometraje']."</td>";
                   // echo "<td>$".number_format($Vehiculo['Precio'],1,",",".") ."</td>";
                    echo " <td>
                    <form id='frmVehiculo$Vehiculo[idVehiculo]' method = 'POST' action = '../controlador/ControladorVehiculo.php' >
                        <input type='hidden' name = 'idVehiculo' value=".$Vehiculo['idVehiculo']." />
                        <button type='submit' name= 'Editar'>Editar</button>
                        <input type='hidden' name='Eliminar' />
                        <button type='button' onclick='validarEliminacion($Vehiculo[idVehiculo])' name= 'Eliminar'>Eliminar</button>
                    </form>
                    </td>";
                    echo "</tr>";
                }
            ?>
        </tbody>
    </table>

    <script>
        function validarEliminacion(idVehiculo){
            if(confirm('¿Realmente desea eliminar?')){
                document.getElementById('frmVehiculo'+idVehiculo).submit();
            }
        }

    </script>
<?php
//require_once('layoutInferior.php');
?>