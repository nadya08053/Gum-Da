
function goBack() {
    window.history.back();
}


$(function(){
        $("#allProfile").mousemove(function(){

            if($('#fileCheck').hasClass('ok')) return false;
            var fileInput = document.getElementById("file");
            var files = fileInput.files;

            var accept = ["image/png","image/jpeg","image/gif"];

            if(files.length !== 0){
                for(var i = 0; i < accept.length;i++){
                    if(accept[i] == files[0].type){
                        $('#fileCheck').addClass('ok').html('<b style="color: green;">File format verified</b>');
                        $("form").find('button[type="submit"]').prop("disabled", false);
                        return;
                    }else{
                        $('#fileCheck').addClass('no').html('<b style="color: red;">Uploaded file is not an image</b>');
                        $("form").find('button[type="submit"]').prop("disabled", true);
                    }
                }
            }

        });


});