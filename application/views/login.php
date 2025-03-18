<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/login.css'); ?>">
</head>

<body>
    <div class="container">
        <div class="login-card">
            <h2>Bienvenido!</h2>

            <?php if ($this->session->flashdata('error')): ?>
                <p class="error"><?= $this->session->flashdata('error'); ?></p>
            <?php endif; ?>

            <form action="<?= site_url('login/autenticar'); ?>" method="post">
                <div class="input-group">
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="input-group">
                    <input type="password" name="password" placeholder="Contraseña" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="customCheck">
                    <label for="customCheck">Recordar</label>
                </div>
                <button type="submit" class="btn">Iniciar sesión</button>
            </form>

            <div class="links">
                <a href="#">Olvidé mi contraseña</a>
                <a href="user/create">Crear cuenta</a>
            </div>
        </div>
    </div>
</body>
</html>
