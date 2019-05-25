<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url() ?>admin-lte-master/dist/css/adminlte.css">
    <!-- iCheck -->

    <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="../../index2.html"><b>Sistem</b>PEMINJAMAN</a>
        </div>
        <!-- /.login-logo -->
        <div class="card">
            <div class="card-body login-card-body">
                <p class="login-box-msg">Login Pengguna</p>
                <form action="../../index2.html" method="post">
                    <div class="form-group has-feedback">
                        <input type="text" class="form-control" placeholder="NIP">
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Kata Sandi">
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="checkbox icheck">
                                <label>
                                    <input type="checkbox"> Ingatkan Saya
                                </label>
                            </div>
                        </div>
                         <!-- /.col -->
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">MASUK</button>
                        <button type="button" onclick="window.location='<?php echo base_url() ?>web/index';" class="btn btn-default float-right">BATAL</button>
                    </div>
                </form>

            </div>
        <!-- /.login-card-body -->
        </div>
    </div>
    <!-- /.login-box -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
</script>