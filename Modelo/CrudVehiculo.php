<?php
//APLICACIONES TRANSACCIONALES 
//CRUD : CREATE=crear / READ=leer / UPDATE=modificar / DELET=eliminar

require_once('conexion.php');//Incluir el archivo conexión
class CrudVehiculo{
    public function __construct(){
    }

    public function listarVehiculo(){ //READ
      $baseDatos = Conexion::conectar();
      $sql = $baseDatos->query('SELECT * FROM Vehiculo ORDER BY Placa ASC ');
      $sql->execute();
      Conexion::desconectar($baseDatos);
      return($sql->fetchAll());
    }

    public function RegistrarVehiculo($Vehiculo){//UPDATE
      $mensaje = ""; //declarar una variable llamada mensaje
      //Establecer una conexion a la base de datos
      $baseDatos = Conexion::conectar();
        $sql = $baseDatos->prepare('INSERT INTO
        Vehiculo(idVehiculo,Kilometraje,Placa,V_Soat,V_Tecno,idPropietario)
        VALUES(:e_idVehiculo,:e_kilometraje,:e_Placa,:e_V_Soat,:e_V_Tecno,:e_idPropietario) 
        ');
       
        $sql->bindValue('e_idVehiculo', $Vehiculo->getidVehiculo());
        $sql->bindValue('e_Kilometraje', $Vehiculo->getKilometraje());
        $sql->bindValue('e_Placa', $Vehiculo->getPlaca());
        $sql->bindValue('e_V_Soat', $Vehiculo->getV_Soat());
        $sql->bindValue('e_V_Tecno', $Vehiculo->getV_Tecno());
        $sql->bindValue('e_idPropietario', $Vehiculo->getidPropietario());

       try{ 
          $sql->execute(); //esto se ejecuta si todo sale bien 
          //echo "conexion exitosa";
          $mensaje = "Registro exitoso";
         }

         catch(Exception $excepcion){
          //se usa para capturar ecepciones ecepciones son : id iguales, base de datos mal nombrada etc
          //exepciones que no se pueden controlar
          $mensaje = "Problemas en registro";
         // echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
          }

        Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
        return $mensaje;
    }

    public function buscarVehiculo($Vehiculo){ //READ

      //Establecer la conexión a la base datos
      $baseDatos = Conexion::conectar();
      //Definir la sentencia sql
      $sql = $baseDatos->query("SELECT * FROM Producto WHERE idVehiculo=".$Vehiculo->getidVehiculo());
      //Ejecutar la consulta
      $sql->execute();
      //Cerrar la conexión
      Conexion::desconectar($baseDatos);
      //Retornar el resultado de la consulta a la tabla.
      return($sql->fetch());//Retornar el resultado de la consulta
    }

    public function actualizarProducto($Producto){//UPDATE
      //Establecer la conexion a la base de datos
      //var_dump($categoria);
      $baseDatos = Conexion::conectar();
      //Preparar la sentencia sql
      //e_ indica que es un dato de entrada
        $sql = $baseDatos->prepare('UPDATE 
        Producto SET idCategoria=:e_idCategoria, nombre =:e_nombre, Precio =:e_Precio,
         Estado =:e_Estado WHERE idProducto=:e_idProducto');
        //las siguientes lineas capturan los valores de los atributos del objeto
        //del objeto categoria ('e_idCategoria' se almacena lo que hay en $categoria->getidCategoria) y ()
        $sql->bindValue('e_idCategoria', $Producto->getidCategoria());
        $sql->bindValue('e_nombre', $Producto->getnombre());
        $sql->bindValue('e_Precio', $Producto->getPrecio());
        $sql->bindValue('e_idProducto', $Producto->getidProducto());




        try{ //capturar excdpciones de la base de datos
          //Ejecutar la consola
          $sql->execute(); //esto se ejecuta si todo sale bien 
          echo "Actualizacion exitosa";
         }

         catch(Exception $excepcion){//Exception: Excepcion o un error
          echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
          echo "Problemas en la actualizacion";
          }

        Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
    }


    public function eliminarProducto($Producto){//UPDATE
      //Establecer la conexion a la base de datos
      //var_dump($categoria);
      $baseDatos = Conexion::conectar();
      //Preparar la sentencia sql
      //e_ indica que es un dato de entrada
        $sql = $baseDatos->prepare('DELETE FROM
        Producto WHERE idProducto=:e_idProducto');
        //las siguientes lineas capturan los valores de los atributos del objeto
        //del objeto categoria ('e_idCategoria' se almacena lo que hay en $categoria->getidCategoria) y ()
        $sql->bindValue('e_idProducto', $Producto->getidProducto());
        try{ //capturar excdpciones de la base de datos
          //Ejecutar la consola
          $sql->execute(); //esto se ejecuta si todo sale bien 
          echo "Eliminacion exitosa";
         }

         catch(Exception $excepcion){//Exception: Excepcion o un error
          echo $excepcion->getMessage();//funcion reserbada de php sirve para imprimir mensajes de error
          echo "Problemas en la eliminacion";
          }

        Conexion::desconectar($baseDatos);//siempre se cierra la conexion 
    }


}

?>