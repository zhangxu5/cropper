较原版修改之处:
1.crop.php添加对前端裁剪图片的保存，保存目录:/web目录/upload/cutpic/文件名
2.原版插件裁剪后展示了一张画布，需要把画布转为base64，js/basic.js中把裁剪后的画布转为base64发送到后台生成图片
3.上传图片，main.js在190行添加了对图片大于2M的压缩，原版背景图采用的是blob对象，改动后背景图为base64。
4.较原版新引入了lrz.js,exif.js,mobileFix.mini.js,basic.js，前三js是对图片压缩和支持移动端，ie8-不支持