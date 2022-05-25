<?php

require_once('../Modelo/Vehiculo.php'); //Incluir el modelo Producto
require_once('../Modelo/CrudVehiculo.php'); //Incluir el CRUD.
class controladorVehiculo
{
   //Crear el constructor

   public function __construct(){
   }

   public function listarVehiculo(){
      $CrudVehiculo = new CrudVehiculo(); //Instanciar crudProducto
      $listarVehiculo = $CrudVehiculo->listarVehiculo(); //Listado de Productos
      return $listarVehiculo;
   }

  
   public function registrarVehiculo($e_idVehiculo,$e_kilometraje,$e_Placa,$e_V_Soat,$e_V_Tecno,$e_idPropietario){
      $Vehiculo = new Vehiculo(); 
      $Vehiculo->setidVehiculo('');
      $Vehiculo->setKilometraje($e_kilometraje);
      $Vehiculo->setPlaca($e_Placa); 
      $Vehiculo->setV_Soat($e_V_Soat);
      $Vehiculo->setV_Tecno($e_V_Tecno);
      $Vehiculo->set_idPropietario($e_idPropietario);
      

      //SOLICITAR AL MODELO QUE REALIZE LA INSERCION
      $CrudVehiculo = new CrudVehiculo();
      $mensaje =  $CrudVehiculo->registrarVehiculo($Vehiculo);
      echo "
     <script>
         alert('$mensaje');
         document.location.href = '../vista/listarProducto.php';
     </script>
      ";
   }

   public function buscarProducto($e_idProducto)
   {
      $Producto = new Producto(); //Definir un objeto de la clase Producto
      $Producto->setidProducto($e_idProducto); //setear valores

      $crudProducto = new crudProducto(); //Definir un objeto de la clase crud Producto
      $datosProducto = $crudProducto->buscarProducto($Producto); //llamar el metodo del crud

      $Producto->setnombre($datosProducto['Nombre']);
      $Producto->setidCategoria($datosProducto['idCategoria']);
      $Producto->setprecio($datosProducto['Precio']);
      $Producto->setestado($datosProducto['Estado']);
      //var_dump($datosProducto);
      return ($Producto);
   }

   public function actualizarProducto($e_idProducto, $e_nombre, $e_idCategoria, $e_Precio, $e_Estado)
   {
      //instanciacion del objeto
      $Producto = new Producto(); //crear un objeto de tipo Producto
      $Producto->setidProducto($e_idProducto); //asignar el valor del formulario
      $Producto->setnombre($e_nombre);
      $Producto->setidCategoria($e_idCategoria);  //setear es agregar valores a un objeto de una Producto
      $Producto->setPrecio($e_Precio);
      $Producto->setEstado($e_Estado);  
      //SOLICITAR AL MODELO QUE REALIZE LA INSERCION
      $crudProducto = new crudProducto();
      $crudProducto->actualizarProducto($Producto);

      echo "
      <script>
          alert('$mensaje');
          document.location.href = '../vista/listarProducto.php';
      </script>
       ";
   }

   public function eliminarProducto($e_idProducto)
   {
      //instanciacion del objeto
      $Producto = new Producto(); //crear un objeto de tipo Producto
      $Producto->setidProducto($e_idProducto); //asignar el valor del formulario
      //$Producto->setnombre(''); //setear es agregar valores a un objeto de una Producto

      //SOLICITAR AL crudProducto QUE REALIZE LA INSERCION
      $crudProducto = new crudProducto();
      $crudProducto->eliminarProducto($Producto);
   }

   public function desplegarVista($pagina)
   {
      //Redireccionar hacia la nueva vista
      header("location:../Vista/" . $pagina);
   }
}

//Probar el Controlador
$controladorVehiculo = new controladorVehiculo();
$listarVehiculo = $controladorVehiculo->listarVehiculo(); //Verificar si se devuelven datos


//verificar la accion a realizar 
if (isset($_POST['Registrar'])) { //isset confirma si una variable existe
   echo "Registrando";
   $e_idCategoria = $_POST['idCategoria'];
   $e_nombre = $_POST['nombre'];
   $e_Precio = $_POST['Precio'];
   $e_Estado = $_POST['Estado'];

   $controladorProducto->registrarProducto($e_idCategoria,$e_nombre,$e_Precio,$e_Estado);
}
 else if (isset($_POST['Editar'])) {
   $e_idProducto = $_POST['idProducto']; //Recibir variable del formulario
   // echo $e_idProducto;
   $controladorProducto->desplegarVista("editarProducto.php?idProducto=$e_idProducto");
}
 else if (isset($_REQUEST['Actualizar'])) {
   //capturar valores enviados desdde la vista
   $e_idProducto = $_REQUEST['idProducto'];
   $e_nombre = $_REQUEST['nombre'];
   $e_idCategoria = $_REQUEST['idCategoria'];
   $e_Precio = $_REQUEST['Precio'];
   $e_Estado = $_REQUEST['Estado'];


   //llamar el metodo actualizarCaegoria
   $controladorProducto->actualizarProducto($e_idProducto, $e_nombre, $e_idCategoria, $e_Precio, $e_Estado);
}
 else if (isset($_REQUEST['Eliminar'])) {
   //capturar valores enviados desdde la vista
   $e_idProducto = $_REQUEST['idProducto'];

   //llamar el metodo eliminarProducto
   $controladorProducto->eliminarProducto($e_idProducto);
}
 elseif (isset($_REQUEST['vista'])) {
   $controladorProducto->desplegarVista($_REQUEST['vista']);
}

