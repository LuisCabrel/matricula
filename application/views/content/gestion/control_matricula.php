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
        <li class="active">Matricula</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="row">
    	<div class="col-md-12">
    		<div class="col-md-6">
    			<div class="container">
				  <div class="panel panel-default">
				    <div class="panel-heading">Panel Heading</div>
				    <div class="panel-body">Panel Content</div>
				  </div>
				</div>
    		</div>
    		<div class="col-md-6">
				  <div class="panel panel-default">
				    <div class="panel-heading">Panel Heading</div>
				    <div class="panel-body">Panel Content</div>
				  </div>
				</div>
    		</div>
    	</div>
    </div>
    
</div>
<?php
 $this->load->view('foot');
?>