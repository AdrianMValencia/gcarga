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
      $("#editDocOptionCB").val(response["idTipoDoc"]);
      $("#editDocOptionCB").html(response["tipoDoc"]);
      $('input[name="editNroDoc"]').val(response["NroDoc"]);
      $("#editCodeJurisdictionOption")
        .val(response["jurisdic"])
        .trigger("change");
      console.log(response);
    },
  });
});
