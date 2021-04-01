$(".tableCustomsBroker").DataTable({
  ajax: "ajax/datatable-customs-broker.ajax.php",
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

$(document).on("click", ".editCustomsBroker", function () {
  var idAgte = $(this).attr("idAgte");
  var data = new FormData();
  data.append("idAgte", idAgte);
  $.ajax({
    url: "ajax/customs-broker.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    dataType: "json",
    success: function (response) {
      $('input[name="idAgte"]').val(response["idAgte"]);
      $('input[name="editCode"]').val(response["codigo"]);
      $('input[name="editBusinessName"]').val(response["razonSocial"]);
      $("#editDocOptionCB").val(response["idTipoDoc"]).trigger("change");
      $('input[name="editNroDoc"]').val(response["NroDoc"]);
      $("#editCodeJurisdictionOption")
        .val(response["jurisdic"])
        .trigger("change");
      console.log(response);
    },
  });
});

$(document).on("click", ".btnChangeState", function () {
  var idAgteCB = $(this).attr("idAgteCB");
  var stateCustomsBroker = $(this).attr("stateCustomsBroker");
  var button = $(this);
  var data = new FormData();
  data.append("idAgteCB", idAgteCB);
  data.append("stateCustomsBroker", stateCustomsBroker);
  $.ajax({
    url: "ajax/customs-broker.ajax.php",
    method: "POST",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    success: function (response) {
      if (response == "ok") {
        if (stateCustomsBroker == "DESHABILITADO") {
          $(button).removeClass("btn-success");
          $(button).addClass("btn-dark");
          $(button).html("DESHABILITADO");
          $(button).attr("stateCustomsBroker", "HABILITADO");
        } else {
          $(button).addClass("btn-success");
          $(button).removeClass("btn-dark");
          $(button).html("HABILITADO");
          $(button).attr("stateCustomsBroker", "DESHABILITADO");
        }
      }
    },
  });
});

$(document).on("click", ".deleteCustomsBroker", function () {
  var idAgteDelete = $(this).attr("idAgteDelete");
  Swal.fire({
    icon: "warning",
    title: "¿Estás seguro(a) de eliminar el agente de aduana?",
    text: "¡Si no lo estás puedes cancelar la acción!",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    cancelButtonText: "Cancelar",
    confirmButtonText: "Eliminar",
  }).then(function (result) {
    if (result.value) {
      var data = new FormData();
      data.append("idAgteDelete", idAgteDelete);
      $.ajax({
        url: "ajax/customs-broker.ajax.php",
        method: "POST",
        data: data,
        cache: false,
        contentType: false,
        processData: false,
        success: function (response) {
          Swal.fire({
            icon: "success",
            title: "¡Correcto!",
            text: "¡El agente de aduana ha sido eliminado correctamente!",
            showConfirmButton: true,
            confirmButtonText: "Aceptar",
            closeOnConfirm: false,
          }).then((result) => {
            if (result.value) {
              window.location = "customs-broker";
            }
          });
        },
      });
    }
  });
});
