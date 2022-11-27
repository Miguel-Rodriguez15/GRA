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
                        <label for="nom_ruta">Nombre de la ruta</label>
                        <select id="nom_ruta" class="form-control" name="nom_ruta">
                            <option value="1">A111</option>
                            <option value="2">A101</option>
                            <option value="3">A102</option>
                            <option value="4">A107</option>

                        </select>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="origen">Origen</label>
                                <input id="origen" class="form-control" type="text" name="origen" placeholder="origen">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="destino">Destino</label>
                                <input id="destino" class="form-control" type="text" name="destino"
                                    placeholder="destino">
                            </div>
                        </div>
                    </div>


                    <div class="row " id="Horas">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Hor_entrada">Hora de entrada</label>
                                <input id="Hor_entrada" class="form-control" type="text" name="Hor_entrada" placeholder="Hora de entrada">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="Hor_salida">Hora de salida</label>
                                <input id="Hor_salida" class="form-control" type="text" name="Hor_salida"
                                    placeholder="Hora de salida">

                            </div>
                        </div>

                    </div>

            </div>
            <button class="btn btn-primary " type="button" onclick="registrarRutas(event);"
                id="btnAccion">Registrar</button>
                
            </form>
        </div>
    </div>
</div>
</div>
<?php include "Views/Templates/footer.php";?>