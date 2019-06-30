<?php $foto = ''; ?>
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url('assets/upload/perfil/'.foto_perfil_usuario($foto, $this->session->userdata('logged_in')['usuarios_sexo']))?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('logged_in')['usuarios_nome'] ?></p>
                <a href="<?php echo base_url('index.php/administrativo/')?>"> <i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">Administrador</li>

            <li>
                <a href="<?php echo base_url('index.php/administrativo')?>">
                    <i class="fa fa-home"></i> <span>Página Inicial</span>
                    <span class="pull-right-container">
                      <small class="label pull-right bg-green"></small>
                    </span>
                </a>
            </li>

            <li class="treeview">
                <a href="#">
                    <i class="fa fa-user"></i>
                    <span>Usuários</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li>
                        <a href="<?php echo base_url('index.php/usuario')?>">
                            <i class="fa fa-user"></i> <span>Usuários</span>
                            <span class="pull-right-container">
                                <small class="label pull-right bg-green"></small>
                            </span>
                        </a>
                    </li>
                    
                    <li>
                        <a href="<?php echo base_url('index.php/perfil')?>">
                            <i class="fa fa-user"></i> <span>Perfil</span>
                            <span class="pull-right-container">
                              <small class="label pull-right bg-green"></small>
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
            

                <li>
                    <a href="<?php echo base_url('index.php/eventos')?>">
                        <i class="glyphicon glyphicon-duplicate"></i> <span>Eventos</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green"></small>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('index.php/areas')?>">
                        <i class="glyphicon glyphicon-th-list"></i> <span>Areas</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green"></small>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('index.php/inscricao')?>">
                        <i class="fa fa-reorder"></i> <span>Inscrição</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green"></small>
                        </span>
                    </a>
                </li>

                <li>
                    <a href="<?php echo base_url('index.php/credenciamento')?>">
                        <i class="fa fa-check-square-o"></i> <span>Credenciamento</span>
                        <span class="pull-right-container">
                            <small class="label pull-right bg-green"></small>
                        </span>
                    </a>
                </li>

                


            
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>