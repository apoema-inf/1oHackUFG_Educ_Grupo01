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
          		<!-- <div class="box box-primary"> -->
				  <?php
					echo $this->session->flashdata('msg_ok');
					echo validation_errors();
                    if(empty($eventos)){
                        echo 'Ainda não tem '.$page_title.' cadastrado!';
                    }else{
						 $inscritos = 10;
						 $i = 1;
                         foreach ($eventos as $ev){
							if ($i == 5){
								$i = 1;
							}
							$foto = '';
							 
                    ?>
					<!-- <div class="row"> -->
						<div class="col-md-6">
							
							<!-- Widget: user widget style 1 -->
							<div class="box box-widget widget-user-2">
								<!-- Add the bg color to the header using any of the bg-* classes -->
								<a href="<?php echo site_url('index.php/inscricao/inscrever/'.$ev->eventos_id.'/'.$this->session->userdata('logged_in')['usuarios_id'])?>">
								<div class="widget-user-header <?= cor_box($i) ?>">
									<!-- <div class="widget-user-image">
										<img class="img-circle" src="<?php // echo base_url('assets/upload/eventos/hackathon.png')?>" alt="Evento">
									</div> -->
									<!-- /.widget-user-image -->
									<h3 class="widget-user-username"><?= $ev->eventos_descricao ?></h3>
									<h5 class="widget-user-desc"><?= info_evento($ev->eventos_data_inicial,$ev->eventos_data_final,$ev->eventos_horario_inicial,$ev->eventos_horario_final); ?> </h5>
								</div>

								<div class="box-footer no-padding">
									<ul class="nav nav-stacked">
										<li>
											<a href="<?php echo site_url('index.php/inscricao/inscrever/'.$ev->eventos_id.'/'.$this->session->userdata('logged_in')['usuarios_id'])?>">
											Participar <span class="pull-right badge bg-aqua"><?= info_vagas($ev->eventos_vagas, $inscritos) ?></span>
											</a>
										</li>
									</ul>
									
								</div>
							</div>
						</div>
						<?php
						$i++;
						} }
						?>
						

					<!-- </div> -->
				<!-- </div> -->
  			</div>
  		</div>
	</section>
</div>
