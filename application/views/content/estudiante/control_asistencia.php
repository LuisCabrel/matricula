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
        <li class="active">Estudiante</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="row">
    	<div class="col-md-12">    		
			<div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Asistencia</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                    <div class="panel-body"> 
                        <div class="container">
                            <form class="form-inline">
                              <div class="form-group  col-md-2">
                                <label class="col-md-12">Nivel</label>
                                <input type="text" class="form-control col-md-12" id="nivel" name="nivel">
                              </div>
                              <div class="form-group col-md-2">
                                <label class="col-md-12">Grado</label>
                                <input type="text" class="form-control col-md-12" id="grado" name="grado">
                              </div>
                              <div class="form-group col-md-2">
                                <label class="col-md-12">Sección</label>
                                <input type="text" class="form-control col-md-12" id="seccion" name="seccion">
                              </div>
                              <div class="form-group col-md-2">
                                <label class="col-md-9">Fecha</label>
                                <input type="text" class="form-control col-md-12" id="fecha" name="fecha">
                                <!-- <button type="submit" class="btn btn-default">Sign in</button> -->
                              </div>
                              <div class="form-group col-md-3">
                                <label class="col-md-12">&nbsp</label>
                                  <button type="button" class="btn btn-primary">Guardar</button>
                              </div>
                            </form>
                        </div> 
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <!-- <div class="panel-heading">                                
                                    <h3 class="panel-title">Asistencia</h3>   
                                    <ul class="panel-controls">
                                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                                    </ul>                                
                                </div> -->
                                <div class="panel-body"> 
                                    <table class="table display">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
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
                    </div>
                </div>
            </div>
    	</div>
    </div>
</div>
    
</div>

<?php
 $this->load->view('foot');
?>