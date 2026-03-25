<!DOCTYPE html>
<html>
<head>
    <title>Edit Todo</title>

 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header bg-warning text-dark">
                    <h4 class="mb-0">Edit Task</h4>
                </div>

                <div class="card-body">

                    <form id = "UpdateTask" action="{{ url('edit/'.$todo->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        
                        <div class="mb-3">
                            <label class="form-label">Task</label>
                            <input id ="task" type="text"
                                   name="task"
                                   value="{{ $todo->task }}"
                                   class="form-control"
                                   required>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" class="form-select">
                                <option value="pending" {{ $todo->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in progress" {{ $todo->status == 'in progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="completed" {{ $todo->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            </select>
                        </div>

                       
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/') }}" class="btn btn-outline-secondary">
                                Back
                            </a>

                            <button type="submit" class="btn btn-outline-success">
                                Update Task
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.min.js"></script>

<script>
$(document).ready(function () {
    $('#UpdateTask').validate({
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