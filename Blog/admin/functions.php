<?php

function createThumb($imageSource, $destImagePath, $width = 100, $height = null)
{
    $sourceImage = imagecreatefromjpeg($imageSource);
    $orgWidth = imagesx($sourceImage);
    $orgHeight = imagesy($sourceImage);
    $thumbHeight = $height ?? floor($orgHeight * ($width / $orgWidth));
    $destImage = imagecreatetruecolor($width, $thumbHeight);
    imagecopyresampled($destImage, $sourceImage, 0, 0, 0, 0, $width, $thumbHeight, $orgWidth, $orgHeight);
    imagejpeg($destImage, $destImagePath);
    imagedestroy($sourceImage);
    imagedestroy($destImage);
}