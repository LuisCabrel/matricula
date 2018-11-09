
$(window).load(function(){

 $(function() {
  $('#file-upload').change(function(e) {
      addImage(e); 
     });

     function addImage(e){
      var file = e.target.files[0],
      imageType = /image.*/;
    
      if (!file.type.match(imageType))
       return;
  
      var reader = new FileReader();
      reader.onload = fileOnload;
      reader.readAsDataURL(file);
     }
  
     function fileOnload(e) {
      var result=e.target.result;
      $("#imgF").val(result);
      $('#imgSalida').attr("src",result);
     }
    });
  });



(function($) {
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
})(jQuery);
