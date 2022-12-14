<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Iniciar ession</title>
    <link href="<?php echo base_url; ?>Assets/css/styles.css" rel="stylesheet" />
    <script src="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Login</h3>
                                </div>
                                <div class="card-body">
                                    <form id=frmlogin>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="usuario" name="usuario" type="email" placeholder="name@example.com" />
                                            <label for="usuario"><i class="fas fa-user"></i> Email address</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" id="clave" name="clave" type="password" placeholder="Password" />
                                            <label for="clave"><i class="fas fa-key"></i> Password</label>
                                        </div>
                                        <div class="alert alert-danger text-center d-none" id="alerta" role="alert">

                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">

                                            <button class="btn btn-primary" type="submit" onclick="frmlogin(event);">login<button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small"><a href="register.html">Need an account? Sign up!</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; <a href="https://www.google.com/maps/d/u/0/embed?mid=1tXj90OkIeKj5U2jKcYyisx0xGnB3WTqQ"> Ingresar como invitado</a>
                            <?php echo date("Y") ?>
                        </div>
                        <div>
                            <a href="#">Privacy Policy</a>
                            &middot;
                            <a href="#">Terms &amp; Conditions</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url; ?>Assets/js/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="<?php echo base_url; ?>Assets/js/scripts.js"></script>
    <script>
        const base_url = "<?php echo base_url ?>"
    </script>
    <script src="<?php echo base_url; ?>Assets/js/funciones.js"></script>
</body>

</html>