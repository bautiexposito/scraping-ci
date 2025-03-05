<!DOCTYPE html>
<html>
<head>
    <title>Users List</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/index_user.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Users</h2>
        <a href="<?= site_url('user/create/') ?>" class="btn btn-primary">Add User</a>
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
            </tr>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= $user['id'] ?></td>
                    <td><?= $user['first_name'] ?></td>
                    <td><?= $user['last_name'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $user['phone'] ?></td>
                    <td>
                        <a href="<?= site_url('user/edit/'.$user['id']) ?>" class="btn btn-primary">Edit</a>
                        <a href="<?= site_url('user/delete/'.$user['id']) ?>" class="btn btn-danger">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>
</body>
</html>
