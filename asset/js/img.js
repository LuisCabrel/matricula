
// $(window).load(function(){

//  $(function() {
//   $('#file-upload').change(function(e) {
//       addImage(e); 
//      });

//      function addImage(e){
//       var file = e.target.files[0],
//       imageType = /image.*/;
    
//       if (!file.type.match(imageType))
//        return;
  
//       var reader = new FileReader();
//       reader.onload = fileOnload;
//       reader.readAsDataURL(file);
//      }
  
//      function fileOnload(e) {
//       var result=e.target.result;
//       $("#imgF").val(result);
//       $('#imgSalida').attr("src",result);
//      }
//     });
//   });
/*$(document).ready(function() {
    $('.selectpicker').selectpicker();
});*/
function previewImage(nb) {        
    var reader = new FileReader();         
    reader.readAsDataURL(document.getElementById('foto'+nb).files[0]);         
    reader.onload = function (e) {             
        document.getElementById('imgSalida'+nb).src = e.target.result; 
        $("#imgF"+nb).val(e.target.result);          
    };     
}

/*(function($) {
    $(function() {
       $('#turnos').fSelect({
        placeholder: 'Seleccione Turnos?',
        numDisplayed: 4,
        overflowText: '{n} selected',
        searchText: 'Filter Expertise',
        showSearch: true,
         buttonWidth: '400px'
       });
    });
})(jQuery);*/


/*$('#turnos').change(function(){
  $('#turnos_').val($('#turnos').val());
 });*/
 function checkbox(f, x) {
  console.log(f);
  console.log(x);
 todos = new Array();
 for (var i = 0, total = f[x].length; i < total; i++)
   if (f[x][i].checked) todos[todos.length] = f[x][i].value;
  // return todos.join(".");
  $('#turnos_').val(todos);
}