template = function () {

  return {

    /* The `deleteRegister` function in the JavaScript code is responsible for handling the
    deletion of a record. Here is a breakdown of what it does: */
    deleteRegister: function (id, table, suffix, page) {
      fncSweetAlert('delete', 'Do you want to delete this record?', 'reload').then(resp => {

        if (resp) {
          var data = new FormData();
          data.append("action", 'deleteRegister');
          data.append("id", id);
          data.append("table", table);
          data.append("suffix", suffix);

          $.ajax({
            url: "controllers/functionsController.php",
            method: 'POST',
            processData: false,
            contentType: false,
            data: data,
            dataType: 'json',
            success: function (response) {
              if (response) {
                fncSweetAlert('success', 'Record Deleted Successfully!', 'reload');
              } else {
                fncSweetAlert('error', 'Error in execution', 'reload');
              }
            }

          })
        }
      })
    },

    init: function () { }
  };

}();

$(document).ready(function () {
  template.init();
});

$(document).on("click", ".deleteRegister", function () {
  template.deleteRegister($(this).data("id"), $(this).data("table"), $(this).data("suffix"), $(this).data("page"));
});



