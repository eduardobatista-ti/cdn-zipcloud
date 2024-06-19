function update_cart () {
    // Função para atualizar o carrinho com debounce
    var updateCart = debounce(function() {
        var updateButton = document.querySelector('button[name="update_cart"]');
        if (updateButton) {
            updateButton.click();
            setTimeout(reloadPage, 1000); // Recarrega a página após 1 segundo
        }
    }, 500);

    // Função debounce para adicionar ao input de quantidade
    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }

    // Adiciona listener de input para cada input de quantidade
    var quantityInputs = document.querySelectorAll('input.qty');
    quantityInputs.forEach(function (input) {
        input.addEventListener('input', updateCart);
    });

    // Função para recarregar a página
    function reloadPage() {
        location.reload();
    }
};


