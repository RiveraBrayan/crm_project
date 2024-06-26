clients = function () {

  return {

    /**********************************************
    * Clients Functions
    **********************************************/
    tableClients: function () {

      let action = 'tableClients';

      var url = `controllers/clientsController.php?action=${action}`;

      var columns = [
        { data: 'counter' },
        { data: 'fullName' },
        { data: 'phone_client' },
        { data: 'mail_client' },
        { data: 'address_client' },
        { data: 'organization_client' },
        { data: 'actions' }
      ];

      table = `tableClients`;

      execDatatable(table, url, columns);
    },

    infoClient: function () {

      var data = new FormData();
      data.append("action", 'infoClient');
      data.append("id", $('#txtId').val());

      $.ajax({
        url: 'controllers/clientsController.php',
        method: 'POST',
        processData: false,
        contentType: false,
        data: data,
        dataType: 'json',
        success: function (response) {
          if (response.status == 202) {
            let data = response.JsonData;

            $('#firstName_client').val(data.firstName_client);
            $('#secondName_client').val(data.secondName_client);
            $('#phone_client').val(data.phone_client);
            $('#mail_client').val(data.mail_client);
            $('#address_client').val(data.address_client);
            $('#organization_client').val(data.organization_client);

            if (data.status_client == 1) {
              var miCheckbox = document.getElementById('checkboxActive');
              miCheckbox.checked = true;
            }
          }
        },
        error: function (error) {
          console.error('Errors');
        }
      });
    },

    saveInfo: function () {


      let action = 'saveClientsInfo';
      let txtId = $('#txtId').val();
      let firstName_client = $('#firstName_client').val();
      let secondName_client = $('#secondName_client').val();
      let phone_client = $('#phone_client ').val();
      let mail_client = $('#mail_client ').val();
      let address_client = $('#address_client ').val();
      let organization_client = $('#organization_client ').val();
      let checkboxActive = document.getElementById('checkboxActive').checked ? 1 : 0;

      var data = new FormData();
      data.append("action", action);
      data.append("txtId", txtId);
      data.append("firstName_client", firstName_client);
      data.append("secondName_client", secondName_client);
      data.append("phone_client", phone_client);
      data.append("mail_client", mail_client);
      data.append("address_client", address_client);
      data.append("organization_client", organization_client);
      data.append("checkboxActive", checkboxActive);

      $.ajax({
        url: 'controllers/clientsController.php',
        method: 'POST',
        processData: false,
        contentType: false,
        data: data,
        dataType: 'json',
        success: function (response) {
          status = response.status;
          message = response.message;

          if (status == 202) {
            fncSweetAlert('success', message, 'clients');
          } else {
            fncSweetAlert('error', message, 'text');
          }
        },
        error: function (error) {
          console.error('Errors');
        }
      });
    },

    /**********************************************
    * Interactions Functios
    **********************************************/
    tableInteractions: function () {

      let action = 'tableInteractions';
      let id_client = $('#id_client').val();

      var url = `controllers/clientsController.php?action=${action}&id_client=${id_client}`;

      var columns = [
        { data: 'counter' },
        { data: 'type_interaction' },
        { data: 'date_interaction' },
        { data: 'description_interaction' },
        { data: 'actions' }
      ];

      table = `tableInteractions`;

      execDatatable(table, url, columns);
    },

    saveInfoInteractions: function () {


      let action = 'saveInteractionsInfo';
      let id_client = $('#id_client').val();
      let id_interaction = $('#id_interaction').val();
      let txtTypeInteraction = $('#txtTypeInteraction').val();
      let txtDate = $('#txtDate').val();
      let txtDescription = $('#txtDescription ').val();

      var data = new FormData();
      data.append("action", action);
      data.append("id_client", id_client);
      data.append("id_interaction", id_interaction);
      data.append("txtTypeInteraction", txtTypeInteraction);
      data.append("txtDate", txtDate);
      data.append("txtDescription", txtDescription);

      console.log(data);

      $.ajax({
        url: 'controllers/clientsController.php',
        method: 'POST',
        processData: false,
        contentType: false,
        data: data,
        dataType: 'json',
        success: function (response) {
          status = response.status;
          message = response.message;

          if (status == 202) {
            id = response.id;
            fncSweetAlert('success', message, `clients&interaction=${id}`);
          } else {
            fncSweetAlert('error', message, 'text');
          }
        },
        error: function (error) {
          console.error('Errors');
        }
      });
    },

    /**********************************************
    * Extra Functions
    **********************************************/

    showInputs: function () {
      document.getElementById('inputCheckbox').style = 'display:block'
    },

    init: function () { }
  };

}();

$(document).ready(function () {
  clients.init();
});


if ($("#tableClients").length > 0) {
  clients.tableClients();
}

$('.searchInfo').on('click', function () {
  clients.tableClients();
});


if ($("#txtId").length > 0) {
  if ($('#txtId').val() != '') {
    clients.showInputs();
    clients.infoClient();

    $('#form').parsley().on('form:submit', function () {
      event.preventDefault();
      clients.saveInfo();
    });
  }
}

if ($("#tableInteractions").length > 0) {
  clients.tableInteractions();
}

$("body").on("click", ".btnModalClients", function () {
  if($(this).data("id")){
    $('#id_interaction').val($(this).data("id"));
    $('#txtTypeInteraction').val($(this).data("type_interaction"));
    $('#txtDescription').val($(this).data("description"));
    $('#txtDate').val($(this).data("date"));
  }else{
    $('#id_interaction').val('');
    $('#txtTypeInteraction').val('');
    $('#txtDescription').val('');
    $('#txtDate').val('');
  }


  $('#form').parsley().on('form:submit', function () {
    event.preventDefault();
    clients.saveInfoInteractions();
  });
});


if ($("#id_interaction").length > 0) {
  if ($('#id_interaction').val() != '') {
    console.log('entro');
  }
}

