<!--Adding copyright text to an image---------------------->
<?php 
    $gfx = imagecreatefromjpeg('https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&w=1000&q=80');

    $width = imagesx($gfx);
    $height = imagesy($gfx);

    $statement = 'Copyright -test';
    $font = 'arial';

    foreach (range(11,1) as $fontsize){
        $box = imagettfbbox($fontsize, 0, $font, $statement);
        $fontw = abs($box[4] - $box[0]);

        if($fontw + 4 <= $width){
            break;
        }
    }

    $fonth = abs($box[5] - $box[1]);
    $basel = $box[1];

    $black = imagecolorallocate($gfx, 0, 0, 0);
    $white = imagecolorallocate($gfx, 255, 255, 255);

    imagefilledrectangle($gfx,  
                        $width - $fullw - 4,
                        $height - $fonth - 4,
                        $width,
                        $height,
                        $black);

    imagettftext($gfx, 
                $fontsize,
                0,
                $width - $fullw - 2,
                $height - $basel - 2,
                $white, 
                $font,
                $statement);

    header('Content-type: image/png');

    imagepng($gfx);
?>