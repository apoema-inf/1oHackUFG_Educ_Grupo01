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
    </section>
  
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <?= $this->session->flashdata('msg_ok');?>
                <!-- general form elements -->
                <div class="box box-primary">
                    
                    <div class="box-header with-border">
                        <h3 class="box-title">Cadastro de Foto Perfil</h3>
                    </div>

                    
                    <?php $atributos = array('role' => 'form'); echo form_open_multipart('index.php/perfil/upload/'.$this->session->userdata('logged_in')['usuarios_id'], $atributos); ?>
                        <div class="box-body">
                            
                            <div class="form-group">
                                <label for="exampleInputFile" class="col-md-2 control-label">Carregar foto <i class="glyphicon glyphicon-camera"></i></label> 
                                <input required id="exampleInputFile" type="file" name="foto_perfil_descricao" >
                                
                            </div> 

                            <div class="form-group">
                                <div class="col-lg-9 col-lg-offset-3">
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Salvar</button>
                                </div>
                            </div>
    
                        </div>
                    <?php echo form_close() ?>
                </div>
            </div>
        </div>
    </section>
</div>

