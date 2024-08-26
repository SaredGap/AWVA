<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>AWVA</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/Login.css'); ?>" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-body">
                <h5 class="card-title text-center mb-4">Bienvenido</h5>
                <form action="<?php echo site_url('Auth/iniciarSesion'); ?>" method="post">
                    <div class="form-group">
                        <label for="username">Usuario</label>
                        <input type="text" class="form-control" name="Usuario" placeholder="Ingresa tu Usuario" required>
                    </div>
                    <div class="form-group">
                        <label for="userpassword">Contraseña</label>
                        <input type="password" class="form-control" name="Contraseña" placeholder="Ingresa tu contraseña" required>
                    </div>
                    <button class="btn btn-success btn-block" type="submit">Iniciar Sesión</button>
                </form>
                <div class="text-center mt-3">
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>

</html>
