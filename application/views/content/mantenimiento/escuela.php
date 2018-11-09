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
                        <form id="formRegEsc">
                         
                            <div class="col-md-12">
                                <div class="form-group col-md-3" id="1">
                                    <label class="control-label">Foto de Escuela</label>
                                    <input id="file-upload" type="file" accept="image/*" id="foto" name="foto" />
                                    <br>
                                    <div class="col-md-3">
                                      <input type="hidden" name="imgF" id="imgF">
                                        <img id="imgSalida" width="200" height="130" src="" />
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6" id="2">  
                                   <?php echo validation_errors(); ?>                                      
                                      <label class="control-label">Nombre de Escuela</label>
                                      <input type="text" class="form-control" id="nom_escuela" name="nom_escuela" value="">
                                    </div>
                                    <div class="form-group col-md-3" id="3">                                        
                                      <label class="control-label">Ruc</label>
                                      <input type="text" class="form-control numeric" id="ruc" name="ruc" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="4">                                        
                                     <label class="control-label">Direccíon</label>
                                      <input type="text" class="form-control" id="direccion"  name="direccion"placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="5">
                                        <label class="control-label">Telefonos</label>
                                        <input type="text" class="form-control" id="telefonos" name="telefonos" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="6">
                                        <label class="control-label">Correo Corporativo</label>
                                        <input type="text" class="form-control" id="correo" name="correo" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="7">
                                      <label class="control-label">Zona</label>
                                      <select class="form-control" id="zona" name="zona">
                                        <option value="">Seleccione...</option>
                                        <option value="Urbana">Urbana</option>
                                        <option value="Rural">Rural</option>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3" id="8">
                                        <label class="control-label">Turnos</label>
                                        <div class="form-group">
                                            <select id="turnos" name="turnos"  class="form-control col-md-3 multi-select-dd" multiple="multiple" >                     
                                                <option value="Inicial">Inicial</option>
                                                <option value="Dia"> Día</option>      
                                                <option value="Tarde">Tarde</option>
                                                <option value="Noche"> Noche</option>
                                            </select>   
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3" id="9">
                                        <label class="control-label">Año de Creación</label>
                                        <input type="text" class="form-control" id="creacion" name="creacion" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="10">
                                      <label class="control-label">Departamento</label><!-- <span class="fs-arrow"></span> -->
                                      <select class="form-control" id="departamento" name="departamento">
                                        <option value="">Seleccione...</option>
                                        <?php foreach ($dptos as $dpto) {?>
                                        <option value="<?php echo $dpto->idDepa ?>"><?php echo $dpto->departamento?></option>
                                        <?php } ?>
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3" id="11">
                                      <label class="control-label">Provincia</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="provincia" name="provincia">                                          
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3" id="12">
                                      <label class="control-label">Distrito</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="distrito" name="distrito">
                                      </select>
                                    </div>                                
                            </div> 
                            <div class="form-group col-xs-12 col-md-3 formBTn">
                              <button class="btn btn-info col-xs-12" id="save_escuela">Guadar</button>  
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
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/mantenimiento.js"></script> 
<?php
 $this->load->view('foot');
?>