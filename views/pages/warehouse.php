<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1>Administrar Almacén</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="start">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Almacén</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalAddWarehouse">
                    <i class="fas fa-plus"></i>
                    Agregar almacén
                </button>
            </div>
            <div class="card-body">
                <table class="table dt-responsive table-responsive tableWarehouse" width="100%">
                    <thead class="table-dark">
                        <tr>
                            <th>Acciones</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Razón Social</th>
                            <th>Jurisdicción</th>
                            <th>Dirección</th>
                            <th>Repre. Legal</th>
                            <th>Oficina</th>
                            <th>Teléfono</th>
                            <th>Estado</th>
                            <th>IdAlmacén</th>
                            <th>RUC</th>
                            <th>Tipo Doc.</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalAddWarehouse">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Registro de Almacén</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-code"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="addCode" id="addCode" min="1" placeholder="código" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="addName" placeholder="nombre" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de Doc.</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                    <select class="form-control" name="addDoc" style="width: 100%;" required>
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
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Número de Doc.</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-hashtag"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="addNroDoc" placeholder="Nro de Doc." style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Razón Social</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="addBusinessName" placeholder="Razón Social" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>Jurisdicción</label>
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-file-alt"></i>
                                        </span>
                                        <select class="form-control select2" name="addJurisdiction" style="width: 100%;" required>
                                            <option value="">Seleccionar Jurisdicción ...</option>
                                            <?php
                                            $jurisdiction = ControllerJurisdiction::ctrShowJurisdiction();
                                            ?>
                                            <?php foreach ($jurisdiction as $key => $value) : ?>
                                                <option value="<?php echo $value["jurisdiccion"]; ?>"><?php echo $value["jurisdiccion"]; ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="addAddress" placeholder="Dirección" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Repre. Legal</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-file-contract"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="addRepreLegal" placeholder="Repre. Legal" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Oficina</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-laptop"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="addOffice" placeholder="Oficina" style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="addPhone" placeholder="teléfono" style="text-transform:uppercase;" required>
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
                $registerWarehouse = new ControllerWarehouse();
                $registerWarehouse->ctrCreateWarehouse();
                ?>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="modalEditWarehouse">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form method="POST">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">Actualizar Almacén</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Código</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-code"></i>
                                        </span>
                                    </div>
                                    <input type="number" class="form-control" name="editCode" placeholder="código" value readonly style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nombre</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="editName" placeholder="nombre" value style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tipo de Doc.</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-address-card"></i>
                                    </span>
                                    <select class="form-control" name="editDoc" style="width: 100%;" required>
                                        <option id="editDocOption"></option>
                                        <option hidden>Seleccionar Doc ...</option>
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
                                    <input type="number" class="form-control" name="editNroDoc" placeholder="Nro de Doc." value style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Razón Social</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-pencil-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="editBusinessName" placeholder="Razón Social" value style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Jurisdicción</label>
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="fas fa-file-alt"></i>
                                    </span>
                                    <select class="form-control select2" name="editJurisdiction" id="editJurisdictionOption" style="width: 100%;" required>
                                        <?php
                                        $jurisdiction = ControllerJurisdiction::ctrShowJurisdiction();
                                        ?>
                                        <?php foreach ($jurisdiction as $key => $value) : ?>
                                            <option value="<?php echo $value["jurisdiccion"]; ?>"><?php echo $value["jurisdiccion"]; ?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Dirección</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-map-marker-alt"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="editAddress" placeholder="Dirección" value style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Repre. Legal</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-file-contract"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="editRepreLegal" placeholder="Repre. Legal" value style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Oficina</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-laptop"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="editOffice" placeholder="Oficina" value style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Teléfono</label>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fas fa-phone"></i>
                                        </span>
                                    </div>
                                    <input type="text" class="form-control" name="editPhone" placeholder="teléfono" value style="text-transform:uppercase;" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-between">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Salir</button>
                    <button type="submit" class="btn btn-success">Guardar cambios</button>
                </div>
                <?php
                $editWarehouse = new ControllerWarehouse();
                $editWarehouse->ctrEditWarehouse();
                ?>
            </form>
        </div>
    </div>
</div>