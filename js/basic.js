/* 
* @Author: anchen
* @Date:   2017-03-10 11:08:56
* @Last Modified by:   anchen
* @Last Modified time: 2017-03-10 17:40:25
*/

$(document).ready(function(){
    /*
    //图片上传压缩
    var input = document.getElementById('imgSelect');
    input.onchange = function (){
        if(this.files && this.files[0]){
            lrz(this.files[0], {width: 400}, function (results) {
                // 你需要的数据都在这里，可以以字符串的形式传送base64给服务端转存为图片。
                imgs = results.base64;
                len = results.base64.length;
                $("#target").children('img').attr('src',imgs);
                $("div.preview-container img").attr('src',imgs);
            });
        }
    };*/

    $("#crop_submit").click(function() {
        var crop_image = document.getElementById("crop_canvas").toDataURL("image/png");
        $.ajax({
            url: 'crop.php',
            type: 'POST',
            dataType: 'json',
            data: {crop_image: crop_image},
            success:function(res){

            }
       });
        return false;
    });
});