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

    // Función para validar los campos del formulario
    validateForm: function() {
    let formData = new FormData(); // Crear objeto FormData para almacenar los datos del formulario
    let isValid = true; // Variable para verificar si todos los campos son válidos

    // Iterar sobre todos los campos del formulario
    $('.required').each(function () {
      let input = $(this); // Obtener el campo actual
      let value = input.val().trim(); // Obtener el valor del campo y eliminar espacios en blanco

      // Verificar si el campo está vacío
      if (value === '') {
        // Agregar una clase de estilo para resaltar el campo vacío
        input.addClass('is-invalid');

        // Crear un mensaje de error
        let errorMessage = $('<div class="invalid-feedback">Campo vacío, rellenar</div>');

        // Insertar el mensaje de error después del campo
        input.after(errorMessage);

        isValid = false; // Marcar que hay errores en el formulario
      } else {
        // Si el campo no está vacío, quitar cualquier mensaje de error existente
        input.removeClass('is-invalid').next('.invalid-feedback').remove();

        // Agregar el valor del campo al objeto FormData
        formData.append(input.attr('id'), value);
      }
    });

    // Verificar si todos los campos son válidos
    return isValid;
  },


  init: function() { }
};
  
  }();

$(document).ready(function () {
  template.init();
});

$(document).on("click", ".deleteRegister", function () {
  template.deleteRegister($(this).data("id"), $(this).data("table"), $(this).data("suffix"), $(this).data("page"));
});



// Evento para manejar el envío del formulario
$('form').submit(function (event) {
  console.log('entro');
  // Evitar el comportamiento predeterminado del formulario (enviarlo)
  event.preventDefault();

  // Validar los campos del formulario
  if (template.validateForm()) {
      // Si todos los campos son válidos, continuar con el envío del formulario
      this.submit();
  }
});