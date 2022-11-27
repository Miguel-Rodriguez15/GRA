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


     public function registrar()
     {
       $nom_ruta = $_POST['nom_ruta'];
       $origen = $_POST['origen'];
       $destino = $_POST['destino'];
       $Hor_entrada = $_POST['Hor_entrada'];
       $Hor_salida = $_POST['Hor_salida'];


       
       if(empty($nom_ruta) || empty($origen) ||empty($destino) ||empty($Hor_entrada) ||empty($Hor_salida)){

        $msg = "Todos los campos son obligatorios";

       }else {
            if ($_POST['id'] == "") {
                # code...

                         $data = $this->model->registrarRutas( $nom_ruta,  $origen,  $destino,  $Hor_entrada,  $Hor_salida);
                         if ($data == "ok") {
                          $msg = "si";
                          }else if($data == "existe"){                          
                              $msg = "la ruta ya existe";
                          }else{
                            $msg ="Error al registrar la ruta";
                           }
                     
            }else{
                $data = $this->model->modificarRutas( $nom_ruta,  $origen,  $destino,  $Hor_entrada,  $Hor_salida,  $id);
                if ($data == "modificado") {
                 $msg = "modificado";
                 }else{
                   $msg ="Error al modificar el ";
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
