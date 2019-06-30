
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
                        <?php $atributos = array('class' => 'form'); echo form_open('index.php/eventos/pesquisar', $atributos) ?>
					        <div class="col-sm-6">
                                <div class="input-group-btn">
                                    <a href="<?php echo site_url('index.php/eventos/novo/'); ?>" class="btn btn-success"><i class="fa fa-plus"></i> Novo</a>
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
                                <th style="width: 70px">ID</th>
                                <th >Descrição</th>
                                <th style="width: 80px">Valor</th>
                                <th style="width: 280px">Ações</th>
                            </tr>

                            <?php
                            if(empty($results)){
                                echo '<td colspan="4"> Ainda não tem '.$page_title.' cadastrado!</td>';
                            }else{
                                foreach ($results as $eventos_item){ 
                            ?>
                                    <tr>
                                        <td scope="row"><?php  echo $eventos_item->eventos_id ?></td>
                                        <td>
                                            <a href="<?php echo site_url('index.php/eventos/view/'.$eventos_item->eventos_id) ?>" ><?php  echo $eventos_item->eventos_descricao ?></a>
                                        </td>
                                        <td>
                                            <?php echo formato_dinheiro_bra($eventos_item->eventos_valor); ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo site_url('index.php/eventos/view/'.$eventos_item->eventos_id)?>" class="btn btn-info"><i class="fa fa-eye"></i> Detalhes</a>
                                            <a href="<?php echo site_url('index.php/eventos/editar/'.$eventos_item->eventos_id)?>" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
                                            <a href="<?php echo site_url('index.php/eventos/deletar/'.$eventos_item->eventos_id)?>" class="btn btn-danger"><i class="fa fa-times"></i> Excluir</a>
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