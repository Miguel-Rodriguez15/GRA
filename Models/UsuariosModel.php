<?php
class UsuariosModel extends Query{
   private  $cedula,  $nombre,  $apellido,  $rol,  $telefono,  $usuario,  $clave, $id, $estado;
     public function __construct(){
       parent::__construct();
     }
     public function getUsuario(string $usuario, string $clave){

        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
        $data = $this->select($sql);
        return $data;
     }
     public function getRoles(){

      $sql = "SELECT * FROM roles WHERE estado = 1";
      $data = $this->selectAll($sql);
      return $data;
   }
     public function getUsuarios(){

      $sql = "SELECT u.*, r.id_roles, r.nombre_rol FROM usuarios u INNER JOIN roles r where u.rol = r.id_roles";
      $data = $this->selectAll($sql);
      return $data;
   }
   public function registrarUsuario(String $cedula, String $nombre, String $apellido, int $rol, String $telefono, String $usuario, String $clave){
     $this->cedula = $cedula;
     $this->nombre = $nombre;
     $this->apellido = $apellido;
     $this->rol = $rol;
     $this->telefono = $telefono;
     $this->usuario = $usuario;
     $this->clave = $clave;
     $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
     $existe = $this->select($verificar);
     if(empty($existe)){
           $sql = "INSERT INTO usuarios(cedula, nombre, apellido, rol, telefono, usuario, clave) VALUES (?,?,?,?,?,?,?)";
     $datos = array($this->cedula, $this->nombre, $this->apellido, $this->rol, $this->telefono, $this->usuario, $this->clave);
     $data = $this->save($sql, $datos);
     if ($data == 1) {
        $res = "ok";
     }else {
      $res = "error";
     }
   }else {
      $res = "existe";
   }
 
     return $res;
  }
  public function modificarUsuario(String $cedula, String $nombre, String $apellido, int $rol, String $telefono, String $usuario, int $id){
   $this->cedula = $cedula;
   $this->nombre = $nombre;
   $this->apellido = $apellido;
   $this->rol = $rol;
   $this->telefono = $telefono;
   $this->usuario = $usuario;
   $this->id = $id;

   $sql = "UPDATE usuarios SET cedula = ?, nombre = ?, apellido = ?, rol = ?, telefono = ?, usuario = ? WHERE id = ?";
   $datos = array($this->cedula, $this->nombre, $this->apellido, $this->rol, $this->telefono, $this->usuario, $this->id);
   $data = $this->save($sql, $datos);
   if ($data == 1) {
      $res = "modificado";
   }else {
    $res = "error";
   }


   return $res;
}
  public function editarUser(int $id)
  {
   $sql ="SELECT * FROM usuarios WHERE id = $id";
   $data =$this->select($sql);
   return $data;
  }
  public function eliminarUser(int $id)
  {
   $this->id = $id;
   $sql = "UPDATE  usuarios SET  estado = 0 WHERE id=?";
   $datos = array($this->id);
   $data = $this->save($sql, $datos);
   return $data;
  }
  public function accionUser(int $estado, int $id){

   $this->id = $id;
   $this->estado = $estado;
   $sql = "UPDATE usuarios SET estado = ? WHERE id = ?";
   $datos = array($this->estado, $this->id);
   $data = $this->save($sql, $datos);
   return $data;
  }
     

}



?>