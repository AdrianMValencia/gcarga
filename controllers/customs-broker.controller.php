<?php

class ControllerCustomsBroker
{
    public static function ctrShowCustomsBroker($item, $value)
    {
        $table = "agente_aduana";
        $response = ModelCustomsBroker::mdlShowCustomsBroker($table, $item, $value);
        return $response;
    }

    public static function ctrCreateCustomsBroker()
    {
        if (isset($_POST["addCode"])) {
            if (
                preg_match('/^[0-9]+$/', $_POST["addCode"]) &&
                preg_match('/^[#\.\/\a-zA-Z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["addBusinessName"]) &&
                preg_match('/^[0-9]+$/', $_POST["addNroDoc"])
            ) {
                $codeJuris = explode("|", $_POST["addJurisdiction"]);
                $table = "agente_aduana";
                $data = array(
                    "codigo" => $_POST["addCode"],
                    "razonSocial" => $_POST["addBusinessName"],
                    "codJurisdic" => $codeJuris[0],
                    "jurisdiccion" => $codeJuris[1],
                    "estado" => "DESHABILITADO",
                    "NroDoc" => $_POST["addNroDoc"],
                    "idTipoDoc" => $_POST["addDoc"]
                );
                $response = ModelCustomsBroker::mdlCreateCustomsBroker($table, $data);
                if ($response == "ok") {
                    echo '<script>
                Swal.fire({
                    icon: "success",
                    title: "¡Correcto!",
                    text: "¡Agente de aduana registrado correctamente!",
                    showConfirmButton: true,
                    confirmButtonText: "Aceptar",
                    closeOnConfirm: false
                }).then((result)=>{
                    if(result.value){
                        window.location = "customs-broker";
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
                        window.location = "customs-broker";
                    }
                });
                </script>';
            }
        }
    }
}
