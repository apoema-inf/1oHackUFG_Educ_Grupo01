
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
          		<!-- general form elements -->
          		<div class="box box-primary">
            		<div class="box-header with-border">
              			<h3 class="box-title">Cadastro de <?= $page_title; ?></h3>
            		</div>
    
					<?= validation_errors(); ?>	

					<div class="box-body">
						<?php $atributos = array('class' => 'form-horizontal'); echo form_open('index.php/areas/novo',$atributos) ?>	
							
							<div class="form-group">
								<label class="col-md-2 control-label">areas</label>  
								<div class="col-md-5 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
										<input  name="areas_descricao" placeholder="Nome" required data-bv-notempty-message="Você deve informar a areas!" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
								<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Salvar</button>
								</div>
							</div>

							<br />
						<?php echo form_close() ?>
      				</div>
    			</div>
  			</div>
  		</div>
	</section>
</div>




