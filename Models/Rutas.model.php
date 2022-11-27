<?php
class RutasModel extends Query{
   private  $nom_ruta,  $origen,  $destino,  $Hor_entrada,  $Hor_salida, $id;
     public function __construct(){
       parent::__construct();
     }

     public function getRutas(){

      $sql = "SELECT s.*, r.id_rutas, r.nombre_ruta FROM seguimiento s INNER JOIN rutas r where s.id_ruta = r.id_rutas";
      $data = $this->selectAll($sql);
      return $data;
   }
   public function registrarRutas(int $nom_ruta, String $origen, String $destino, string $Hor_entrada, String $Hor_salida){
     $this->nom_ruta = $nom_ruta;
     $this->origen = $origen;
     $this->destino = $destino;
     $this->Hor_entrada = $Hor_entrada;
     $this->Hor_salida = $Hor_salida;
     $verificar = "SELECT * FROM seguimiento";
     $existe = $this->select($verificar);
     if(empty($existe)){
           $sql = "INSERT INTO seguimiento(id_ruta, origen, destino, hora_entrada, hora_salida) VALUES (?,?,?,?,?)";
     $datos = array($this->nom_ruta, $this->origen, $this->destino, $this->Hor_entrada, $this->Hor_salida);
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
  public function modificarRutas(int $nom_ruta, String $origen, String $destino, string $Hor_entrada, String $Hor_salida, int $id){
    $this->nom_ruta = $nom_ruta;
    $this->origen = $origen;
    $this->destino = $destino;
    $this->Hor_entrada = $Hor_entrada;
    $this->Hor_salida = $Hor_salida;
   $this->id = $id;

   $sql = "UPDATE usuarios SET id_ruta = ?, origen = ?, destino = ?, hora_entrada = ?, hora_salida = ? WHERE id = ?";
   $datos = array($this->nom_ruta, $this->origen, $this->destino, $this->Hor_entrada, $this->Hor_salida, $this->id);
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