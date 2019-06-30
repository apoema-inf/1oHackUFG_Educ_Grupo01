
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
              			<h3 class="box-title"><?= $page_title; ?></h3>
            		</div>
    
					<?= validation_errors(); ?>	
					
					<div class="box-body">
					<?php $atributos = array('class' => 'form-horizontal'); echo form_open('index.php/credenciamento/credenciar',$atributos) ?>	
						<?php 
							if(empty($eventos)){
								echo "Não há Eventos";
							}else{
								echo $eventos['eventos_descricao'];	
								}
						?>
						<div class="form-group">
							<label class="col-md-2 control-label">Eventos</label>
							<div class="col-md-5 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
									<select required name="usuarios_id"  class="form-control">
										<option selected disabled>Selecione uma área</option>
										<?php 
										if(empty($usuarios)){
											echo "<option > Não há usuarios</option>";
										}else{
											foreach ($usuarios as $user){
												echo '<option value ="'.$user->usuarios_id.'">'.$user->usuarios_nome.' '.$user->usuarios_sobrenome.'</option>';	
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>					
						
						<input name="credenciador_id" value="<?= $this->session->userdata('logged_in')['usuarios_id'] ?>" type="hidden"  >
						<input name="eventos_id" value="<?= $eventos['eventos_id']?>" type="hidden"  >
					
						<div class="form-group">
							<div class="col-lg-9 col-lg-offset-3">
							<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Credenciar</button>
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




