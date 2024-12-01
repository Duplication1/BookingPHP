$(document).ready(function () {
    $('#myTable').DataTable({
columnDefs: [{
"defaultContent": "-",
"targets": "td, th",
"className": "text-center align-middle"
}],
"order": [[0, 'desc']],
language: {
        search: "<i class='bi bi-search'></i>",
    }
});
$('#myTable2').DataTable({
columnDefs: [{
"defaultContent": "-",
"targets": "td, th",
"className": "text-center align-middle"
}],
"order": [[0, 'desc']],
"search": {
        "search": "Pending" // Filters rows containing "Pending" by default
},
language: {
        search: "<i class='bi bi-search'></i>",
    }
});
$('#myTable3').DataTable({
columnDefs: [{
"defaultContent": "-",
"targets": "td, th",
"className": "text-center align-middle"
}],
"order": [[0, 'desc']],
"search": {
        "search": "Consulted" // Filters rows containing "Pending" by default
},
language: {
        search: "<i class='bi bi-search'></i>",
    }
});
$('#myTable4').DataTable({
columnDefs: [{
"defaultContent": "-",
"targets": "td, th",
"className": "text-center align-middle"
}],
"order": [[0, 'desc']],
"search": {
        "search": "Rejected"// Filters rows containing "Pending" by default
},
language: {
        search: "<i class='bi bi-search'></i>",
    }
});
$('#myTable5').DataTable({
columnDefs: [{
"defaultContent": "-",
"targets": "td, th",
"className": "text-center align-middle"
}],
"order": [[0, 'desc']],
"search": {
        "search": "Accepted" // Filters rows containing "Pending" by default
},
language: {
        search: "<i class='bi bi-search'></i>",
    }
});
});