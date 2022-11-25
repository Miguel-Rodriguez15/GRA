<?php
class Usuarios extends Controller{
    public function __construct(){
    session_start();
    parent::__construct();
    }
    public function index(){
      
        $this->views->getView($this, "index" );


    }
     public function listar(){
       $data = $this->model->getUsuarios();
       for ($i=0; $i < count($data); $i++) { 
          $data[$i]['acciones'] = '<div> 
          <div> 
          <button class="btn btn-primary" type="button">Editar</button>
          <button class="btn btn-danger" type="button">Eliminar</button>
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
       if(empty($cedula) || empty($nombre) ||empty($apellido) ||empty($rol) ||empty($telefono) ||empty($usuario) || empty($clave) ||empty($confirmar)){

        $msg = "Todos los campos son obligatorios";

       }else if($clave != $confirmar) {
        $msg = "las contraseña no coincide";
       }else {
          $data = $this->model->registrarUsuario( $cedula,  $nombre,  $apellido,  $rol,  $telefono,  $usuario,  $clave);
           if ($data == "ok") {
               $msg = "si";
            }else {
             $msg = "Error al registrar el usuario";
            }
       
      }
      echo json_encode($msg, JSON_UNESCAPED_UNICODE);
       die();
     }

    

      
    }
   

?>