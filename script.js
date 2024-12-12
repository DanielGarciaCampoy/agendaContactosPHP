function abrirDialogForm() {
    document.getElementById('dialogForm').showModal();
}

function cerrarDialogForm() {
    document.getElementById('dialogForm').close();
}

function submitForm(contactCard) {
    const form = contactCard.querySelector('form');
    if (form) {
        form.submit();
    }
}