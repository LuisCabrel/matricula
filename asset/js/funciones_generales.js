jQuery(document).ready(function() {
	cargarProvincias();
	$('#departamento').change(cargarProvincias);
	$('#provincia').change(cargarDistritos);
});
var btn_cerrar_='<button type="button" class="btn btn-danger col-md-6" data-dismiss="modal" aria-label="Close">Cerrar</button>';
var btn_cerrar='<button type="button" class="btn btn-info col-md-6" data-dismiss="modal" aria-label="Close" style="margin:2px;">Cerrar</button>';
var btn_delete1='<button type="button" class="btn btn-danger col-md-6"onclick="';
var btn_delete2='" style="margin:2px;">Eliminar</button>';
var ico_elimina='<span class="glyphicon glyphicon-trash" aria-hidden="true" style="font-size:30px;align-content: center;color: #ac2925"></span>';
var ico_ok='<span class="glyphicon glyphicon-ok-circle" aria-hidden="true" style="font-size:30px;align-content: center;color: #4cae4c"></span>';
var msg_delete='Desea Eliminar Datos';
var loading='<img src="'+path+'asset/img/loaders/loading.gif" width="40px;" height="40px;" />';

function cargarProvincias () {
	var cd = $('#departamento').val();

	$.get(path + 'ubigeo/prov', {'id' : cd}, function(resp) {
		$('#provincia').empty().html(resp);
		cargarDistritos();
	});
}
function cargarDistritos () {
	var cp = $('#provincia').val();

	$.get(path + 'ubigeo/dist', {'id' : cp}, function(resp) {
		$('#distrito').empty().html(resp);				
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
		