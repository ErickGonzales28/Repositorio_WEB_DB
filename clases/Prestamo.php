<?php
    class Prestamo{
        private $id, $codLibro, $codUsuario, $fechaRes, $fechaIni, $fechaFin, $fechaFinReal, $estado;

        public function setId($id){
            $this->id = $id;
        }
        public function setCodLibro($codLibro){
            $this->codLibro = $codLibro;
        }
        public function setCodUsuario($codUsuario){
            $this->codUsuario = $codUsuario;
        }
        public function setFechaRes($fechaRes){
            $this->fechaRes = $fechaRes;
        }
        public function setFechaIni($fechaIni){
            $this->fechaIni = $fechaIni;
        }
        public function setFechaFin($fechaFin){
            $this->fechaFin = $fechaFin;
        }
        public function setFechaFinReal($fechaFinReal){
            $this->fechaFinReal = $fechaFinReal;
        }
        public function setEstado($estado){
            $this->estado = $estado;
        }

        public function getId(){
            return ($this->id);
        }
        public function getCodLibro(){
            return ($this->codLibro);
        }
        public function getCodUsuario(){
            return ($this->codUsuario);
        }
        public function getFechaRes(){
            return ($this->fechaRes);
        }
        public function getFechaIni(){
            return ($this->fechaIni);
        }
        public function getFechaFin(){
            return ($this->fechaFin);
        }
        public function getFechaFinReal(){
            return ($this->fechaFinReal);
        }
        public function getEstado(){
            return ($this->estado);
        }
    }
?>