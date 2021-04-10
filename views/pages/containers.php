<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1>Administrar Contenedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="start">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Contenedores</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalAddContainers">
                    <i class="fas fa-plus-square"></i>
                    Agregar contenedores
                </button>
            </div>
            <div class="card-body">
                <table class="table dt-responsive table-bordered table-striped tableContainers" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Nombre</th>
                            <th>Largo Ext</th>
                            <th>Ancho Ext</th>
                            <th>Alto Ext</th>
                            <th>Largo Int</th>
                            <th>Ancho Int</th>
                            <th>Alto Int</th>
                            <th>Cubicaje</th>
                            <th>Capac. Desde</th>
                            <th>Capac. Hasta</th>
                            <th>Tipo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $value = null;
                        $containers = ControllerContainers::ctrShowContainers($item, $value);
                        ?>
                        <?php foreach ($containers as $key => $value) : ?>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-sm btnEditContainer" idContainer="<?php echo $value["idConte"]; ?>" data-toggle="modal" data-target="#modalEditContainer"><i class="fas fa-pencil-alt text-white"></i></button>
                                        <button class="btn btn-danger btn-sm btnDeleteContainer" idContainerDelete="<?php echo $value["idConte"]; ?>"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                                <td><?php echo $value["nombre"]; ?></td>
                                <td><?php echo $value["largoExt"]; ?></td>
                                <td><?php echo $value["anchoExt"]; ?></td>
                                <td><?php echo $value["altoExt"]; ?></td>
                                <td><?php echo $value["largoInt"]; ?></td>
                                <td><?php echo $value["anchoInt"]; ?></td>
                                <td><?php echo $value["altoInt"]; ?></td>
                                <td><?php echo $value["cubicaje"]; ?></td>
                                <td><?php echo number_format($value["capacidKgDesde"], 1); ?></td>
                                <td><?php echo number_format($value["capacidKgHasta"], 1); ?></td>
                                <td><?php echo $value["idTipoConte"]; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>