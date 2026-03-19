//SENHA

    const senha = document.getElementById('senha');
    const mostrarSenha = document.getElementById('mostrar-senha');

    mostrarSenha.addEventListener('click', function() {
        if (mostrarSenha.checked) {
            senha.type = 'text';
        } 
        
        else {
            senha.type = 'password';
        }
    });