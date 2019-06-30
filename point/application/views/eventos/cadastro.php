
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
					<?php $atributos = array('class' => 'form-horizontal'); echo form_open('index.php/eventos/novo',$atributos) ?>	
						
						<div class="form-group">
							<label class="col-md-2 control-label">Áreas de Conhecimento</label>
							<div class="col-md-5 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
									<select required name="eventos_areas_id"  class="form-control">
										<option selected disabled>Selecione uma área</option>
										<?php 
										if(empty($areas)){
											echo "<option > Não há usuarios</option>";
										}else{
											foreach ($areas as $ar){
												echo '<option value ="'.$ar->areas_id.'">'.$ar->areas_descricao.'</option>';	
											}
										}
										?>
									</select>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Nome</label>  
							<div class="col-md-5 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-info-sign"></i></span>
									<input  name="eventos_descricao"  placeholder="Nome do Evento" required data-bv-notempty-message="Você deve informar a descrição!" class="form-control"  type="text">
								</div>
							</div>
						</div>
					
						<div class="form-group">
							<label class="col-md-2 control-label">Valor</label>  
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
									<input  name="eventos_valor" data-mask="#.##0,00" data-mask-reverse="true"  placeholder="Valor" required data-bv-notempty-message="Você deve informar o valor" class="form-control"  type="text">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Data - Inicio</label>  
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input  name="eventos_data_inicial"  required data-bv-notempty-message="Data" class="form-control"  type="date">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Data - Final</label>  
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
									<input  name="eventos_data_final"  required data-bv-notempty-message="Data" class="form-control"  type="date">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Horário inicial</label>  
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input  name="eventos_horario_inicial"  required data-bv-notempty-message="Hora" class="form-control"  type="text">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Horário Final</label>  
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
									<input  name="eventos_horario_final"  required data-bv-notempty-message="Hora" class="form-control"  type="text">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Carga Horária</label>  
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
									<input  name="eventos_carga_horaria"  required data-bv-notempty-message="Carga Horária" class="form-control"  type="text">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Nº de Vagas</label>  
							<div class="col-md-2 inputGroupContainer">
								<div class="input-group">
									<span class="input-group-addon"><i class="fa fa-users"></i></span>
									<input  name="eventos_vagas"  required data-bv-notempty-message="Vagas" class="form-control"  type="text">
								</div>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-2 control-label">Descrição</label>  
							<div class="col-md-6 inputGroupContainer">
									<textarea name="eventos_info" class="form-control"></textarea>
								</div>
							</div>
						</div>
						
						<input name="eventos_responsavel_usuarios_id" value="<?= $this->session->userdata('logged_in')['usuarios_id'] ?>" type="hidden"  >

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




