<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/edit_user.css'); ?>">
</head>
<body>
    <div class="container">
        <h2>Editar Usuario</h2>
        <form method="post">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="first_name" class="form-control" value="<?= $user['first_name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Apellido</label>
                <input type="text" name="last_name" class="form-control" value="<?= $user['last_name'] ?>" required>
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="<?= $user['email'] ?>" required>
            </div>
            <div class="form-group">
                <label>Celular</label>
                <input type="text" name="phone" class="form-control" value="<?= $user['phone'] ?>" required>
            </div>
            <button type="submit" class="btn btn-success">Actualizar</button>
        </form>
    </div>
</body>
</html>
