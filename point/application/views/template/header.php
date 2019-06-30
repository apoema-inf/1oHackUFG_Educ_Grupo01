<?php $foto = '';?>
<header class="main-header">
    <!-- Logo -->
    <a href="<?php echo base_url('index.php/administrativo')?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>P</b>E</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Point</b>EVENTOS</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Configurações</span>
        </a>

        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">       
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <img src="<?php echo base_url('assets/upload/perfil/'.foto_perfil_usuario($foto, $this->session->userdata('logged_in')['usuarios_sexo']))?>" class="user-image" alt="User Image">
                        <span class="hidden-xs"><?= $this->session->userdata('logged_in')['usuarios_nome'] ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?php echo base_url('assets/upload/perfil/'.foto_perfil_usuario($foto, $this->session->userdata('logged_in')['usuarios_sexo']))?>" class="img-circle" alt="User Image">

                            <p>
                                <?= $this->session->userdata('logged_in')['usuarios_nome'].' '.$this->session->userdata('logged_in')['usuarios_sobrenome']  ?>
                                <small><?= $this->session->userdata('logged_in')['usuarios_email'] ?></small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?php echo base_url('index.php/perfil')?>" class="btn btn-default btn-flat">Perfil</a>
                            </div>
                            <div class="pull-right">
                                <a href="<?php echo base_url('index.php/login/sair')?>" class="btn btn-default btn-flat">Desconectar</a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
                <!-- <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                </li> -->
            </ul>
        </div>
    </nav>
</header>