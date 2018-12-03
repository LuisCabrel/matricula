$(document).ready(function() {
	tbl_escuela();
    tbl_espec();
    tbl_forma(); 
    tbl_estado();   

});
// document.write("<script type='text/javascript' src='"+path+"asset/js/funciones_generales.js'></script>");

$(document).on('click','#save_escuela',function(e){
	 e.preventDefault();
	 var form= $("#formRegEsc").serialize();
	 var formData=new FormData($("#formRegEsc")[0]);
	 $.ajax({
	 	type: "POST",
        url: path+"mantenimiento/registrar_escuela", 
        data:formData,
        dataType: "json",
        crossDomain:true,
		cache:false,
		contentType:false,
		processData:false, 
        success: function(data) {
        	
        	if(data['msg']===false){
        		$.each(data, function(key, value) {
		            if(value!=""){
		            	$('#'+key).addClass('has-error'); 
	            	}else{
	            		$('#'+key).removeClass('has-error').addClass('');
	            	} 
		        });
        	}else{
        		if(data['msg']===1){
        			tbl_escuela();
        			$("#formRegEsc")[0].reset();
        			$("#emailOK").html("");
        			document.getElementById('imgSalida1').src = "#";
        			$("#imgF1").val("");
                    $('input:checkbox').each(function() { this.checked = false; });
                    cargarDepartamentos();
                    $("#provincia")[0].selectedIndex = -1;
                    $("#distrito")[0].selectedIndex = -1;
                    $("#status").val("");
                    $("#id_escuela").val("");
                     $('.formBTn').html('<button class="btn btn-info col-xs-12" id="save_escuela">Guadar</button>');        			

                    $("#loading").hide();
                    $("#ico").html(ico_ok);
                    $("#ico").show();
                    $("#msg1").html(data['resp']);
                    $("#btn_modal").html(btn_cerrar);
                    $("#alertas").modal('show');
        		}else{
        			//alert(data['resp']);
                    $("#status").val("");
                    $("#id_escuela").val("");
                    $("#loading").hide();
                    $("#ico").html(ico_warning);
                    $("#ico").show();
                    $("#msg1").html(data['resp']);
                    $("#btn_modal").html(btn_cerrar);
                    $("#alertas").modal('show');
        		}
        		
        	}
	        
	    }
	 });
});

$('#formRegEsc input').on('keyup', function () { 
        $(this).removeClass('has-error').addClass('');
         $(this).parents('.form-group').removeClass('has-error').addClass('');
    });

function tbl_escuela(){
	$.ajax({
		url: 'lista_escuela',
		dataType: "json",
	    success: function(resp){
	    	var html="";
            var funcion="'deleteData'";
            var destinoURL="'delete_school'";
            var tabla="'tbl_escuela()'";
	    	var item=resp.datos.length;
	    	for(var x=0;x<resp.datos.length;x++){
	    		 html+='<tr>'+
		                '<td><div class="row"><center>'+
        	   				'<i class="fa fa-pencil-square btn-tabla-edit" onclick="edit_school('+resp.datos[x]['id']+')"></i>'+
        	   				'<i class="fa fa-times-rectangle btn-tabla-delete" onclick="msgDelete('+resp.datos[x]['id']+","+funcion+","+destinoURL+","+tabla+')"></i></center></div>'+
        	   			'</td>'+
		                '<td><span id="foto'+resp.datos[x]['id']+'"><img id="img'+resp.datos[x]['id']+'" width="30" height="30" src="'+path+'uploads/colegio/'+resp.datos[x]['foto']+'" /></span></td>'+
		                '<td><span id="nombre'+resp.datos[x]['id']+'">'+resp.datos[x]['nombre']+'</span></td>'+
		                '<td><span id="ruc'+resp.datos[x]['id']+'">'+resp.datos[x]['ruc']+'</span></td>'+
		                '<td><span id="direccion'+resp.datos[x]['id']+'">'+resp.datos[x]['direccion']+'</span></td>'+
		                '<td><span id="telefono'+resp.datos[x]['id']+'">'+resp.datos[x]['telefono']+'</span></td>'+
		                '<td><span id="email'+resp.datos[x]['id']+'">'+resp.datos[x]['email']+'</span></td>'+
		                '<td><span id="zona'+resp.datos[x]['id']+'">'+resp.datos[x]['zona']+'</span></td>'+
		                '<td><span id="turnos'+resp.datos[x]['id']+'">'+resp.datos[x]['turnos']+'</span></td>'+
		                '<td><span id="creacion'+resp.datos[x]['id']+'">'+resp.datos[x]['creacion']+'</span></td>'+
		                '<td><span>'+resp.datos[x]['nomDepa']+'</span><label id="departamento'+resp.datos[x]['id']+'" style="display:none">'+resp.datos[x]['departamento']+'</label></td>'+
		                '<td><span>'+resp.datos[x]['nomProv']+'</span><label id="provincia'+resp.datos[x]['id']+'" style="display:none">'+resp.datos[x]['provincia']+'</label></td>'+
		                '<td><span>'+resp.datos[x]['nomDist']+'</span><label id="distrito'+resp.datos[x]['id']+'" style="display:none">'+resp.datos[x]['distrito']+'</label></td>'+
		              	'</tr>';
	    	}
	    	$("#tbl_escuela").html(html);	    	
	    }
	})
}


function msgDelete(id,funcion,destinoURL,tabla){
	
    $("#btn_modal").html(btn_delete1+funcion+"("+id+",'"+destinoURL+"','"+tabla+"')"+btn_delete2+" "+btn_cerrar);
	$("#ico").html(ico_elimina);
	 $("#loading").hide();
	$("#msg1").html(msg_delete);
	$("#alertas").modal('show');
}


function deleteData(id,destinoURL,tabla) {
	var string ="id="+id;
    console.log(id);
    console.log(destinoURL);
    console.log(tabla);	

	$.ajax({
        url:destinoURL,
		type:'POST',
		data:string,
		beforeSend: function () {
			 $("#ico").hide();
			 $("#loading_bg").html(loading);
			 $("#msg1").html(msg_eliminando);
		     $("#loading").show();
		        },
		success: function(resp){
        	var x = JSON.parse(resp);
                eval(tabla);
                $("#loading").hide();
        		$("#ico").html(ico_ok);
        		$("#ico").show();
				$("#msg1").html(x.msg);
				$("#btn_modal").html(btn_cerrar);
	            $("#alertas").modal('show');	
        }
	});
}

function edit_school(id){
    var foto=document.getElementById('img'+id).src;
    var zona=$("#zona"+id).text();
    var iddep = $("#departamento"+id).text();
    var idprov = $("#provincia"+id).text();
    var iddist = $("#distrito"+id).text();
    var turnos=$("#turnos"+id).text();

    document.getElementById('imgSalida1').src =foto;
    $("#nom_escuela").val($("#nombre"+id).text());
    $("#ruc").val($("#ruc"+id).text());
    $("#direccion").val($("#direccion"+id).text());
    $("#telefonos").val($("#telefono"+id).text());
    $("#correo").val($("#email"+id).text());
    $("#creacion").val($("#creacion"+id).text());
    $("#status").val("edit");
    $("#id_escuela").val(id);

    var res = foto.replace(path+"uploads/colegio/", "");
    var d,p,di;
    $.ajax({
        url: 'seleccion',
        type: 'POST',
        data: {'id_dep': 0,'sec':'dep'},
        dataType: "json",
        success: function(resp){           
                var dep="";   
                for(var x=0;x<resp.departamento.length;x++){ 
                    if (iddep==resp.departamento[x]['idDepa']) {$key="selected";}else{$key="";}                
                    d+='<option value="'+resp.departamento[x]['idDepa']+'" '+$key+'>'+resp.departamento[x]['departamento']+'</option>';               
                }
                $("#departamento").html(d);             
             }
    });

    $.ajax({
        url: 'seleccion',
        type: 'POST',
        data: {'id_dep': iddep,'sec':'pro'},
        dataType: "json",
        success: function(resp){           
                var dep="";   
                for(var x=0;x<resp.provincia.length;x++){ 
                    if (idprov==resp.provincia[x]['idProv']) {$key="selected";}else{$key="";}                
                    p+='<option value="'+resp.provincia[x]['idProv']+'" '+$key+'>'+resp.provincia[x]['provincia']+'</option>';               
                }
                $("#provincia").html(p);             
             }
    });

    $.ajax({
        url: 'seleccion',
        type: 'POST',
        data: {'id_pro': idprov,'sec':'dis'},
        dataType: "json",
        success: function(resp){           
                var dep="";   
                for(var x=0;x<resp.distrito.length;x++){ 
                    if (iddist==resp.distrito[x]['idDist']) {$key="selected";}else{$key="";}                
                    di+='<option value="'+resp.distrito[x]['idDist']+'" '+$key+'>'+resp.distrito[x]['distrito']+'</option>';               
                }
                $("#distrito").html(di);             
             }
    });

    $.ajax({
            url:'seleccion',
            type: 'POST',        
            dataType: "json",        
            success: function(resp){         
                var sel="";   
                for(var x=0;x<resp.zona.length;x++){  
                    if (zona==resp.zona[x]['zona']) {$key="selected";}else{$key="";}             
                    sel+='<option value="'+resp.zona[x]['zona']+'" '+$key+'>'+resp.zona[x]['zona']+'</option>';               
                }
                $("#zona").html(select+sel);             
             }
        });

    $.ajax({
            url:'seleccion',
            type: 'POST',        
            dataType: "json",        
            success: function(resp){         
                var sel="";            
                var nt = turnos.split(",");           
               var t0,t1,t2;
               t1="Día";
               t2="Tarde";
               t3="Noche";
               if(nt[0]===t1 || nt[1]===t1 || nt[2]===t1){var nombreT1=t1;}else{var nombreT1="";}
               if(nt[0]===t2 || nt[1]===t2 || nt[2]===t2){var nombreT2=t2;}else{var nombreT2="";}
               if(nt[0]===t3 || nt[1]===t3 || nt[2]===t3){var nombreT3=t3;}else{var nombreT3="";}
               var tx=[];
               tx[0]=""+nombreT1+"";
               tx[1]=""+nombreT2+"";
               tx[2]=""+nombreT3+"";
               
                var alrt="checkbox(this.form, 'turnos[]')";
                for(var x=0;x<resp.turno.length;x++){              
                    if (tx[x]==resp.turno[x]['turnos']) {$key="checked";}else{$key="";}             
                        sel+='<div class="checkbox che1 checkbox-success checkbox-inline">';
                        sel+='<input type="checkbox" class="styled" id="turnos" name="turnos[]" onclick="'+alrt+'" value="'+resp.turno[x]['turnos']+'" '+$key+'>';
                        sel+='<label for="">'+resp.turno[x]['turnos']+'</label></div> ';                
                }
                $("#turnox").html(sel); 
                $("#turnos_").val(turnos);            
             }
        });
    $('.formBTn').html('<div class="col-xs-6"><button class="btn btn-default col-xs-12" id="cancelar_escuela">Cancelar</button></div><div class="col-xs-6"><button class="btn btn-warning col-xs-12" id="save_escuela">Modificar</button></div>');

}

function limpiarformRegEsc(){
   $("#formRegEsc")[0].reset();
}


$(document).on('click','#cancelar_escuela',function(e){
    e.preventDefault();
    $("#formRegEsc")[0].reset();
     $("#status").val("");
    $("#id_escuela").val("");
    document.getElementById('imgSalida1').src ="";
    $('input:checkbox').each(function() { this.checked = false; });
    $("#nom_escuela").val("");
    $("#ruc").val("");
    $("#direccion").val("");
    $("#telefonos").val("");
    $("#correo").val("");
    $("#creacion").val("");
    cargarZona();
    cargarTurno();
    cargarDepartamentos();
    $("#provincia")[0].selectedIndex = -1;
    $("#distrito")[0].selectedIndex = -1;
    
    $('.formBTn').html('<button class="btn btn-info col-xs-12" id="save_escuela">Guadar</button>');
});

function tbl_espec(){
    $.ajax({
        url: 'lista_especialidad',
        dataType: "json",
        success: function(resp){
            var html="";
                for(var x=0;x<resp.datos.length;x++){    
                
                 html+='<tr>'+
                        '<td><span id="especialidad'+resp.datos[x]['id']+'">'+resp.datos[x]['nombre']+'</span></td>'+
                        '<td><div class="row"><center>'+
                            '<i class="fa fa-pencil-square btn-tabla-edit" onclick="editConfig('+resp.datos[x]['id']+",'especialidad'"+",'formEspec'"+",'save_select'"+",'tbl_espec()'"+')"></i>'+
                            '<i class="fa fa-times-rectangle btn-tabla-delete" onclick="msgDelete('+resp.datos[x]['id']+",'deleteData'"+",'deletEspec'"+",'tbl_espec()'"+')"></i></center></div>'+
                        '</td>'+                       
                        '</tr>';                
                }
                $("#tblEspecialidad").html(html);             
        }
    })
}
function tbl_forma(){
    $.ajax({
        url: 'lista_formacion',
        dataType: "json",
        success: function(resp){
            var html="";
                for(var x=0;x<resp.datos.length;x++){    
                
                 html+='<tr>'+
                        '<td><span id="formacion'+resp.datos[x]['id']+'">'+resp.datos[x]['nombre']+'</span></td>'+
                        '<td><div class="row"><center>'+
                            '<i class="fa fa-pencil-square btn-tabla-edit" onclick="editConfig('+resp.datos[x]['id']+",'formacion'"+",'formForma'"+",'save_select'"+",'tbl_forma()'"+')"></i>'+
                            '<i class="fa fa-times-rectangle btn-tabla-delete" onclick="msgDelete('+resp.datos[x]['id']+",'deleteData'"+",'deletForma'"+",'tbl_forma()'"+')"></i></center></div>'+
                        '</td>'+                       
                        '</tr>';                
                }
                $("#tblForma").html(html);             
        }
    })
}
function tbl_estado(){
    $.ajax({
        url: 'lista_estado',
        dataType: "json",
        success: function(resp){
            var html="";
                for(var x=0;x<resp.datos.length;x++){    
                
                 html+='<tr>'+
                        '<td><span id="estado'+resp.datos[x]['id']+'">'+resp.datos[x]['nombre']+'</span></td>'+
                        '<td><div class="row"><center>'+
                            '<i class="fa fa-pencil-square btn-tabla-edit" onclick="editConfig('+resp.datos[x]['id']+",'estado'"+",'formEsta'"+",'save_select'"+",'tbl_estado()'"+')"></i>'+
                            '<i class="fa fa-times-rectangle btn-tabla-delete" onclick="msgDelete('+resp.datos[x]['id']+",'deleteData'"+",'deletEstado'"+",'tbl_estado()'"+')"></i></center></div>'+
                        '</td>'+                       
                        '</tr>';                
                }
                $("#tblEstado").html(html);             
        }
    })
}

function guardarConfiguracion(form,input,destUrl,tabla){
    /*$(document).on( "click", "#btnsaveEspec", function(e) {
    e.preventDefault();*/  
    if($('#'+input).val()==""){
        $('#'+form).addClass('has-error'); 
    }
    //var string = $("#"+form).serialize(); console.log(string);
    var string = {
                "id" : $('#id').val(),
                "value" : $('#'+input).val(),                
                "status" : $('#status').val(),
                "input" : input
        };
        
    $.ajax({
        url:destUrl,
        type:'POST',
        data:string,
        beforeSend:function(){
            $(".loading_bg").html(loading);
            $("#loading").show();
            $("#alertas").show();
        },
        success: function(resp){
            var x = JSON.parse(resp);
                 if(x.resp=='true'){
                    $("#"+form)[0].reset();
                    $("#status").val("save");
                    $("#btn"+input).html('<button type="button" class="btn btn-primary" onclick="guardarConfiguracion('+"'"+form+"','"+input+"','"+destUrl+"','"+tabla+"'"+')"><i class="fa fa-save"></i></button>');
                    $("#id").val("");
                    $(".loading_bg").html("");
                    $("#loading").hide();
                    $("#ico").html(ico_ok);
                    $("#ico").show();
                    $("#msg1").html(x.msg);
                    $("#btn_modal").html(btn_cerrar);
                    $("#alertas").modal('show');
                    eval(tabla);
                 }else{
                    $("#"+form)[0].reset();
                    $("#status").val("save");
                    $("#id").val("");
                    $("#btn"+input).html('<button type="button" class="btn btn-primary" onclick="guardarConfiguracion('+"'"+form+"','"+input+"','"+destUrl+"','"+tabla+"'"+')"><i class="fa fa-save"></i></button>');
                    $(".loading_bg").html("");
                    $("#loading").hide();
                    $("#ico").html(ico_warning);
                    $("#ico").show();
                    $("#msg1").html(x.msg);
                    $("#btn_modal").html(btn_cerrar);
                    $("#alertas").modal('show');
                 }
        }

    });
    /*if($('#especialidad').val()==""){
        $('#formEspec').addClass('has-error'); 
        }
        var string = $("#formEspec").serialize(); 
        $.ajax({
            url:'save_especialidad',
            type:'POST',
            data:string,
            beforeSend:function(){
                $(".loading_bg").html(loading);
                $("#loading").show();
                $("#alertas").show();
            },
            success: function(resp){
                var x = JSON.parse(resp);
                     if(x.resp=='true'){
                        $("#formEspec")[0].reset();
                        $(".loading_bg").html("");
                        $("#loading").hide();
                        $("#ico").html(ico_ok);
                        $("#ico").show();
                        $("#msg1").html(x.msg);
                        $("#btn_modal").html(btn_cerrar);
                        $("#alertas").modal('show');
                        tbl_espec();
                     }else{
                        $("#formEspec")[0].reset();
                        $(".loading_bg").html("");
                        $("#loading").hide();
                        $("#ico").html(ico_warning);
                        $("#ico").show();
                        $("#msg1").html(x.msg);
                        $("#btn_modal").html(btn_cerrar);
                        $("#alertas").modal('show');
                     }
            }
        })  */

    // });
}
function editConfig(id,input,form,destUrl,tabla){
   
    $("#status").val("edit");
    $("#id").val(id);
    $("#"+input).val($("#"+input+""+id).text());
    $("#btn"+input).html('<button type="button" class="btn btn-success" onclick="guardarConfiguracion('+"'"+form+"','"+input+"','"+destUrl+"','"+tabla+"'"+')"><i class="fa fa-save"></i></button>'
        +'<button type="button" class="btn btn-warning" onclick="btnCancelarP('+"'"+form+"','"+input+"','"+destUrl+"','"+tabla+"'"+')"><i class="fa fa-reply"></i></button>');
    
}
function btnCancelarP(form,input,destUrl,tabla){
    $("#"+form)[0].reset();
    $("#status").val("save");
    $("#id").val("");
    $("#btn"+input).html('<button type="button" class="btn btn-primary" onclick="guardarConfiguracion('+"'"+form+"','"+input+"','"+destUrl+"','"+tabla+"'"+')"><i class="fa fa-save"></i></button>');
}




// $('#tbl_escuela').on('click','td',function( e, settings, data ){
//     // celdaP = tbl_escuela.cell(this).data(); 
//      console.log("celda: "+e);
//      console.log("celda: "+settings);
//      console.log("celda: "+data);
// });
