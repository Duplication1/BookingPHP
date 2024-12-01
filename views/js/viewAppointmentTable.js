$(document).ready(function () {
    $('#viewAppointmentTable').DataTable({
columnDefs: [{
"defaultContent": "-",
"targets": "_all",
"targets": "td, th",
"className": "text-center align-middle"
}],
"order": [[0, 'desc']], 
language: {
    search: "<i class='bi bi-search'></i>",
}
});
    $('#viewAppointmentAcceptedTable').DataTable({
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
    $('#viewAppointmentConsultedTable').DataTable({
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
    $('#viewAppointmentRejectedTable').DataTable({
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



  });