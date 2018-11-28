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
        <li class="active">Configuración</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="row">
    	<div class="col-md-12">    		
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Configuraciones</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                    <div class="panel-body">
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Especialidad</h3>   
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    
                                    <form class="form-inline" role="form" id="formEspec">
                                        <label class="control-label col-md-12">Especialidad</label>
                                        <div class="form-group">                                            
                                            <div class="input-group">                                          
                                                <input class="form-control" type="text" id="especialidad" name="especialidad" placeholder=""/>
                                            </div>
                                        </div> 
                                        <span id="btnEspec">
                                            <button type="button" class="btn btn-primary" id="btnsaveEspec" onclick="guardarConfiguracion(this.form)"><i class="fa fa-save"></i></button>
                                        <!-- <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i></button> -->
                                        </span>                                   
                                        
                                    </form> 
                                    
                                    <table class="table datatable_simple">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody id="tblEspecialidad">                                            
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Formación</h3>   
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    
                                    <form class="form-inline" role="form">
                                        <label class="col-md-12">Formación</label>
                                        <div class="form-group">                                            
                                            <div class="input-group">                                          
                                                <input class="form-control" type="text" id="formacion" placeholder=""/>
                                            </div>
                                        </div> 
                                        <span id="btnForma">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                                        <!-- <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i></button> -->
                                        </span>                                   
                                        
                                    </form> 
                                    
                                    <table class="table datatable_simple">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="panel panel-default">
                                <div class="panel-heading">                                
                                    <h3 class="panel-title">Estado</h3>   
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div>
                                <div class="panel-body">
                                    
                                    <form class="form-inline" role="form">
                                        <label class="col-md-12">Estado</label>
                                        <div class="form-group">                                            
                                            <div class="input-group">                                          
                                                <input class="form-control" type="text" id="estado" placeholder=""/>
                                            </div>
                                        </div> 
                                        <span id="btnEstado">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i></button>
                                        <!-- <button type="submit" class="btn btn-danger"><i class="fa fa-save"></i></button> -->
                                        </span>                                   
                                        
                                    </form> 
                                    
                                    <table class="table datatable_simple">
                                        <thead>
                                            <tr>
                                                <th>Nombre</th>
                                                <th>Accion</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading">                                
                                <h3 class="panel-title">Simple</h3>   
                                <ul class="panel-controls">
                                    <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                    <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                    <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                </ul>                                
                            </div>
                            <div class="panel-body">
                                <table class="table datatable_simple">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Accion</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Tiger Nixon</td>
                                            <td>System Architect</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
    
</div>
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/mantenimiento.js"></script>
<?php
 $this->load->view('content/modales/modales');
 $this->load->view('foot');
?>