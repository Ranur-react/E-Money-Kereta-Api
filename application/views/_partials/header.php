<?php $link = base_url().'assets/'?>
<?php  
    $user=$this->session->userdata('user'); 
?>

<head>
  
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><i class="fa fa-train"></i>&nbsp;<b>E</b>T</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg" href="<?php echo site_url('home')?>"><i class="fa fa-train"></i>&nbsp;THE TRAIN</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">

      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <span class="hidden-xs"><?php echo "$user";?> </span>
                              <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGK_M4vdJQq1sdX4LDyU7NvRdM9eY4JZJYM0k9Gpse2YknSJTV&s" style="width: 20px;border-radius: 50%"  alt="User Image">
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQGK_M4vdJQq1sdX4LDyU7NvRdM9eY4JZJYM0k9Gpse2YknSJTV&s" class="img-circle" alt="User Image">

                <p>
                  Hello <?php echo "$user";?>, i'm smart tecnology. Let's become to close me
                </p>
              </li>
              <!-- Menu Body -->
             
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="<?php echo site_url('login/logout')?>" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
        </ul>
      </div>
    </nav>
  </header>