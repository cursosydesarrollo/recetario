
$(document).ready( function () {
    $('#laravel_datatable').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/users-list",
        "order": [[0, "desc"]],
        columns: [
        { data: 'id', name: 'users.id' },
        { data: 'name', name: 'users.name' },
        { data: 'email', name: 'users.email' },
        { data: 'rname', name: 'rname' },
        { data: 'updated_at', name: 'users.updated_at' },
        { data: 'actions', name: 'actions' }
        ]

    });
});