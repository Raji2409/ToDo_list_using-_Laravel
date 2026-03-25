<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">


<link href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css" rel="stylesheet">


<link href="https://cdn.datatables.net/buttons/3.0.1/css/buttons.dataTables.min.css" rel="stylesheet">


<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

.dt-button.btn-warning {
    background-color: #ffca1c !important;
    color: black !important;
    border: none !important;
}

.dt-button.btn-warning:hover {
    background-color: #fde038ea !important;
}
</style>

<title>Todo List</title>
</head>

<body class="bg-light">

<div class="container">

<h2 class="fs-1 fw-bolder text-center">Todo List</h2>

<div class="nav justify-content-end">
<a href="{{ route('create.form') }}" class="btn btn-lg btn-warning">
Add New Task
</a><br><br>
</div>


<table id="myTable" class="table table-bordered table-light table-hover">


<thead class="table-warning text-center">
<tr>
<th>Sno:</th>
<th>Task</th>
<th>Status</th>
<th class="noExport">Actions</th>
</tr>
</thead>

<tbody>
@foreach($todos as $todo)
<tr>
<td>{{ $loop->iteration }}</td>
<td>{{ $todo->task }}</td>
<td>{{ $todo->status }}</td>
<td>

<a href="{{ route('edit', $todo->id) }}" class="btn btn-outline-warning">
Edit
</a>

<a href="{{ route('delete', $todo->id) }}"
onclick="return confirm('Are you sure?')"
class="btn btn-outline-danger">
Delete
</a>

</td>
</tr>
@endforeach
</tbody>

</table>



<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>


<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>


<script src="https://cdn.datatables.net/buttons/3.0.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/3.0.1/js/buttons.print.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>

<script>
let table = new DataTable('#myTable', {
layout: {
topEnd: [{ 
buttons: [
                { extend: 'copy',  exportOptions:{columns:[0,1,2]}, className: 'btn btn-sm btn-warning'},
                { extend: 'excel', exportOptions:{columns:':not(.noExport)'}, className: 'btn btn-sm btn-warning' },
                { extend: 'pdf', exportOptions:{columns:':not(.noExport)'}, className: 'btn btn-sm btn-warning' },
                { extend: 'print', exportOptions:{columns:':not(.noExport)'}, className: 'btn btn-sm btn-warning'

                }
          
]
},'search']
}
});
</script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>