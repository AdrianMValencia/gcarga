<?php

class ControllerBulkingAgent
{
    public static function ctrShowBulkingAgent($item, $value)
    {
        $table = "agente_carga";
        $response = ModelBulkingAgent::mdlShowBulkingAgent($table, $item, $value);
        return $response;
    }

    public static function ctrCreateBulkingAgent()
    {
        if (isset($_POST["addCode"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["addCode"]) &&
                preg_match('/^[#\.\/\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addBusinessName"]) &&
                preg_match('/^[0-9]+$/', $_POST["addNroDoc"]) &&
                preg_match('/^[#\.\/\-a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addAddress"]) &&
                preg_match('/^[#\.\/\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addContact"])
            ) {
                $table = "agente_carga";
                $data = array(
                    "codigo" => $_POST["addCode"],
                    "razonSocial" => $_POST["addBusinessName"],
                    "codJurisdic" => $_POST["addJurisdiction"],
                    "estado" => "DESHABILITADO",
                    "Ruc" => $_POST["addNroDoc"],
                    "Direccion" => $_POST["addAddress"],
                    "Contacto" => $_POST["addContact"],
                    "idTipoDoc" => $_POST["addDoc"]
                );
                $response = ModelBulkingAgent::mdlCreateBulkingAgent($table, $data);
                if ($response == "ok") {
                    echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Correcto!",
                    text: "¡Agente de carga registrado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "bulking-agent";
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
                        window.location = "bulking-agent";
                    }
                });
                </script>';
            }
        }
    }
}
