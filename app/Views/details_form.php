<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details Form</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .form-container {
            max-width: 560px;
            margin: 50px auto;
            padding: 20px;
            background: white;
            border-radius: 5px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        .header-container {
            display: flex;
            margin-top: 15px;
            justify-content: flex-end;
            margin-bottom: 1rem; 
        }
    </style>
</head>

<body>
<div class="container">
<div class="header-container">
            <a href="<?= site_url('upload') ?>" class="btn btn-primary">File Upload</a> 
           
         </div>
        
<div class="form-container">

    <h2 class="text-center">User Details</h2>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('success') ?>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger" role="alert">
            <?= session()->getFlashdata('error') ?>
        </div>
    <?php endif; ?>

    <form  id="userForm" action="<?= site_url('details/save') ?>" method="post">
        <?= csrf_field() ?>
        <div class="form-group">
        <input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : '' ?>">

            <label for="username">Username:</label>

            <input type="text" class="form-control" id="username" name="username" value="<?= isset($user['username']) ? htmlspecialchars($user['username']) : '' ?>" required>

            <!-- <input type="text" class="form-control" id="username" name="username" required> -->
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= isset($user['email']) ? htmlspecialchars($user['email']) : '' ?>" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" value="<?= isset($user['password']) ? htmlspecialchars($user['password']) : '' ?>" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
    <div class="table-container">
    <h3 class="text-center">User List</h3>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($users)): ?>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <a href="<?= site_url('details/edit/' . $user['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="<?= site_url('details/delete/' . $user['id']) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4" class="text-center">No users found</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

    <!-- Pagination Links -->
</div>
</div>
</div>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        // Reset the form
        document.getElementById("userForm").reset();
    });
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
