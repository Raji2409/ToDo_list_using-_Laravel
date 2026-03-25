<!DOCTYPE html>
<html>
<head>
    <title>Create Todo</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Create new Task</h4>
                </div>

            <div class="card-body">
                
    <form id ="NewTask" action="{{ route('create') }}" method="POST">
        @csrf

        <div class="mb-3">
    <label class="form-label">Task</label>

    <input id ="task" 
           type="text"
           name="task"
           value="{{ old('task') }}"
           class="form-control @error('task') is-invalid @enderror">

    @error('task')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

        <div class="mb-3">
            <label class="form-label">Status</label>
            <select name="status" class="form-select">
                <option value="pending">Pending</option>
                <option value="in progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>
            <div class="d-flex justify-content-between">
                <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                                Back
                            </a>

                <button type="submit" class="btn btn-outline-success">Save</button>
        </div>
    </form>
</div>
</div>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
$(document).ready(function () {
    $('#NewTask').validate({
        rules: {
            task: {
                required: true,
                minlength: 3
            }
        },
        messages: {
            task: {
                required: "The Task field is empty",
                minlength: "Minimum 3 characters required"
            }
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('text-danger');
            error.insertAfter(element);
        }
    });
});
</script>
</body>
</html>