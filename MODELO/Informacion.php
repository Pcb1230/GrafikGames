<?php

class Informacion {
    public $id;
    public $nombreApellidos;
    public $fecha;
    public $sexo;
    public $domicilio;
    public $pais;
    public $notificaciones;
    public $revista;
    public $tarjeta;
    
    public function __construct($id, $nombreApellidos, $fecha, $sexo, $domicilio, $pais, $notificaciones, $revista, $tarjeta) {
        $this->id = $id;
        $this->nombreApellidos = $nombreApellidos;
        $this->fecha = $fecha;
        $this->sexo = $sexo;
        $this->domicilio = $domicilio;
        $this->pais = $pais;
        $this->notificaciones = $notificaciones;
        $this->revista = $revista;
        $this->tarjeta = $tarjeta;
    }


    
    
}
