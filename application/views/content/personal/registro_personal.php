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
        <li class="active">Personal</li>
    </ul>
    <!-- END BREADCRUMB -->
    <div class="row">
      <div class="col-md-12">       
      <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title"><strong>Registro Personal</strong></h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                    <div class="panel-body">
                        <form id="formRegEsc" enctype="multipart/form-data" method="POST">
                          <input type="hidden" id="id_escuela" name="id_escuela" value="">
                         <input type="hidden" id="status" name="status" value="">
                            <div class="col-md-12">
                                <div class="form-group col-md-3" id="1">
                                    <label class="control-label">Foto de Personal</label>
                                    <input type="file" id="foto2" name="foto2" onchange="previewImage(2);" value="">
                                    <br>
                                    <div class="col-md-3">
                                      <input type="hidden" name="imgF2" id="imgF2">
                                        <img id="imgSalida2" width="200" height="270" src="" />
                                    </div>
                                  </div>
                                  
                                    <div class="form-group col-md-3" id="3">                                        
                                      <label class="control-label">Dni</label>
                                      <input type="text" class="form-control numeric" id="ruc" name="ruc" maxlength="8" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="2">                                     
                                      <label class="control-label">Nombres</label>
                                      <input type="text" class="form-control" id="nom_personal" name="nom_personal" value="">
                                    </div>
                                    <div class="form-group col-md-3" id="4">                                        
                                     <label class="control-label">Apellido</label>
                                      <input type="text" class="form-control" id="apellido"  name="apellido"placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="5">
                                        <label class="control-label">Telefono</label>
                                        <input type="text" class="form-control numeric" id="telefono" name="telefono" maxlength="9">
                                    </div>
                                    <div class="form-group col-md-3" id="5">
                                        <label class="control-label">Celular</label>
                                        <input type="text" class="form-control numeric" id="celular" name="celular" maxlength="9">
                                    </div>
                                    <div class="form-group col-md-3" id="5">
                                        <label class="control-label">Dirección de Domicilio</label>
                                        <input type="text" class="form-control numeric" id="direccion" name="direccion" placeholder="">
                                    </div>                                    
                                    <div class="form-group col-md-3" id="10">
                                      <label class="control-label">Departamento</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="departamento" name="departamento">
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
                                    <div class="form-group col-md-3" id="9">
                                        <label class="control-label">Fecha Nacimiento</label>
                                        <input type="text" class="form-control datepicker" id="creacion" name="creacion" placeholder="">
                                    </div>
                                    <div class="form-group col-md-6" id="5">
                                        <label class="control-label">Lugar de Nacimiento</label>
                                        <input type="text" class="form-control numeric" id="direccion" name="direccion" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="12">
                                      <label class="control-label">Género</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="distrito" name="distrito">
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3" id="6">
                                        <label class="control-label">Correo Electronico</label>
                                        <input type="text" class="form-control" id="correo" name="correo" onChange="valemail(this.value)" placeholder="">
                                        <span class="email" id="emailOK"></span>
                                    </div>
                                    <div class="form-group col-md-3" id="9">
                                        <label class="control-label">Fecha Ingreso</label>
                                        <input type="text" class="form-control datepicker" id="creacion" name="creacion" placeholder="">
                                    </div>
                                    <div class="form-group col-md-3" id="10">
                                      <label class="control-label">Cargo</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="cargo" name="cargo">
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3" id="11">
                                      <label class="control-label">Especialidad</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="especialidad" name="especialidad">                                      
                                      </select>
                                    </div>
                                    <div class="form-group col-md-3" id="12">
                                      <label class="control-label">Formación</label><span class="fs-arrow"></span>
                                      <select class="form-control" id="formacion" name="formacion">
                                      </select>
                                    </div>                    
                            </div> 
                            <div class="form-group col-xs-12 col-md-3 formBTn">
                              <button class="btn btn-info col-xs-12" id="save_escuela">Guardar</button>  
                            </div>
                          <br>            
                        </form>
                        <table class="table datatable_simple">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody id="tblPersonal">                                            
                            </tbody>
                        </table>
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