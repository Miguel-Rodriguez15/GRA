<?php
class Rutas extends Controller{
    public function __construct(){
    session_start();
    if (empty($_SESSION['activo'])) {
       header("location: " .base_url);
    }
    parent::__construct();
    }
    public function index(){
      
        $this->views->getView($this, "index" );


    }
     public function listar(){
       $data = $this->model->getUsuarios();
       for ($i=0; $i < count($data); $i++) { 
        if ($data[$i]['estado'] == 1) {
            $data[$i]['estado'] = '<span">Activo</span>';

        }else{
            $data[$i]['estado'] ='<span class="" >Inactivo</span>';
        }

          $data[$i]['acciones'] = 
          
          '<div row> 
             <button class="btn btn-primary" type="button" onclick="btnEditarUser('.$data[$i]['id'].');"><i class="fas fa-edit"></i></button> 
               <button class="btn btn-danger" type="button"  onclick="btnEliminarUser('.$data[$i]['id'].');"><i class="fas fa-trash-alt"></i></button>
               <button class="btn btn-success" type="button"  onclick="btnReingresarUser('.$data[$i]['id'].');"><i">Reintegrar</i></button>
          </div>';
       }
       echo json_encode($data, JSON_UNESCAPED_UNICODE);
       die();
    }
    public function validar(){

        if (empty($_POST['usuario']) || empty($_POST['clave']) ) {
           $msg = "los campos estan vacios";
        }else{
            $usuario = $_POST['usuario'];
            $clave = $_POST['clave'];
           
            $data = $this->model->getUsuario($usuario, $clave);
            if($data){
                $_SESSION['id_usuario'] = $data['id'];
                $_SESSION['usuario'] = $data['usuario'];
                $_SESSION['nombre'] = $data['nombre'];
                $_SESSION['activo'] = true;
                $msg = "ok";
            }else{
                $msg = "usuario o contraseña incorrecta";
            }
        }
        echo json_encode($msg, JSON_UNESCAPED_UNICODE);
        die();
     }

     public function registrar()
     {
       $cedula = $_POST['cedula'];
       $nombre = $_POST['nombre'];
       $apellido = $_POST['apellido'];
       $rol = $_POST['rol'];
       $telefono = $_POST['telefono'];
       $usuario = $_POST['usuario'];
       $clave = $_POST['clave'];
       $confirmar = $_POST['confirmar'];
       $id = $_POST['id'];

       
       if(empty($cedula) || empty($nombre) ||empty($apellido) ||empty($rol) ||empty($telefono) ||empty($usuario)){

        $msg = "Todos los campos son obligatorios";

       }else {
            if ($_POST['id'] == "") {
                # code...
                 if($clave != $confirmar) {
                     $msg = "las contraseña no coincide";
                 }else {
                         $data = $this->model->registrarUsuario( $cedula,  $nombre,  $apellido,  $rol,  $telefono,  $usuario,  $clave);
                         if ($data == "ok") {
                          $msg = "si";
                          }else if($data == "existe"){                          
                              $msg = "El usuario ya existe";
                          }else{
                            $msg ="Error al registrar el usuario";
                           }
                     }
            }else{
                $data = $this->model->modificarUsuario( $cedula,  $nombre,  $apellido,  $rol,  $telefono,  $usuario,  $id);
                if ($data == "modificado") {
                 $msg = "modificado";
                 }else{
                   $msg ="Error al mopdificar el usuario";
                  }
            }
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
       die();
     }
     public function editar(int $id)
     {
        $data =$this->model->editarUser($id);
        echo json_encode($data, JSON_UNESCAPED_UNICODE);
        die();
     }
     public function eliminar(int $id)
     {
      $data = $this->model->accionUser(0, $id);
      if ($data == 1) {
        $msg = "ok";
      }else {
        $msg ="error al eliminar el usuario";
      }
      echo  json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
     }
     public function reingresar(int $id)
     {
      $data = $this->model->accionUser(1, $id);
      if ($data == 1) {
        $msg = "ok";
      }else {
        $msg ="error al reingresar el usuario";
      }
      echo  json_encode($msg, JSON_UNESCAPED_UNICODE);
      die();
     }
    
     public  function salir()
     {
        session_destroy();
        header("location: ".base_url);
     }

    }
    



?>
