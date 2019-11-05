<?php

namespace App\Model\Behavior;

use Cake\Filesystem\File;
use Cake\Http\Exception\InternalErrorException;
use Cake\Utility\Text;

/**
 * FileBehavior behavior
 */
class ResizeBot
{
    public $formats = [
        '0' => 'jpg',
        '1' => 'png',
        '2' => 'jpeg'
    ];
    function resizeFlyer($img = null)
    {
        $imgResize = $img;
        $width = 750;
        $heigth = 960;
        $resize_img = "";
        $extension = "";
        $merge_img = "";
        $bg_img = WWW_ROOT . 'img/black.png';
        $this->setData($img, $resize_img, $extension, $merge_img);

        // $src = "/home/gabriel/Documents/WBS/events/practica-tu-free/alfa-j5.jpg";
        // $dst = "/home/gabriel/Documents/WBS/events/practica-tu-free/alfa-j5-resize.jpg";
        // $black = "/home/gabriel/Documents/WBS/events/practica-tu-free/black.png";
        // $merge = "/home/gabriel/Documents/WBS/events/practica-tu-free/alfa-j5-merged.jpg";

        $this->resizeImage($img, $resize_img, $width, $heigth);
        $this->merge($resize_img, $bg_img, $merge_img);
        $this->cleanDir($img, $merge_img, $resize_img);
    }

    public function setData($img, &$resize_img, &$extension, &$merge_img)
    {
        $tmp = explode('.', $img);
        // $filename = reset($tmp);
        $full_name = "";
        foreach ($tmp as $key => $value) {
            if ($key === array_key_last($tmp)) {
                break;
            } else if ($key == array_key_first($tmp)) {
                $full_name = $full_name . $value;
            } else {
                $full_name = $full_name . '.' . $value;
            }
        }
        $extension = end($tmp);
        $resize_img = $full_name . '.tmp.' . $extension;
        $merge_img = $full_name . '.merge.' . $extension;
        $this->validateFormat($extension);
    }

    public function validateFormat($format)
    {
        if (!in_array($format, $this->formats)) {
            echo 'error';
            die();
        }
    }

    function resizeImage($sourceImage, $targetImage, $maxWidth, $maxHeight, $quality = 80)
    {
        // Obtain image from given source file.
        if (!$image = @imagecreatefromjpeg($sourceImage)) {
            return false;
        }

        // Get dimensions of source image.
        list($origWidth, $origHeight) = getimagesize($sourceImage);

        if ($maxWidth == 0) {
            $maxWidth  = $origWidth;
        }

        if ($maxHeight == 0) {
            $maxHeight = $origHeight;
        }

        // Calculate ratio of desired maximum sizes and original sizes.
        $widthRatio = $maxWidth / $origWidth;
        $heightRatio = $maxHeight / $origHeight;

        // Ratio used for calculating new image dimensions.
        $ratio = min($widthRatio, $heightRatio);

        // Calculate new image dimensions.
        $newWidth  = (int) $origWidth  * $ratio;
        $newHeight = (int) $origHeight * $ratio;

        //delete old image.

        // Create final image with new dimensions.
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        imagecopyresampled($newImage, $image, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
        echo ($newImage);
        echo ('<br>');
        echo ($targetImage);
        echo ('<br>');
        echo ($quality);
        imagejpeg($newImage, $targetImage, $quality);

        // Free up the memory.
        imagedestroy($image);
        imagedestroy($newImage);

        return true;
    }

    function merge($filename_x, $filename_y, $filename_result)
    {

        // Get dimensions for specified images

        list($width_x, $height_x) = getimagesize($filename_x);
        list($width_y, $height_y) = getimagesize($filename_y);

        // Create new image with desired dimensions

        $image = imagecreatetruecolor(750, 960);

        $start_w = (750 - $width_x) / 2;
        $start_h = (960 - $height_x) / 2;

        // Load images and then copy to destination image

        $image_x = imagecreatefromjpeg($filename_x);
        $image_y = imagecreatefrompng($filename_y);

        imagecopy($image, $image_x, $start_w, $start_h, 0, 0, $width_x, $height_x);
        //  top, left, border,border
        imagecopy($image, $image_y, 100, 3100, 0, 0, $width_y, $height_y);

        // Save the resulting image to disk (as JPEG)

        imagejpeg($image, $filename_result);

        imagedestroy($image);
        imagedestroy($image_x);
        imagedestroy($image_y);
    }

    public function cleanDir($old, $new, $tmp)
    {
        $tmp_name = $old;
        unlink($old);
        unlink($tmp);
        rename($new, $old);
    }
}
