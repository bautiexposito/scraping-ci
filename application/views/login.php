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
            <form>
                <div class="input-group">
                    <input type="email" id="txtEmail" placeholder="Enter Email Address..." required>
                </div>
                <div class="input-group">
                    <input type="password" id="txtPassword" placeholder="Password" required>
                </div>
                <div class="checkbox-group">
                    <input type="checkbox" id="customCheck">
                    <label for="customCheck">Recordar</label>
                </div>
                <button type="submit" class="btn">Iniciar sesión</button>
            </form>
            <div class="links">
                <a href="forgot-password.html">Olvidé mi contraseña</a>
                <a href="register.html">Crear cuenta</a>
            </div>
        </div>
    </div>
</body>
</html>
