<?php
if($this->session->userdata('logged_in') != '') { 
?> 
     
<!DOCTYPE html>
<html>
     <head>
          <meta charset="utf-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <title>Administrativo | Point Eventos</title>
          <!-- Tell the browser to be responsive to screen width -->
          <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
          <!-- Bootstrap 3.3.7 -->
          <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
          <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css')?>">
          <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css')?>">
          <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
          <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>"> -->
          <!-- <link rel="stylesheet" href="<?php // echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css') ?>"> -->
          <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css')?>"> -->
          <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/validation/dist/css/bootstrapValidator.css')?>"/> -->
          <!-- <link rel="stylesheet" href="<?php // echo base_url('assets/bower_components/fullcalendar/dist/fullcalendar.min.css')?>"> -->
          <!-- <link rel="stylesheet" href="<?php // echo base_url('assets/bower_components/fullcalendar/dist/css/personalizado.css')?>"> -->
          <!-- <link rel="stylesheet" href="<?php // echo base_url('assets/bower_components/fullcalendar/dist/fullcalendar.print.min.css')?>" media="print"> -->
          <!-- <link rel="stylesheet" href="<?php //echo base_url('assets/plugins/iCheck/all.css')?>"> -->
          <!-- <link rel="stylesheet" href="<?php // echo base_url('assets/bower_components/morris.js/morris.css')?>"> -->
          <!-- <link rel="stylesheet" href="<?php // echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css')?>"> -->
          <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css')?>">
          <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css')?>">
          <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">
          <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
     </head>
     
     <body class="hold-transition skin-blue sidebar-mini">
          <div class="wrapper">
               <?php

                    $this->load->view('template/header');
                    $this->load->view('template/sidebar');
                    $this->load->view($pagina);
                    $this->load->view('template/footer');
                    //$this->load->view('template/configbar');

               ?>
          </div>

          <!-- jQuery 3 / jQuery UI 1.11.4  -->
          <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
          <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
          <script>
               $.widget.bridge('uibutton', $.ui.button);
          </script>
          <!-- Bootstrap 3.3.7 -->
          <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js')?>"></script>
          <!-- <script src="<?php //echo base_url('assets/plugins/input-mask/jquery.inputmask.js')?>"></script> -->
          <!-- <script src="<?php // echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js')?>"></script> -->
          <!-- <script src="<?php // echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js')?>"></script> -->
          <script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js')?>"></script>
          <script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js')?>"></script>
          <!-- <script src="<?php // echo base_url('assets/validation/dist/js/bootstrapValidator.js')?>"></script> -->
          <script src="<?php echo base_url('assets/validation/jquery.mask.js')?>"></script>
          <script src="<?php echo base_url('assets/validation/viacep.js')?>"></script>
          <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js')?>"></script>
          <!-- jvectormap -->
          <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')?>"></script>
          <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')?>"></script>
          
          <!-- jQuery Knob Chart -->
          <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js')?>"></script>
          <script src="<?php echo base_url('assets/bower_components/moment/moment.js')?>"></script>
          <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
          <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
          <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/locales/bootstrap-datepicker.pt-BR.min.js')?>" ></script>
          <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')?>"></script>
          <script src="<?php echo base_url('assets/dist/js/adminlte.min.js')?>"></script>
          <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js')?>"></script>
          <!-- <script src="<?php // echo base_url('assets/dist/js/demo.js')?>"></script> -->
          <script src="<?php echo base_url('assets/bower_components/ckeditor/ckeditor.js') ?>"></script>
          <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
          <script>
               $(function () {
                    // Replace the <textarea id="editor1"> with a CKEditor
                    // instance, using default configuration.
                    CKEDITOR.replace('editor1')
                    CKEDITOR.replace('editor2')
                    CKEDITOR.replace('editor3')
                    //bootstrap WYSIHTML5 - text editor
                    $('.textarea').wysihtml5()
               })
          </script>
     </body>
</html>

<?php  } else { redirect('index.php/login'); } ?>