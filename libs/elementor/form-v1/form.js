//Aplica máscara a campo phone formulário elementor 

function phone() {
  var phoneInput = document.getElementById('form-field-phone');
  var phoneInput2 = document.getElementById('form-field-phone2'); // Novo campo

  phoneInput.addEventListener('input', function(e) {
      let phone = phoneInput.value.replace(/\D/g, '');
      let formattedPhone = '';

      if (e.inputType === 'deleteContentBackward') {
          phoneInput.value = phone;
      } else {
          if (phone.length > 0) {
              formattedPhone = '(' + phone.substring(0, 2) + ')';
          }
          if (phone.length > 2) {
              formattedPhone += ' ' + phone.substring(2, 7);
          }
          if (phone.length > 7) {
              formattedPhone += '-' + phone.substring(7, 11);
          }
          phoneInput.value = formattedPhone;
      }
      // Atualizar o campo form-field-phone2 sem caracteres especiais
      phoneInput2.value = phone;
  });
}
  