<?php
    class Usuario{
        private $codigo, $password, $nombres, $apellidos, $telefono, $tipo, $estado;
    
        public function setCodigo($codigo) {
            $this->codigo = $codigo;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function setNombres($nombres) {
            $this->nombres = $nombres;
        }
        public function setApellidos($apellidos) {
            $this->apellidos = $apellidos;
        }
        public function setTelefono($telefono) {
            $this->telefono = $telefono;
        }
        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }
        public function setEstado($estado) {
            $this->estado = $estado;
        }
            
        public function getCodigo() {
            return ($this->codigo);
        }
        public function getPassword() {
            return ($this->password);
        }
        public function getNombres() {
            return ($this->nombres);
        }
        public function getApellidos() {
            return ($this->apellidos);
        }
        public function getTelefono() {
            return ($this->telefono);
        }
        public function getTipo() {
            return ($this->tipo);
        }
        public function getEstado() {
            return ($this->estado);
        }
    }
?>