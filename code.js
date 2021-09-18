// hace referencia a el formulario de boostrap que esta oculto
const modalArticulo = new bootstrap.Modal(document.getElementById('modalArticulo'));
const modalUpdate = new bootstrap.Modal(document.getElementById('modalUpdate'));

const formCliente = document.querySelector('form');
// hace referencia a los iconos de Eliminar y Editar
const btnEditar = document.querySelectorAll('.btneditar');
const btnEliminar = document.querySelectorAll('.btneliminar');
// hace referencia al botton de crear nuevo cliente
const btnCrearCliente = document.getElementById('btnCrear');


// cuando ocurre el evento en el booton crear
btnCrearCliente.addEventListener('click', () => {
    // const iframeEdit = document.querySelector('.iframeEdit');
    formCliente.reset();
    modalArticulo.show();
});

// Cuando activamos el icono de Eliminar
btnEliminar.forEach(e => {
    e.addEventListener('click', (event) => {
        event.preventDefault();
        alertify.confirm("Deseas elimiar este cliente",
            function() {
                alertify.success('Ok');
                const identificador = e.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent;
                fetch(`delete_task.php?id=${identificador}`);
                document.location.href = 'index.php';
            },
            function() {
                alertify.error('Cancel');
            });
    })
});
// Cuando activamos el icono de Editar
btnEditar.forEach(e => {
    e.addEventListener('click', editarCliente);
});

function editarCliente(e) {
    formCliente.reset();
    const idColumn = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.textContent.trim();
    const alias = this.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.textContent.trim();
    const idbanco = this.parentElement.previousElementSibling.previousElementSibling.firstChild.textContent.trim();
    const ultimosdigitos = this.parentElement.previousElementSibling.textContent.trim();
    
    
    e.preventDefault();
    formCliente.reset();
    // modalArticulo.show();
    modalUpdate.show();
    // const datos = document.querySelector('tbody tr');
    const aliasEdit = document.getElementById('aliasUpdate');
    const id_bancoEdit = document.getElementById('id_bancoUpdate');
    // id_bancoEdit.onkeydown=true;
    // if(id_bancoEdit.value.length>=5) return false;

    const ultimos_digitosEdit = document.getElementById('ultimos_digitosUpdate');
    
    // const iframeEdit = document.querySelector('.iframeEdit');
    aliasEdit.value = alias;
    id_bancoEdit.value = idbanco;
    ultimos_digitosEdit.value = ultimosdigitos;
    btnUpadate.addEventListener('click', () => {
        const formModalUpdate = document.getElementById('formModalUpdate');
        formModalUpdate.setAttribute('action', `edit.php?id=${idColumn}`);
    });
};