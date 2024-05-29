//Aplica máscara a campo phone formulário elementor

document.addEventListener("DOMContentLoaded", function() {
    var phoneInput = document.getElementById('form-field-phone');
    var streetInput = document.getElementById('form-field-postal_code');
  
    phoneInput.addEventListener('input', function() {
      var phone = phoneInput.value.replace(/\D/g, '');
  
      if(phone.length > 0) {
        phone = '(' + phone.substring(0, 2) + ')' + phone.substring(2);
      }
      if(phone.length > 3) {
        phone = phone.substring(0, 3) + ' ' + phone.substring(3);
      }
      if(phone.length > 10) {
        phone = phone.substring(0, 10) + '-' + phone.substring(10, 14);
      }
      phoneInput.value = phone;
    });
  
    streetInput.addEventListener('blur', function() {
      var phone = phoneInput.value;
      phone = phone.replace(/\D/g, ''); // Remove todos os caracteres não numéricos
      phoneInput.value = phone; // Define o valor sem a máscara
    });
  });
  