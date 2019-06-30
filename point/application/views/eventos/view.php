
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
              			<h3 class="box-title">Ver <?= $page_title; ?></h3>
            		</div>
    
					<?= $this->session->flashdata('msg_ok');?>
					<?= validation_errors(); ?>	

					<div  class="box-body">
						<?php $atributos = array('class' => 'form-horizontal'); echo form_open('index.php/eventos/editar/'.$eventos['eventos_id'], $atributos) ?>	
							<!-- Nome-->
							<div class="form-group">
								<label class="col-md-2 control-label">Áreas de Conhecimento</label>
								<div class="col-md-5 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-th-list"></i></span>
										<select required name="eventos_areas_id" disabled class="form-control">
											<option selected disabled>Selecione uma área</option>
											<?php 
											if(empty($areas)){
												echo "<option > Não há dados</option>";
											}else{
												
												foreach ($areas as $ar){
													$selected = '';
													if($eventos['eventos_areas_id'] == $ar->areas_id){
														$selected = 'selected';
													}
													echo '<option value ="'.$ar->areas_id.'" '.$selected.'>'.$ar->areas_descricao.'</option>';	
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
										<input disabled name="eventos_descricao" value="<?= $eventos['eventos_descricao']; ?>"  placeholder="Nome do Evento" required data-bv-notempty-message="Você deve informar a descrição!" class="form-control"  type="text">
									</div>
								</div>
							</div>
						
							<div class="form-group">
								<label class="col-md-2 control-label">Valor</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span>
										<input disabled name="eventos_valor" value="<?= $eventos['eventos_valor']; ?>"  data-mask="#.##0,00" data-mask-reverse="true"  placeholder="Valor" required data-bv-notempty-message="Você deve informar o valor" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Data - Inicio</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input disabled name="eventos_data_inicial" value="<?= $eventos['eventos_data_inicial']; ?>"   required data-bv-notempty-message="Data" class="form-control"  type="date">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Data - Final</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input disabled name="eventos_data_final" value="<?= $eventos['eventos_data_inicial']; ?>" required data-bv-notempty-message="Data" class="form-control"  type="date">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Horário de início</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										<input disabled name="eventos_horario_inicial" value="<?= $eventos['eventos_horario_inicial']; ?>" required data-bv-notempty-message="Hora" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Horário Final</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-time"></i></span>
										<input disabled name="eventos_horario_final" value="<?= $eventos['eventos_horario_final']; ?>" required data-bv-notempty-message="Hora" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Carga Horária</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-record"></i></span>
										<input disabled name="eventos_carga_horaria" value="<?= $eventos['eventos_carga_horaria']; ?>" required data-bv-notempty-message="Carga Horária" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Vagas</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="fa fa-users"></i></span>
										<input disabled name="eventos_vagas" value="<?= $eventos['eventos_vagas']; ?>" required data-bv-notempty-message="Vagas" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<div class="form-group">
								<label class="col-md-2 control-label">Descrição</label>  
								<div  class="col-md-6 inputGroupContainer">
										<textarea disabled name="eventos_info" class="form-control"><?= $eventos['eventos_info']; ?></textarea>
									</div>
								</div>
							</div>

								
							<input name="eventos_id" value="<?= $eventos['eventos_id']; ?>" type="hidden"  >
							<input name="eventos_responsavel_usuarios_id" value="<?= $this->session->userdata('logged_in')['usuarios_id'] ?>" type="hidden"  >

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<a href="<?php echo site_url('index.php/eventos/editar/'.$eventos['eventos_id'])?>" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
								</div>
							</div>
							
						<?php echo form_close() ?>
      				</div>
    			</div>
  			</div>
  		</div>
	</section>
</div>




