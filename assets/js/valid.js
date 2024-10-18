// Espera que o documento seja carregado antes de rodar o script
document.addEventListener('DOMContentLoaded', function() {
    // Seleciona todos os formulários que precisam de validação
    var forms = document.querySelectorAll('.needs-validation');
    
    // Faz um loop sobre eles e impede o envio do formulário se não forem válidos
    Array.prototype.slice.call(forms).forEach(function(form) {
        form.addEventListener('submit', function(event) {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }

            form.classList.add('was-validated');
        }, false);
    });
});
