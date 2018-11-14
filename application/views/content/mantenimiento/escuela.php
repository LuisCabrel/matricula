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
                        <form id="formRegEsc" enctype="multipart/form-data">
                         
                            <div class="col-md-12">
                                <div class="form-group col-md-3" id="1">
                                    <label class="control-label">Foto de Escuela</label>
                                    <input type="file" id="foto1" name="foto1" onchange="previewImage(1);" value="">
                                    <br>
                                    <div class="col-md-3">
                                      <input type="hidden" name="imgF1" id="imgF1">
                                        <img id="imgSalida1" width="200" height="130" src="" />
                                    </div>
                                  </div>
                                  <div class="form-group col-md-6" id="2">  
                                   <?php echo validation_errors(); ?>                                      
                                      <label class="control-label">Nombre de Escuela</label>
                                      <input type="text" class="form-control" id="nom_escuela" name="nom_escuela" value="">
                                    </div>
                                    <div class="form-group col-md-3" id="3">                                        
                                      <label class="control-label">Ruc</label>
                                      <input type="text" class="form-control numeric" id="ruc" name="ruc" maxlength="12" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="4">                                        
                                     <label class="control-label">Direccíon</label>
                                      <input type="text" class="form-control" id="direccion"  name="direccion"placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="5">
                                        <label class="control-label">Telefonos</label>
                                        <input type="text" class="form-control numeric" id="telefonos" name="telefonos" maxlength="9" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="6">
                                        <label class="control-label">Correo Corporativo</label>
                                        <input type="text" class="form-control" id="correo" name="correo" onChange="valemail(this.value)" placeholder="">
                                        <span class="email" id="emailOK"></span>
                                    </div>
                                    <div class="form-group col-md-3" id="7">
                                      <label class="control-label">Zona</label><span class="fs-arrow"></span>
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
                                            <input type="hidden" name="turnos_" id="turnos_" />   
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3" id="9">
                                        <label class="control-label">Año de Creación</label>
                                        <input type="text" class="form-control datepicker" id="creacion" name="creacion" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="10">
                                      <label class="control-label">Departamento</label><span class="fs-arrow"></span>
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
                          <br>            
                        </form>

                        <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h3 class="panel-title">Lista</h3>
                              </div>
                              <div class="panel-body">
                                <div class="table-responsive table-bordered pre-scrollable">
                                <table class="table table-responsive table-bordered pre-scrollable" >
                                  <thead style="background-color: #1d2127;color:#FFFFFF;">
                                    <tr>
                                    <!-- <th>#</th> -->
                                    <th>#</th>
                                    <th>FOTO</th>
                                    <th>NOMBRE</th>                                  
                                    <th>RUC</th>
                                    <th>DIRECCION</th>
                                    <th>TELEFONO</th>
                                    <th>EMAIL</th>
                                    <th>ZONA</th>
                                    <th>TURNOS</th>
                                    <th>CREACION</th>
                                    <th>DEPARTAMENTO</th>
                                    <th>PROVINCIA</th>
                                    <th>DISTRITO</th> 
                                    </tr>                        
                                  </thead>
                                  <tbody id="tbl_escuela">
                                  </tbody>
                                </table>
                                 <!-- <table class="table table-striped table-bordered" id="tbl_escuela">
                                 </table> -->
                              </div>
                              </div>
                        </div>
                        <!-- <div class="col-xs-12">
                          <div class="table-responsive table-bordered pre-scrollable">                        
                          <table class="table table-responsive table-bordered pre-scrollable">
                            <thead style="background-color: #73879C;color:#FFFFFF;">
                              <th>#</th>
                              <th>CODIGO</th>                                  
                              <th>LABORATORIO</th>
                              <th>DESCRIPCION</th>
                              <th>PRESENTACION</th>
                              <th>CANTIDAD</th>                         
                            </thead>
                            <tbody id="tbl_ingresados">
                            </tbody>
                          </table> 
                        </div>
                        </div> -->
                        
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
$this->load->view('content/modales/modales');
 $this->load->view('foot');
?>