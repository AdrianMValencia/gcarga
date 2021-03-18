<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1>Administrar Agente de Aduana</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="start">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Agente de Aduana</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddCustomsBroker">
                    <i class="fas fa-plus"></i>
                    Agregar agente de aduana
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped dt-responsive tableCustomsBroker" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Código</th>
                            <th>Razón Social</th>
                            <th>Jurisdicción</th>
                            <th>Estado</th>
                            <th>Nro Doc.</th>
                            <th>Tipo Doc.</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalAddCustomsBroker">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Registro de Agente de Aduana</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fas fa-code"></i>
                            </span>
                        </div>
                        <input type="number" class="form-control" name="addCode" id="addCode" min="1" placeholder="código" style="text-transform:uppercase;" required>
                    </div>
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
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-address-card"></i>
                                        </span>
                                        <select class="form-control" name="addDoc" required>
                                            <option selected="">Seleccionar Doc ...</option>
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
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
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
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                    <select class="form-control select2" name="addJurisdiction" style="width: 100%;" required>
                                        <option value="">Seleccionar Jurisdicción ...</option>
                                        <?php
                                        $codeJurisdiction = ControllerJurisdiction::ctrShowCodeJurisdiction();
                                        ?>
                                        <?php foreach ($codeJurisdiction as $key => $value) : ?>
                                            <option value="<?php echo $value["jurisdic"]; ?>"><?php echo $value["jurisdic"]; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-success">Guardar</button>
                </div>
                <?php
                $registerCustomsBroker = new ControllerCustomsBroker();
                $registerCustomsBroker->ctrCreateCustomsBroker();
                ?>
            </form>
        </div>
    </div>
</div>