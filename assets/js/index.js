// Exibir o modal de erro se o login falhar
        document.addEventListener('DOMContentLoaded', function () {
            // Suponha que o erro de login é passado via query string
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('error') === 'true') {
                var errorModal = new bootstrap.Modal(document.getElementById('errorModal'));
                errorModal.show();
            }
        });