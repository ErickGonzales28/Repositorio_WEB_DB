<?php
    class Libro{
        private $codigoLib, $titulo, $autor, $estado, $edicion, $anio, $disponibilidad;

        public function setCodigoLib($codigoLib) {
            $this->codigoLib = $codigoLib;
        }
        public function setTitulo($titulo) {
            $this->titulo = $titulo;
        }
        public function setAutor($autor) {
            $this->autor= $autor;
        }
        public function setEstado($estado) {
            $this->estado = $estado;
        }
        public function setEdicion($edicion) {
            $this->edicion = $edicion;
        }
        public function setAnio($anio) {
            $this->anio = $anio;
        }
        public function setDisponibilidad($disponibilidad) {
            $this->disponibilidad = $disponibilidad;
        }
            
        public function getCodigoLib() {
            return ($this->codigoLib);
        }
        public function getTitulo() {
            return ($this->titulo);
        }
        public function getAutor() {
            return ($this->autor);
        }
        public function getEstado() {
            return ($this->estado);
        }
        public function getEdicion() {
            return ($this->edicion);
        }
        public function getAnio() {
            return ($this->anio);
        }
        public function getDisponibilidad() {
            return ($this->disponibilidad);
        }
    }
?>