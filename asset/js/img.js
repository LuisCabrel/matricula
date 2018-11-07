/*
function readFile(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            var filePreview = document.createElement('img');
            filePreview.id = 'file-preview';
            //e.target.result contents the base64 data from the image uploaded
            filePreview.src = e.target.result;
            //console.log(e.target.result);

            var previewZone = document.getElementById('file-preview-zone');
            previewZone.appendChild(filePreview);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

var fileUpload = document.getElementById('file-upload');
fileUpload.onchange = function (e) {
    readFile(e.srcElement);

}*/

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
      $('#imgSalida').attr("src",result);
     }
    });
  });

// $(document).ready(function() {       
//     $('#turnos').multiselect({       
//         // nonSelectedText: 'Select Teams'             
//     });

// }); 

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
