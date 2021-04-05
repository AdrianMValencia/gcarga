<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1>Administrar Agente de Carga</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="start">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Agente de Carga</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalAddBulkingAgent">
                    <i class="fas fa-plus"></i>
                    Agregar agente de carga
                </button>
            </div>
            <div class="card-body">
                <table class="table dt-responsive table-bordered table-striped tableBulkingAgent" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Código</th>
                            <th>Razón Social</th>
                            <th>Cod. Jurisdicción</th>
                            <th>Estado</th>
                            <th>Ruc</th>
                            <th>Dirección</th>
                            <th>Contacto</th>
                            <th>Tipo Doc.</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalAddBulkingAgent">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Registro de Agente de Carga</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <label>Código</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-code"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control" name="addCode" id="addCode" min="1" placeholder="código" style="text-transform:uppercase;" required>
                    </div>
                    <label>Razón Social</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-pencil-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="addBusinessName" placeholder="Razón Social" style="text-transform:uppercase;" required>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Tipo de Doc.</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-address-card"></i>
                                        </span>
                                    </div>
                                    <select class="form-control select2" name="addDoc" required>
                                        <option selected="">SELECCIONAR DOC ...</option>
                                        <?php
                                        $documentType = ControllerDocumentType::ctrShowDocumentType();
                                        ?>
                                        <?php foreach ($documentType as $key => $value) : ?>
                                            <option value="<?php echo $value["idTipoDoc"]; ?>"><?php echo $value["abrev"]; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Número de Doc.</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-hashtag"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="addNroDoc" placeholder="Nro de Doc." style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Dirección</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="addAddress" placeholder="Dirección" style="text-transform:uppercase;" required>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Jurisdicción</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-file-alt"></i>
                                        </span>
                                    </div>
                                    <select class="form-control select2" name="addJurisdiction" required>
                                        <option value="">SELECCIONAR JURISDICCIÓN ...</option>
                                        <option value="154">154 - MOLLENDO - AGENCIA ADUANERA DE AREQUIPA</option>
                                        <option value="118">118 - MARITIMA DEL CALLAO</option>
                                        <option value="127">127 - PISCO</option>
                                        <option value="046">046 - PAITA</option>
                                        <option value="190">190 - CUSCO</option>
                                        <option value="145">145 - MOLLENDO - MATARANI</option>
                                        <option value="992">992 - LIMA METROPOLITANA</option>
                                        <option value="235">235 - AEREA Y POSTAL EX-IAAC</option>
                                        <option value="244">244 - AEREA Y POSTAL EX-IAPC</option>
                                        <option value="172">172 - TACNA</option>
                                        <option value="082">082 - SALAVERRY</option>
                                        <option value="091">091 - CHIMBOTE</option>
                                        <option value="226">226 - IQUITOS</option>
                                        <option value="163">163 - ILO</option>
                                        <option value="028">028 - TALARA</option>
                                        <option value="262">262 - DESAGUADERO</option>
                                        <option value="181">181 - PUNO</option>
                                        <option value="280">280 - PUERTO MALDONADO</option>
                                        <option value="055">055 - IAT-LAMBAYEQUE</option>
                                        <option value="019">019 - TUMBES</option>
                                        <option value="983">983 - A NIVEL NACIONAL</option>
                                        <option value="000">000 - SEDE CENTRAL - CHUCUITO</option>
                                        <option value="217">217 - PUCALLPA</option>
                                        <option value="271">271 - TARAPOTO</option>
                                        <option value="299">299 - LA TINA</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <label>Contacto</label>
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-user"></i>
                            </span>
                        </div>
                        <input type="text" class="form-control" name="addContact" placeholder="Contacto" style="text-transform:uppercase;" required>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                <?php
                $createBulkingAgent = new ControllerBulkingAgent();
                $createBulkingAgent->ctrCreateBulkingAgent();
                ?>
            </form>
        </div>
    </div>
</div>