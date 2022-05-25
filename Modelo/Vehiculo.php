<?php
class Vehiculo{
    private $idVehiculo;
    private $Kilometraje;
    private $Placa;
    private $V_Soat;
    private $V_Tecno;
    private $idPropietario;

    //Definir el constructor
    public function __construct(){

    }

    public function setidVehiculo($e_idVehiculo){
        $this->idVehiculo = $e_idVehiculo;
    }

    public function setKilometraje($e_Kilometraje){
        $this->Kilometraje = $e_Kilometraje;
    }

    public function setPlaca($e_Placa){
        $this->Placa = $e_Placa;
    }

    public function setV_Soat($e_V_Soat){
        $this->V_Soat = $e_V_Soat;
    }

    public function setV_Tecno($e_V_Tecno){
        $this->V_Tecno = $e_V_Tecno;
    }

    public function set_idPropietario($e_idPropietario){
        $this->idPropietario = $e_idPropietario;
    }

    public function getidVehiculo(){
        return $this->idVehiculo;
    }

    public function getKilometraje(){
        return $this->idKilometraje;
    }

    public function getPlaca(){
        return $this->Placa;
    }

    public function getV_Soat(){
        return $this->V_Soat;
    }

    public function getV_Tecno(){
        return $this->V_Tecno;
    }

    public function getidPropietario(){
        return $this->idPropietario;
    }


    
}

?>