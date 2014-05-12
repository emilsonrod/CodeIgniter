$(document).ready(function() {
    $("#file_upload").fileUpload({
        'uploader': 'uploadify/uploader.swf',
        'cancelImg': 'uploadify/cancel.png',
        'script': 'libs/subirarchivo.php',

        'folder': 'uploads',
        'buttonText': 'Examinar',
        'checkScript': 'uploadify/check.php',
        'fileDesc': 'Archivos',
        'auto':false,
        //Estensiones permitidas para carga de los archivos
        //'fileExt': '*.jpg;*.jpeg;*.gif;*.png;*.xlsx;*.docx;*.html;*.txt;*.pdf;*.zip',
        'fileExt': '*.pdf;',
		
		//Puede ingresar mas de 1 archivo a la vez, false solo 1 archivo
        'multi': true,
        'displayData': 'percentage',
        onComplete: function (){
     verlistadoimagenes();
            $("#txtdes").val('');
        }

       });
   $('#txtdes').bind('change', function(){
	$('#file_upload').fileUploadSettings('scriptData','&des='+$(this).val());


    });

})

function startUpload(id, conditional){
	if(conditional.value.length != 0) {
		$('#'+id).fileUploadStart();
	} else
		alert("Debe ingresar una descripcion");
}