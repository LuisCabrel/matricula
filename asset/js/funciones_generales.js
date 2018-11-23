jQuery(document).ready(function() {	
	cargarDepartamentos();
	cargarZona();
	 cargarTurno();
	$('#departamento').change(cargarProvincias);
	$('#provincia').change(cargarDistritos);
});

var btn_cerrar_='<button type="button" class="btn btn-danger col-md-6" data-dismiss="modal" aria-label="Close">Cerrar</button>';
var btn_cerrar='<button type="button" class="btn btn-info col-md-6" data-dismiss="modal" aria-label="Close" style="margin:2px;">Cerrar</button>';
var btn_delete1='<button type="button" class="btn btn-danger col-md-6"onclick="';
var btn_delete2='" style="margin:2px;">Eliminar</button>';
var ico_elimina='<span class="glyphicon glyphicon-trash" aria-hidden="true" style="font-size:30px;align-content: center;color: #ac2925"></span>';
var ico_ok='<span class="glyphicon glyphicon-ok-circle" aria-hidden="true" style="font-size:30px;align-content: center;color: #4cae4c"></span>';
var ico_warning='<span class="glyphicon glyphicon-warning-sign" aria-hidden="true" style="font-size:30px;align-content: center;color: #ec971f"></span>';
var msg_delete='Desea Eliminar Datos';
var msg_eliminando='Elimininando Datos';
var loading='<div align="center"><img src="'+path+'asset/img/loaders/loading.gif" width="40px;" height="40px;" /></div> ';
var select='<option value="">Seleccione...</option>';

function cargarDepartamentos() {
	$.ajax({
        url: path +'mantenimiento/seleccion',
        type: 'POST',
        data: {'id_dep': 0,'sec':'dep'},
        dataType: "json",        
        success: function(resp){           
            var dep="";   
            for(var x=0;x<resp.departamento.length;x++){               
                dep+='<option value="'+resp.departamento[x]['idDepa']+'">'+resp.departamento[x]['departamento']+'</option>';               
            }
            $("#departamento").html(dep);             
         }
    });
}
function cargarProvincias () {
	var cd = $('#departamento').val();
	 $.ajax({
        url: path +'mantenimiento/seleccion',
        type: 'POST',
        data: {'id_dep': cd,'sec':'pro'},
        dataType: "json",        
        success: function(resp){
        	console.log(resp.provincia); 
        	console.log(resp.provincia.length);            
            var s3="";   
            for(var x=0;x<resp.provincia.length;x++){
                s3+='<option value="'+resp.provincia[x]['idProv']+'">'+resp.provincia[x]['provincia']+'</option>';               
            }
            $("#provincia").html(s3);     
         }
    });
}

function cargarDistritos () {
	var cp = $('#provincia').val();
	$.ajax({
        url: path +'mantenimiento/seleccion',
        type: 'POST',
        data: {'id_pro': cp,'sec':'dis'},
        dataType: "json",        
        success: function(resp){           
            var s3="";   
            for(var x=0;x<resp.distrito.length;x++){
                s3+='<option value="'+resp.distrito[x]['idDist']+'">'+resp.distrito[x]['distrito']+'</option>';               
            }
            $("#distrito").html(s3); 
         }
    });
}
function cargarZona() {
	$.ajax({
        url: path +'mantenimiento/seleccion',
        type: 'POST',        
        dataType: "json",        
        success: function(resp){         
            var sel="";   
            for(var x=0;x<resp.zona.length;x++){               
                sel+='<option value="'+resp.zona[x]['zona']+'">'+resp.zona[x]['zona']+'</option>';               
            }
            $("#zona").html(select+sel);             
         }
    });
}
function cargarTurno() {
	$.ajax({
        url: path +'mantenimiento/seleccion',
        type: 'POST',        
        dataType: "json",        
        success: function(resp){   console.log(resp.turno.length);        
            var sel="";
            var alrt="checkbox(this.form,'turnos[]')";   
            for(var x=0;x<resp.turno.length;x++){ 
            // <div class="checkbox che1 checkbox-success checkbox-inline">
            //                                   <input type="checkbox" class="styled" id="turnos" name="turnos[]" onclick="checkbox(this.form, 'turnos[]')" value="Dia">
            //                                   <label for=""> Dia </label>
            //  
             //                            </div>  
            sel+='<div class="checkbox che1 checkbox-success checkbox-inline">';
            sel+='<input type="checkbox" class="styled" id="turnos" name="turnos[]" onclick="'+alrt+'" value="'+resp.turno[x]['turnos']+'">';
            sel+='<label for="">'+resp.turno[x]['turnos']+'</label></div> ';            
                // sel+='<option value="'+resp.turno[x]['turnos']+'">'+resp.turno[x]['turnos']+'</option>';               
            }
            $("#turnox").html(sel);             
         }
    });
}
$(".numeric").keydown(function(event) {
	   if(event.shiftKey)
	   {
	        event.preventDefault();
	   }

	   if (event.keyCode == 46 || event.keyCode == 8)    {
	   }
	   else {
	        if (event.keyCode < 95) {
	          if (event.keyCode < 48 || event.keyCode > 57) {
	                event.preventDefault();
	          }
	        } 
	        else {
	              if (event.keyCode < 96 || event.keyCode > 105) {
	                  event.preventDefault();
	              }
	        }
	      }
	   });

function valemail(){
	campo=document.getElementById('correo');
	valido = document.getElementById('emailOK');
	var reg = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	var regOficial = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/;

	if (reg.test(campo.value) && regOficial.test(campo.value)) {
      $("#emailOK").html("<span class='glyphicon glyphicon-ok  form-control-feedback' style='color:#3c763d;'></span>");
    } else if (reg.test(campo.value)) {
      $("#emailOK").html("<span class='glyphicon glyphicon-ok form-control-feedback'style='color:#3c763d;'></span>");

    } else {
      $("#emailOK").html("<span class='glyphicon glyphicon-warning-sign form-control-feedback' style='color:#d9534f;'></span>");
	}
}
		