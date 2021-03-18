<?php

class ControllerWarehouse
{
    public static function ctrShowWarehouse($item, $value)
    {
        $table = "almacen";
        $response = ModelWarehouse::mdlShowWarehouse($table, $item, $value);
        return $response;
    }

    public static function ctrCreateWarehouse()
    {
        if (isset($_POST["addCode"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["addCode"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addName"]) &&
                preg_match('/^[0-9]+$/', $_POST["addNroDoc"]) &&
                preg_match('/^[#\.\/\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addBusinessName"]) &&
                preg_match('/^[#\.\/\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addAddress"]) &&
                preg_match('/^[*\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addRepreLegal"]) &&
                preg_match('/^[#\.\/\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addOffice"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["addPhone"])
            ) {
                $table = "almacen";
                $data = array(
                    "codigo" => $_POST["addCode"],
                    "nombre" => $_POST["addName"],
                    "razonSocial" => $_POST["addBusinessName"],
                    "jurisdiccion" => $_POST["addJurisdiction"],
                    "direccion" => $_POST["addAddress"],
                    "repreLegal" => $_POST["addRepreLegal"],
                    "oficina" => $_POST["addOffice"],
                    "telefono" => $_POST["addPhone"],
                    "estado" => "DESHABILITADO",
                    "NroDoc" => $_POST["addNroDoc"],
                    "idTipoDoc" => $_POST["addDoc"]
                );
                $response = ModelWarehouse::mdlCreateWarehouse($table, $data);
                if ($response == "ok") {
                    echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Correcto!",
                    text: "¡El almacén ha sido registrado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "warehouse";
                    }
                });
                </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "¡Ocurrió un error!",
                    text: "¡Por favor verifique todos los campos, no pueden ir vacíos o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "warehouse";
                    }
                });
                </script>';
            }
        }
    }

    public static function ctrEditWarehouse()
    {
        if (isset($_POST["editCode"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["editCode"]) &&
                preg_match('/^[a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editName"]) &&
                preg_match('/^[0-9]+$/', $_POST["editNroDoc"]) &&
                preg_match('/^[#\.\/\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editBusinessName"]) &&
                preg_match('/^[#\.\/\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editAddress"]) &&
                preg_match('/^[*\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editRepreLegal"]) &&
                preg_match('/^[#\.\/\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["editOffice"]) &&
                preg_match('/^[()\-0-9 ]+$/', $_POST["editPhone"])
            ) {
                $table = "almacen";
                $data = array(
                    "codigo" => $_POST["editCode"],
                    "nombre" => $_POST["editName"],
                    "razonSocial" => $_POST["editBusinessName"],
                    "jurisdiccion" => $_POST["editJurisdiction"],
                    "direccion" => $_POST["editAddress"],
                    "repreLegal" => $_POST["editRepreLegal"],
                    "oficina" => $_POST["editOffice"],
                    "telefono" => $_POST["editPhone"],
                    "NroDoc" => $_POST["editNroDoc"],
                    "idTipoDoc" => $_POST["editDoc"]
                );
                $response = ModelWarehouse::mdlEditWarehouse($table, $data);
                if ($response == "ok") {
                    echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Correcto!",
                    text: "¡El almacén ha sido actualizado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "warehouse";
                    }
                });
                </script>';
                }
            } else {
                echo '<script>
                Swal.fire({
                    icon: "error",
                    title: "¡Ocurrió un error!",
                    text: "¡Por favor verifique todos los campos, no pueden ir vacíos o llevar caracteres especiales!",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "warehouse";
                    }
                });
                </script>';
            }
        }
    }

    public static function ctrDeleteWarehouse($code)
    {
        $table = "almacen";
        $response = ModelWarehouse::mdlDeleteWarehouse($table, $code);
        return $response;
    }
}
