<?php
class UsuariosModel extends Query{
     public function __construct(){
       parent::__construct();
     }
     public function getUsuario(string $usuario, string $clave){

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
        $data = $this->select($sql);
        return $data;
     }
     public function getUsuarios(){

      $sql = "SELECT u.*, r.id_roles, r.nombre_rol FROM usuarios u INNER JOIN roles r where u.rol = r.id_roles";
      $data = $this->selectAll($sql);
      return $data;
   }

}



?>