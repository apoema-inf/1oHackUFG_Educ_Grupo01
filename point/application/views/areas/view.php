
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
              			<h3 class="box-title">Ver <?= $page_title; ?></h3>
            		</div>

					<?= validation_errors(); ?>	

					<div  class="box-body">
						<?php $atributos = array('class' => 'form-horizontal'); echo form_open('index.php/areas/editar/'.$areas['areas_id'], $atributos) ?>	
							
							<div class="form-group">
								<label class="col-md-2 control-label">areas</label>  
								<div class="col-md-5 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
										<input  name="areas_descricao" disabled value="<?= $areas['areas_descricao']; ?>" placeholder="Nome" required data-bv-notempty-message="Você deve informar uma areas!" class="form-control"  type="text">
									</div>
								</div>
							</div>
							
							<input name="areas_id" value="<?= $areas['areas_id']; ?>" type="hidden"  >

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<a href="<?php echo site_url('index.php/areas/editar/'.$areas['areas_id'])?>" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
								</div>
							</div>
							
						<?php echo form_close() ?>
      				</div>
    			</div>
  			</div>
  		</div>
	</section>
</div>




