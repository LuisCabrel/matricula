<?php
 $this->load->view('head');
 $this->load->view('menu');
?>
 <!-- PAGE CONTENT -->
<div class="page-content">    
    <!-- START X-NAVIGATION VERTICAL -->
    <?php 
    $this->load->view('menu_head');
    ?>
    <!-- END X-NAVIGATION VERTICAL -->                     
    
    <!-- START BREADCRUMB -->
    <ul class="breadcrumb">
        <li><a href="#">Mantenimiento</a></li>                    
        <li class="active">Escuela</li>
    </ul>
    <!-- END BREADCRUMB --> 
    <!-- START WIDGETS -->                    
    <div class="row"> 
         <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Registrar</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                    <div class="panel-body">
                        <form>
                            <div class="col-md-12">
                                <div class="form-group col-md-3">
                                    <label for="exampleInputFile">Foto de Escuela</label>
                                    <input id="file-upload" type="file" accept="image/*" />
                                    <br>
                                    <div class="col-md-3">
                                        <img id="imgSalida" width="200" height="130" src="" />
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6">                                        
                                      <label class="control-label">Nombre de Escuela</label>
                                      <input type="text" class="form-control" id="nom_escuela" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">                                        
                                      <label class="control-label">Ruc</label>
                                      <input type="text" class="form-control numeric" id="ruc" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">                                        
                                     <label class="control-label">Direccíon</label>
                                      <input type="text" class="form-control" id="direccion" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label">Telefonos</label>
                                        <input type="text" class="form-control" id="telefonos" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label">Correo Corporativo</label>
                                        <input type="text" class="form-control" id="correo" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="sel1">Zona</label>
                                      <select class="form-control" id="zona">
                                        <option value="0">Seleccione...</option>
                                        <option value="Urbana">Urbana</option>
                                        <option value="Rural">Rural</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label">Turnos</label>
                                        <div class="form-group">
                                            <select id="turnos" name="turnos[]"  class="form-control col-md-3 multi-select-dd" multiple="multiple" >                     
                                                <option value="Inicial">Inicial</option>
                                                <option value="Dia"> Día</option>      
                                                <option value="Tarde">Tarde</option>
                                                <option value="Noche"> Noche</option>
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label class="control-label">Año de Creación</label>
                                        <input type="text" class="form-control" id="creacion" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="sel1">Departamento</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="departamento">
                                        <option value="0">Seleccione...</option>
                                        <?php foreach ($dptos as $dpto) {?>
                                        <option value="<?php echo $dpto->idDepa ?>"><?php echo $dpto->departamento?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="sel1">Provincia</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="provincia">                                          
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3">
                                      <label for="sel1">Distrito</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="distrito">
                                      </select>
                                    </div>                                
                            </div> 
                            <div class="form-group col-xs-12 col-md-3 formBTn">
                              <button type="submit" class="btn btn-info col-xs-12">Guadar</button>  
                            </div>
                                      
                        </form>
                    </div>
                </div>
            </div>
         </div>     
    </div>
    <!-- END WIDGETS --> 
</div>            
<!-- END PAGE CONTENT -->
<?php
 $this->load->view('foot');
?>