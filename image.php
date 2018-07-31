<?php
    $user_id = ($_GET['u']) ?: null;
    $campaign_id = ($_GET['c']) ?: null;
    $campaign_selection_id = $_GET['s'] ?: null;

    $size = (int)$_GET['t'] ?: 1;
    $img = imagecreatetruecolor($size, $size);

    $image_color = $_GET['rgb'] ?: null;
    if ($image_color !== null) {

        $image_color_red = '0x' . substr($image_color , 0 , 2);
        $image_color_green = '0x' . substr($image_color , 2 , 2);
        $image_color_blue = '0x' . substr($image_color , 4 , 2);

    }
    else {
        $image_color_red = (int)255;
        $image_color_green = (int)255;
        $image_color_blue = (int)255;
    }

    $color = imagecolorallocate( $img , $image_color_red , $image_color_green , $image_color_blue );

    imagefill($img, 0, 0, $color);

    if ($_GET[a]) {
        imagecolortransparent($img, $color);
    } 

    if ((int)$_GET['t']) {
            $ip = getenv("REMOTE_ADDR") ?: "";

            imagestring($img, 1, 1, 1,   "IP: " . $ip, 0xFFFFFF);
            imagestring($img, 1, 1, 10, "R: " . $image_color_red , 0xFFFFFF);
            imagestring($img, 1, 1, 20, "G: " . $image_color_green , 0xFFFFFF);
            imagestring($img, 1, 1, 30, "B: " . $image_color_blue, 0xFFFFFF);
            imagestring($img, 1, 1, 45, "U: " . $user_id, 0xFFFFFF);
            imagestring($img, 1, 1, 55, "C: " . $campaign_id, 0xFFFFFF);
            imagestring($img, 1, 1, 65, "S: " . $campaign_selection_id, 0xFFFFFF);
            
    }

    header("Content-type: image/gif");

    imagegif($img);

    imagedestroy($img);




/*

This section is for doing database calls and pushing data to the database.

*/



?>
