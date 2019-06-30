
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
              			<h3 class="box-title">Informações do <?= $page_title; ?></h3>
            		</div>
    
					<?= $this->session->flashdata('msg_ok');?>
					<?= validation_errors(); ?>	

					<div class="box-body">
						<?php $atributos = array('class' => 'form-horizontal'); echo form_open('index.php/usuario/editar/'.$usuarios['usuarios_id'], $atributos) ?>	
							<!-- Nome-->
							<div class="form-group">
								<label class="col-md-2 control-label" >Nome</label>  
								<div class="col-md-5 inputGroupContainer ">
									<div class="input-group ">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input  name="usuarios_nome"   value="<?= $usuarios['usuarios_nome']; ?>" class="form-control .disabled"  type="text" id="disabledInput" disabled>
									</div>
								</div>
							</div>
							<!-- Sobrenome-->
							<div class="form-group">
								<label class="col-md-2 control-label" >Sobrenome</label> 
								<div class="col-md-5 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
										<input name="usuarios_sobrenome"  disabled value="<?= $usuarios['usuarios_sobrenome']; ?>" placeholder="Sobrenome" required data-bv-notempty-message="Você deve informar o Sobrenome!" class="form-control"  type="text">
									</div>
								</div>
							</div>

							<!-- E-mail-->
							<div class="form-group">
								<label class="col-md-2 control-label">E-Mail</label>  
								<div class="col-md-5 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
										<input name="usuarios_email" disabled value="<?= $usuarios['usuarios_email']; ?>" placeholder="E-Mail" required data-bv-notempty-message="Você deve informar o seu e-mail!" class="form-control"  type="email">
									</div>
								</div>
							</div>

							<!-- Sexo -->
							<div class="form-group">
								<label class="col-md-2 control-label">Sexo</label>
								<div class="col-md-5">
									<?php 
										$M = '';
										$F = '';
										$O = '';
										if($usuarios['usuarios_sexo'] == 'M'){
											$M = "CHECKED";
										}else if($usuarios['usuarios_sexo'] == 'F'){
											$F = "CHECKED";
										}else if($usuarios['usuarios_sexo'] == 'O'){
											$O = "CHECKED";
										}		
									?>
									<div class="radio">
										<label>
											<input type="radio" disabled name="usuarios_sexo" value="M" <?= $M ?>/> Masculino
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" disabled name="usuarios_sexo" value="F" <?= $F ?>/> Feminino
										</label>
									</div>
									<div class="radio">
										<label>
											<input type="radio" disabled name="usuarios_sexo" value="O" <?= $O ?>/> Outros
										</label>
									</div>
								</div>
							</div>

							<!-- cpf-->
							<div class="form-group">
								<label class="col-md-2 control-label">CPF</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-certificate"></i></span>
										<input name="usuarios_cpf" disabled value="<?= $usuarios['usuarios_cpf']; ?>" placeholder="111.111.111-11" required data-bv-notempty-message="Você deve informar o CPF!"  class="form-control" data-mask="000.000.000-00" type="text">
									</div>
								</div>
							</div>

							<!-- Telefone móvel-->
							<div class="form-group">
								<label class="col-md-2 control-label">Tel. Móvel</label>  
								<div class="col-md-3 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-phone"></i></span>
										<input name="usuarios_fone1" disabled value="<?= $usuarios['usuarios_fone1']; ?>" placeholder="(62) 99999-9999" required data-bv-notempty-message="Você deve informar um telefone para contato!"  class="form-control" data-mask="(00) 00000-0000" type="text">
									</div>
								</div>
							</div>

							<!-- Telefone Fixo-->
							<div class="form-group">
								<label class="col-md-2 control-label">Tel. Fixo</label>  
								<div class="col-md-3 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span>
										<input name="usuarios_fone2" disabled value="<?= $usuarios['usuarios_fone2']; ?>" placeholder="(62) 3333-1212" class="form-control" data-mask="(00) 0000-0000" type="phone">
									</div>
								</div>
							</div>

							<!-- Data Nascimento-->
							<div class="form-group">
								<label class="col-md-2 control-label">Data de nascimento</label>  
								<div class="col-md-2 inputGroupContainer">
									<div class="input-group">
										<span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
										<input name="usuarios_data_nasc" disabled value="<?= $usuarios['usuarios_data_nasc']; ?>"  required class="form-control"  type="date">
									</div>
								</div>
							</div>

							<div class="form-group">
								<div class="col-lg-9 col-lg-offset-3">
									<a href="<?php echo site_url('index.php/usuario/editar/'.$usuarios['usuarios_id'])?>" class="btn btn-primary"><i class="fa fa-edit"></i> Editar</a>
									
								</div>
							</div>
							
						<?php echo form_close() ?>
      				</div>
    			</div>
  			</div>
  		</div>
	</section>
</div>




