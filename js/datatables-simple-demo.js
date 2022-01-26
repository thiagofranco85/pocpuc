window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('datatablesSimple');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple,
            {
                labels: {
                    placeholder: "buscar...",
                    perPage: "{select} resultados por página",
                    noRows: "Sem resultados",
                    noResults: "Sem resultado para o termo buscado",
                    info: "Exibindo {start} de {end} de {rows} resultados"
                },
            });
    }
});
