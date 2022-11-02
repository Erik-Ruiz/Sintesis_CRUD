<?php
function GenerateThumbnail($im_filename,$th_filename,$max_width,$max_height,$quality = 1){
    // The original image must exist
    if(is_file($im_filename))
    {
        // Let's create the directory if needed
        
        // If the thumb does not aleady exists
        
        
            // Get Image size info
            list($width_orig, $height_orig, $image_type) = @getimagesize($im_filename);
            if(!$width_orig)
                return 2;
            switch($image_type)
            {
                case 1: $src_im = @imagecreatefromgif($im_filename);    break;
                case 2: $src_im = @imagecreatefromjpeg($im_filename);   break;
                case 3: $src_im = @imagecreatefrompng($im_filename);    break;
            }
            if(!$src_im)
                return 3;

            

            $width  = $max_width;
            $height = $max_height;

            $dst_img = @imagecreatetruecolor($width, $height);
            if(!$dst_img)
                return 4;
            $success = @imagecopyresampled($dst_img,$src_im,0,0,0,0,$width,$height,$width_orig,$height_orig);
            if(!$success)
                return 4;
            switch ($image_type) 
            {
                case 1: $success = @imagegif($dst_img,$th_filename); break;
                case 2: $success = @imagejpeg($dst_img,$th_filename,intval($quality*100));  break;
                case 3: $success = @imagepng($dst_img,$th_filename,intval($quality*9)); break;
            }
            if(!$success)
                return 4;
        
        
    }
    return 1;
}