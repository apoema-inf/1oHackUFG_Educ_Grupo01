
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            <?= $page_title; ?>
            <small>Painel Administrativo</small>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="#"><i class="fa fa-dashboard"></i> <?= $page_title; ?></a>
            </li>
            <li class="active">
                Painel Administrativo
            </li>
        </ol>
        <?= $this->session->flashdata('msg_ok');?>
    </section>
    
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                <div class="box-header">
                        <?php $atributos = array('class' => 'form'); echo form_open('index.php/usuario/pesquisar', $atributos) ?>
					        <div class="col-sm-6">
                                <div class="input-group-btn">
                                    <a href="<?php echo site_url('index.php/usuario/novo/'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="box-tools">
                                    <div class="input-group input-group-sm" style="width: 200px;">
                                        <input type="text" name="buscar" class="form-control pull-right" placeholder="Pesquisar">
                                        <div class="input-group-btn">
                                            <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>

                        <?php echo form_close() ?>
                    </div>
                    <!-- /.box-header -->

                    <div class="box-body table-responsive">
                        <table style="font-size: 18px" class="table table-striped">
                            <tr>
                                <th style="width: 60px">ID</th>
                                <th >Usuário</th>
                                <th style="width: 280px !important">Ações</th>
                            </tr>

                            <!-- /.abre a laço de repetição -->
                            <?php
                            if(empty($results)){
                                echo '<td colspans="3"> Ainda não tem '.$page_title.' cadastrado!</td>';
                            }else{
                                foreach ($results as $usuarios_item){ 
                            ?>
                                    <tr>
                                        <td scope="row"><?php  echo $usuarios_item->usuarios_id ?></td>
                                        <td>
                                            <a href="<?php echo site_url('index.php/usuario/view/'.$usuarios_item->usuarios_id) ?>" ><?php  echo $usuarios_item->usuarios_nome.' '.$usuarios_item->usuarios_sobrenome ?></a></td>
                                        <td>
                                            <a href="<?php echo site_url('index.php/usuario/view/'.$usuarios_item->usuarios_id)?>" class="btn btn-info"><i class="fa fa-eye"></i> Detalhes</a>
                                            <a href="<?php echo site_url('index.php/usuario/editar/'.$usuarios_item->usuarios_id)?>" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                            <a href="<?php echo site_url('index.php/usuario/deletar/'.$usuarios_item->usuarios_id)?>" class="btn btn-danger"><i class="fa fa-times"></i> Excluir</a>
                                        </td>
                                        
                                    </tr>
                            <?php  
                                } 
                            } 
                            ?>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer clearfix ">
                        <p><?php echo $links; ?></p>                       
                    </div>
                    <!-- /.box-footer -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.cool-12 -->
        </div>
        <!-- /.row -->
    </section>
</div>
<!-- /.content-wrapper -->