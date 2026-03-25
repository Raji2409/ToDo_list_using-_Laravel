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
                
    <form id ="NewTask" action="<?php echo e(route('create')); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <div class="mb-3">
    <label class="form-label">Task</label>

    <input id ="task" 
           type="text"
           name="task"
           value="<?php echo e(old('task')); ?>"
           class="form-control <?php $__errorArgs = ['task'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> is-invalid <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>">

    <?php $__errorArgs = ['task'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <div class="invalid-feedback">
            <?php echo e($message); ?>

        </div>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
                <a href="<?php echo e(url('/')); ?>" class="btn btn-outline-secondary">
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
</html><?php /**PATH /config/workspace/Project/task_manager/resources/views/todos/create.blade.php ENDPATH**/ ?>