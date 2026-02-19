function initDeleteButtons() {

    const forms = document.querySelectorAll('.delete-form');

    if (!forms.length) return;

    forms.forEach(form => {

        // evitar duplicar eventos si vuelve a ejecutarse
        if (form.dataset.confirmAttached) return;

        form.dataset.confirmAttached = "true";

        form.addEventListener('submit', function (e) {
            e.preventDefault();

            Swal.fire({
                title: 'Confirmar eliminación',
                text: 'Esta acción no se puede deshacer.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Eliminar',
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#dc3545'
            }).then(result => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });

        });

    });
}

/*
|--------------------------------------------------------------------------
| IMPORTANTE: con Vite hay que ejecutarlo directo
|--------------------------------------------------------------------------
*/

initDeleteButtons();

/*
|--------------------------------------------------------------------------
| Y también observar si Laravel vuelve a renderizar cosas (modales, etc.)
|--------------------------------------------------------------------------
*/

const observer = new MutationObserver(() => {
    initDeleteButtons();
});

observer.observe(document.body, {
    childList: true,
    subtree: true
});
