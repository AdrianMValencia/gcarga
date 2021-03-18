$(".tableWarehouse").DataTable({
  ajax: "ajax/datatable-warehouse.ajax.php",
  deferRender: true,
  retrieve: true,
  processing: true,
  language: {
    sProcessing: "Procesando...",
    sLengthMenu: "Mostrar _MENU_ registros",
    sZeroRecords: "No se encontraron resultados",
    sEmptyTable: "Ningún dato disponible en esta tabla",
    sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
    sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
    sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
    sInfoPostFix: "",
    sSearch: "Buscar:",
    sUrl: "",
    sInfoThousands: ",",
    sLoadingRecords: "Cargando...",
    oPaginate: {
      sFirst: "Primero",
      sLast: "Último",
      sNext: "Siguiente",
      sPrevious: "Anterior",
    },
    oAria: {
      sSortAscending: ": Activar para ordenar la columna de manera ascendente",
      sSortDescending:
        ": Activar para ordenar la columna de manera descendente",
    },
  },
});

$(document).on("click", ".editWarehouse", function () {
  var codeWarehouseEdit = $(this).attr("codeWarehouseEdit");
  var data = new FormData();
  data.append("codeWarehouseEdit", codeWarehouseEdit);
  $.ajax({
    url: "ajax/warehouse.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      $('input[name="editCode"]').val(response["codigo"]);
      $('input[name="editName"]').val(response["nombre"]);
      $("#editDocOption").val(response["idTipoDoc"]);
      $("#editDocOption").html(response["tipoDoc"]);
      $('input[name="editNroDoc"]').val(response["NroDoc"]);
      $('input[name="editBusinessName"]').val(response["razonSocial"]);
      $("#editJurisdictionOption")
        .val(response["jurisdiccion"])
        .trigger("change");
      $('input[name="editAddress"]').val(response["direccion"]);
      $('input[name="editRepreLegal"]').val(response["repreLegal"]);
      $('input[name="editOffice"]').val(response["oficina"]);
      $('input[name="editPhone"]').val(response["telefono"]);
    },
  });
});

$(document).on("click", ".btnChangeState", function () {
  var codeWarehouse = $(this).attr("codeWarehouse");
  var stateWarehouse = $(this).attr("stateWarehouse");
  var button = $(this);
  var data = new FormData();
  data.append("codeWarehouse", codeWarehouse);
  data.append("stateWarehouse", stateWarehouse);
  $.ajax({
    url: "ajax/warehouse.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response == "ok") {
        if (stateWarehouse == "DESHABILITADO") {
          $(button).removeClass("btn-info");
          $(button).addClass("btn-dark");
          $(button).html("DESHABILITADO");
          $(button).attr("stateWarehouse", "HABILITADO");
        } else {
          $(button).addClass("btn-info");
          $(button).removeClass("btn-dark");
          $(button).html("HABILITADO");
          $(button).attr("stateWarehouse", "DESHABILITADO");
        }
      }
    },
  });
});

$(document).on("click", ".deleteWarehouse", function () {
  var codeWarehouseDelete = $(this).attr("codeWarehouseDelete");
  Swal.fire({
    icon: "warning",
    title: "¿Estás seguro(a) de eliminar el almacén?",
    text: "¡Si no lo estás puedes cancelar la acción!",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Eliminar",
  }).then(function (result) {
    if (result.value) {
      var data = new FormData();
      data.append("codeWarehouseDelete", codeWarehouseDelete);
      $.ajax({
        url: "ajax/warehouse.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
          Swal.fire({
            icon: "success",
            title: "¡Correcto!",
            text: "¡El almacén ha sido eliminado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
            closeOnConfirm: false,
          }).then((result) => {
            if (result.value) {
              window.location = "warehouse";
            }
          });
        },
      });
    }
  });
});

$("#addCode").change(function () {
  var code = $(this).val();
  var data = new FormData();
  data.append("validateCode", code);
  $.ajax({
    url: "ajax/warehouse.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      if (response) {
        $("#addCode").before(
          '<script>Swal.fire({icon: "error", title: "¡Error!", text: "El código ya existe en el sistema, debes agregar un código nuevo para el almacén", showConfirmButton: true, confirmButtonText: "Aceptar", closeOnConfirm: false });</script>'
        );
        $("#addCode").val("");
      }
    },
  });
});
