<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login | THE TRAIN</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php $link = base_url().'assets/'?>
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="<?php echo $link;?>bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo $link;?>bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo $link;?>bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo $link;?>dist/css/AdminLTE.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="<?php echo $link;?>plugins/iCheck/square/blue.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <style type="text/css">
        .Boxradius{
            border-radius: 20px;
        }
        .bgcek{
            background-image: url('https://cdna.artstation.com/p/assets/images/images/011/834/704/large/bk-baratth-backup-of-backup-of-model-train.jpg?1531675306');   
            background-size: 100%;
            transition-delay: 0.4s;
        }
        .bgcek:hover{
            background-size: 102%; 
            transition-delay: 0.4s;  
            
        }
    </style>
</head>
<body class="hold-transition login-page bgcek" >
    <div class="login-box" >
        
        <!-- /.login-logo -->
        <div class="login-box-body Boxradius" style="background-color: rgba(250,250,250,0.95);position: fixed; width: 400px" >
        <div class="login-logo" style="margin-top: -50px; font-size: 30px">
            <p><img src="https://previews.123rf.com/images/arhimicrostok/arhimicrostok1708/arhimicrostok170801475/84518113-train-icon-metro-symbol-railway-station-sign-.jpg" style="width: 200px;border-radius: 50%" ></p>
            <a href="<?php echo base_url();?>"><b>THE TRAIN </b><small>E- Money</small></a>
        </div>

            <p class="login-box-msg">Plese Login to Continue</p>
           
            <?php echo form_open(site_url('Login/masuk'))?>
            <?php echo $this->session->flashdata('msg');?>
                <div class="form-group has-feedback">
                    <input type="text" name="un" class="form-control Boxradius" placeholder="Username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="ps" class="form-control Boxradius" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <a style="font-size: 10px" href="<?php echo(site_url('Daftarakun'))?>">Click here to create an account</a>
                    </div>
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block  Boxradius">LOGIN</button>
                    </div>
                    <?php echo form_close();?>
                </div>
            
        </div>
    </div>
    <!-- jQuery 3 -->
    <script src="<?php echo $link;?>bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="<?php echo $link;?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- iCheck -->
    <script src="<?php echo $link;?>plugins/iCheck/icheck.min.js"></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' /* optional */
            });
        });
    </script>
</body>
</html>
