<?php
 $this->load->view('head');
 $this->load->view('menu');
?>
<div class="page-content">
	<?php 
    $this->load->view('menu_head');
    ?>
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Home</a></li>                    
        <li class="active">Email</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="row">
    	<div class="col-md-12">    		
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Enviar Email</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                    <div class="panel-body">
                        <form id="forEmail" role="form" action="" class="form-horizontal">
                        	<div class="form-group">
                                <label class="col-md-2 control-label">From:</label>
                                <div class="col-md-9">                                        
                                    <input type="text" class="form-control" name="from">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">To:</label>
                                <div class="col-md-9">                                        
                                    <input type="text" class="form-control" value="" data-placeholder="add email"/>                                
                                </div>
                                <div class="col-md-1">
                                    <button class="btn btn-link toggle" data-toggle="mail-cc">Cc</button>
                                </div>
                            </div>
                            <div class="form-group hidden" id="mail-cc">
                                <label class="col-md-2 control-label">Cc:</label>
                                <div class="col-md-10">                                        
                                <input type="text" class="form-control" value="" data-placeholder="add email"/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Subject:</label>
                                <div class="col-md-9">                                        
                                    <input type="text" class="form-control" value="Re: Lorem ipsum dolor sit amet"/>            
                                </div>                                
                            </div>
                            <div class="form-group">
                                <label class="col-md-2 control-label">Attachments:</label>
                                <div class="col-md-10">                                        
                                    <input type="file" class="file" data-filename-placement="inside"/>
                                </div>                                
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">                            
                                    <textarea class="form-control summernote_email"></textarea>                            
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="pull-left">
                                    	<!-- <input type="reset" name="" class="btn btn-danger" value="Limpiar"> -->
                                        <button class="btn btn-default"><span class="fa fa-trash-o"></span> Limpiar</button>
                                    </div>
                                    <div class="pull-right">
                                    	<input type="submit" name="" class="btn btn-danger" value="Enviar">
                                        <!-- <button ><span class="fa fa-envelope"></span> Enviar</button> -->
                                    </div>                                    
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
    
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/plugins/summernote/summernote.js"></script>
<?php
 $this->load->view('foot');
?>