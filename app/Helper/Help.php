<?php

namespace App\Helper;


class Help{


    public static function resizeAndUpload($img,$path){

        if ($img['file']['error'] == false) {

                $extension = pathinfo($img['file']['name'], PATHINFO_EXTENSION);
                $file_name = preg_replace("/./", "", "12345678") . time() . rand(10, 1000) . "." . $extension;

                if (move_uploaded_file($img['file']['tmp_name'], $path . $file_name)) {

                    $source =  $path . $file_name;
                    $dest = $path . $file_name;

                    $size = getimagesize($source);
                    $w = $size[0];
                    $h = $size[1];

                    $nw_max = 76;
                    $nh_max = 76;

                    switch ($extension) {
                        case 'gif':
                            $simg = imagecreatefromgif($source);
                            break;

                        case 'jpg':
                            $simg = imagecreatefromjpeg($source);
                            break;

                        case 'JPG':
                            $simg = imagecreatefromjpeg($source);
                            break;

                        case 'jpeg':
                            $simg = imagecreatefromjpeg($source);
                            break;

                        case 'png':
                            $simg = imagecreatefrompng($source);
                            break;

                        case 'PNG':
                            $simg = imagecreatefrompng($source);
                            break;
                    }

                    $dimg = imagecreatetruecolor($nw_max, $nh_max);
                    imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $nw_max, $nh_max, $w, $h);
                    imagejpeg($dimg, $dest, 100);

                    imagedestroy($simg);
                    //unlink($source);
                }
                    return $file_name;
            }

    }

}
