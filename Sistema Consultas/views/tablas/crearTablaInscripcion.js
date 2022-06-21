
function crearTabla(){
    $(document).ready(function() {
    $('#tablaInscripcion').DataTable({
        language: {
            lengthMenu: 'Mostrar _MENU_ registros por pagina',
            zeroRecords: 'No hay resultados',
            info: 'Mostrando pagina _PAGE_ de _PAGES_',
            infoEmpty: 'No hay consultas con ese filtro',
            loadingRecords: "Cargando...",
            search: "Filtrar por modalidad o estado:",
            paginate: {
            "first":      "Primero",
            "last":       "Ultimo",
            "next":       "Siguiente",
            "previous":   "Anterior"
            },
            infoFiltered:   "",
        },
        columnDefs: [
            { orderable: false, targets: [3,4,5] },
            { searchable: false, targets: [0,3,4,5] }
          ],
          order: [[1, 'asc']]
    })
});
}