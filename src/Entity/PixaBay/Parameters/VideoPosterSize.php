<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Parameters;

use ICS\WebapiBundle\Entity\ApiParameter;

/**
 * Vidéos poster picture size
 */
class VideoPosterSize extends ApiParameter
{
    const VIDEO_PICTURE_SIZE_100x75 = '100x75';
    const VIDEO_PICTURE_SIZE_200x150 = '200x150';
    const VIDEO_PICTURE_SIZE_295x166 = '295x166';
    const VIDEO_PICTURE_SIZE_640x360 = '640x360';
    const VIDEO_PICTURE_SIZE_960x540 = '960x540';
    const VIDEO_PICTURE_SIZE_1920x1080 = '1920x1080';

    public static function getBaseParameter()
    {
        return "VIDEO_PICTURE_SIZE";
    }
}
