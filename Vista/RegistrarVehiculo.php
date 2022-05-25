<?php
require_once('../Controlador/controladorVehiculo.php');
//require_once('layoutSuperior.php');
?>

 <a href="../Controlador/controladorVehiculo.php?vista=RegistrarVehiculo.php">Registrar</a>
    <h1 align="center">Vehiculos</h1>
    <table border="1" align="center">
        <thead>
            <tr>
                <th>Vehiculo</th>
                <th>Kilometraje</th>
                <th>Placa</th>
                <th>V.Soat</th>
                <th>V.Tecno</th>
                <th>idPropietario</th>
            </tr>
        </thead>
        <tbody>
            <?php
                foreach($listarVehiculo as $Vehiculo){
                    echo "<tr>";
                    echo "<td>".$Vehiculo['idVehiculo']."</td>";
                    echo "<td>".$Vehiculo['Kilometraje']."</td>";
                    echo "<td>".$Vehiculo['Placa']."</td>";
                    echo "<td>".$Vehiculo['V_Soat']."</td>";
                    echo "<td>".$Vehiculo['V_Tecno']."</td>";
                    echo "<td>".$Vehiculo['idPropietario']."</td>";
                    echo " <td>
                    <form id='frmCategoria$Vehiculo[idVehiculo]' method = 'POST' action = '../controlador/ControladorVehiculo.php' >
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
        function validarEliminacion(idCategoria){
            if(confirm('¿Realmente desea eliminar?')){
                document.getElementById('frmCategoria'+idCategoria).submit();
            }
        }

    </script>
<?php
//require_once('layoutInferior.php');
?>