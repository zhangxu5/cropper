<?php

/**
 * Jcrop image cropping plugin for jQuery
 * Example cropping script
 * @copyright 2008-2009 Kelly Hallman
 * More info: http://deepliquid.com/content/Jcrop_Implementation_Theory.html
 */

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
  $img = $_POST['crop_image'];
  if(empty($img)){
    $return_array = array(
        'code'=>0,
        'msg'=>'失败'
      );
    exit;
  }
  $cut_pic = "/upload/cutpic/".time() . '.jpg';
  if(createDir($_SERVER['DOCUMENT_ROOT']."/upload/cutpic/")){
      createFile($_SERVER['DOCUMENT_ROOT'].$cut_pic,$img);

      $return_array = array(
        'code'=>1,
        'msg'=>'http://'.$_SERVER['SERVER_NAME'].$cut_pic
      );
  }else{
      $return_array = array(
        'code'=>0,
        'msg'=>'失败'
      );
  }
  //unlink($pic);
  echo json_encode($return_array);

	exit;
}

    /*将文件流写入文件
     *@return boolen
     */
   function createFile($filepath,$datas)
    {
       //$imgs = preg_replace('/data:.*;base64,/i', '', $imgs);
        $data = str_replace('data:image/jpeg;base64,', '', $datas); 
        $data = str_replace('data:image/png;base64,', '', $data);
        $data = base64_decode($data);
        //接收flash 发送过来的文件流
        if (!$data)
        {
            echo 'No data!';
            return false;
        }
        if (!$handle = fopen($filepath, 'w+'))
        {
            echo " Can not open file " . $filepath;
            return false;
            exit;
        }

        if (fwrite($handle, $data) === false)
        {
            echo ' Can not write file ' . $filepath;
            fclose($handle);
            return false;
        }
        fclose($handle);

        return true;
    }


    /*linux下创建目录用
    function createDir($Dir)
    {
        if (!is_dir($Dir))
        {
            if (!mkdir($Dir, 0755))
            {
                echo '文件夹路径不能创建，权限不够：' . $Dir;
                return false;
            } else
            {
                return true;
            }
        } else
        {
            return true;
        }
    }*/

    //windows下创建目录用
    function createDir($Dir)
    {
        if (!is_dir($Dir))
        {
            if (!mkdir($Dir, 0777,true))
            {
                echo '文件夹路径不能创建，权限不够：' . $Dir;
                return false;
            } else
            {
                return true;
            }
        } else
        {
            return true;
        }
    }
 ?>