<!DOCTYPE html>
<html lang="en">

<head>

    <title>Login - Pesto</title>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="<?php echo base_url('assets/images/favicon-32x32.png'); ?>">


    <!-- Custom fonts for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/sb-admin-2.min.css'); ?>" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="<?php echo base_url('assets/vendor/fontawesome-free/css/dataTables.bootstrap4.min.css'); ?>"
        rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-10">
                        <!-- Nested Row within Card Body -->
                        <div class="row">

                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Sign In</h1>

                                    </div>
                                    <!-- <form class="user" method="POST" action="<?php echo base_url(); ?>login/login_validation"> -->
                                    <?php echo form_open('login/login_validation', array('id' => 'formLogin')); ?>
                                    <div class="form-group">
                                        <input type="email" class="form-control form-control-user" name="email_id"
                                            id="email_id" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                            id="password" placeholder="Password">
                                    </div>

                                    <input type="button" class="btn btn-primary btn-user btn-block" value="Login"
                                        id="btnLogin">

                                    <hr>

                                    </form>



                                    <?php if ($this->session->flashdata('login_success')) { ?>

                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Success!</strong>
                                        <?php echo $this->session->flashdata('login_success'); ?>
                                    </div>

                                    <?php } elseif ($this->session->flashdata('login_error')) { ?>

                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>Error!</strong> <?php echo $this->session->flashdata('login_error'); ?>
                                    </div>

                                    <?php } ?>


                                    <?php /* 
    <div class="text-center">
      <a href="<?php echo base_url('login/forgot_password'); ?>" class="btn btn-danger btn-sm"
                                    id="btnForgotPassword">Forgot Password ?</a>


                                </div>
                                */ ?>


                            </div>
                        </div>


                        <div class="col-lg-6 d-lg-block ">

                            <div class="p-5">

                                <div align="center">
                                    <img src="<?php echo base_url('assets/images/login-image.png'); ?>" alt="Pesto"
                                        class="img-responsive" style="width: 100%">
                                </div>
                            </div>

                        </div> <!-- bg-login-image -->

                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>



    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>




    <!-- Bootstrap core JavaScript-->
    <?php /* <script src="<?php echo base_url('assets/vendor/jquery/jquery.min.js'); ?>"></script> */ ?>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="<?php echo base_url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url('assets/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url('assets/js/sb-admin-2.min.js'); ?>"></script>


    <!-- Page level plugins -->
    <script src="<?php echo base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>

    <script type="text/javascript">
    $("#btnLogin").click(function() {

        $("#formLogin").submit();

    });
    </script>

</body>

</html>