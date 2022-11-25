<?php 
include "Views/Templates/header.php";?>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Rutas</li>
</ol>
<button class="btn btn-primary mb-2" type="button" onclick="frmRuta()" ;> <i class="fas fa-plus"></i> </button>

<table class="table table-light-mb-2" id="tblRutas">
    <thead class="thead-dark">
        <tr>
            <th>id</th>
            <th>Nombre ruta</th>
            <th>origen</th>
            <th>Destino</th>
            <th>Hora de entrada</th>
            <th>Hora de salida</th>
            <th></th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>
<div id="nuevo_rutas" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title"
    aria-hidden="true">
    <div class="modal-dialog " role="document ">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title text-white" id="title">Nueva ruta</h5>

            </div>
            <div class="modal-body">
                <form method="POST" id="frmRuta">

                    <div class="form-group">
                        <label for="cedula">Cedula</label>
                        <input type="hidden" id="id" name="id">
                        <input id="cedula" class="form-control" type="text" name="cedula" placeholder="cedula">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="nombre">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="apellido">Apellido</label>
                                <input id="apellido" class="form-control" type="text" name="apellido"
                                    placeholder="apellido">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="rol">Rol</label>
                        <select id="rol" class="form-control" name="rol">
                            <option value="1">administrador</option>
                            <option value="2">programador de rutas</option>
                            <option value="3">ciudadano</option>
                            <option value="4">coordinador de operaciones</option>
                            <option value="5">coordinador </option>
                            <option value="6">conductor</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="telefono">Telefono</label>
                        <input id="telefono" class="form-control" type="text" name="telefono" placeholder="telefono">
                    </div>
                    <div class="form-group">
                        <label for="usuario">Usuario</label>
                        <input id="usuario" class="form-control" type="email" name="usuario" placeholder="usuario">
                    </div>
                    <div class="row " id="claves">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="clave">clave</label>
                                <input id="clave" class="form-control" type="password" name="clave" placeholder="clave">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="confirmar">Confirme su clave</label>
                                <input id="confirmar" class="form-control" type="password" name="confirmar"
                                    placeholder="confirmar clave">

                            </div>
                        </div>

                    </div>

            </div>
            <button class="btn btn-primary " type="button" onclick="registrarUser(event);"
                id="btnAccion">Registrar</button>
                
            </form>
        </div>
    </div>
</div>
</div>
<?php include "Views/Templates/footer.php";?>