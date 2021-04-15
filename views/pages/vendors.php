<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-0">
                <div class="col-sm-6">
                    <h1>Administrar Proveedores</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="start">Inicio</a></li>
                        <li class="breadcrumb-item active">Administrar Proveedores</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <button class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#modalAddVendors">
                    <i class="fas fa-plus-square"></i>
                    Agregar proveedor
                </button>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped tables dt-responsive" width="100%">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Dirección</th>
                            <th>Nro. Doc</th>
                            <th>Ciudad</th>
                            <th>País</th>
                            <th>Dirección 2</th>
                            <th>Dirección 3</th>
                            <th>Fono 1</th>
                            <th>Fono 2</th>
                            <th>Email</th>
                            <th>PagWeb</th>
                            <th>Representante Legal</th>
                            <th>Tipo Doc.</th>
                            <th>Cod. País</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $item = null;
                        $value = null;
                        $vendors = ControllerVendors::ctrShowVendors($item, $value);
                        ?>
                        <?php foreach ($vendors as $key => $value) : ?>
                            <tr>
                                <td>
                                    <div class="btn-group">
                                        <button class="btn btn-warning btn-sm btnEditVendors" idVendors="<?php echo $value["idProv"]; ?>" data-toggle="modal" data-target="#modalEditVendors"><i class="fas fa-pencil-alt text-white"></i></button>
                                        <button class="btn btn-danger btn-sm btnDeleteVendors" idContainerDelete="<?php echo $value["idProv"]; ?>"><i class="fas fa-trash-alt"></i></button>
                                    </div>
                                </td>
                                <td><?php echo $value["codigo"]; ?></td>
                                <td><?php echo $value["nombre"]; ?></td>
                                <td><?php echo $value["direc1"]; ?></td>
                                <td><?php echo $value["nroDoc"]; ?></td>
                                <td><?php echo $value["ciudad"]; ?></td>
                                <td><?php echo $value["nombrePais"]; ?></td>
                                <td><?php echo $value["direc2"]; ?></td>
                                <td><?php echo $value["direc3"]; ?></td>
                                <td><?php echo $value["fono1"]; ?></td>
                                <td><?php echo $value["fono2"]; ?></td>
                                <td><?php echo $value["email"]; ?></td>
                                <td><?php echo $value["pagWeb"]; ?></td>
                                <td><?php echo $value["repreLegal"]; ?></td>
                                <td><?php echo $value["tipoDoc"]; ?></td>
                                <td><?php echo $value["codigoPais"]; ?></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>