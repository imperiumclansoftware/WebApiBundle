<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Parameters;

use ReflectionClass;
use ICS\WebapiBundle\Entity\ApiParameter;

/**
 * Vidéos poster picture size
 */
class VideoPosterSize extends ApiParameter
{
    const VIDEO_POSTER_SIZE_100x75 = '100x75';
    const VIDEO_POSTER_SIZE_200x150 = '200x150';
    const VIDEO_POSTER_SIZE_295x166 = '295x166';
    const VIDEO_POSTER_SIZE_640x360 = '640x360';
    const VIDEO_POSTER_SIZE_960x540 = '960x540';
    const VIDEO_POSTER_SIZE_1920x1080 = '1920x1080';

    /**
     * Get Image Type parameters list
     */
    public static function getParametersList(): array
    {
        $result = [];
        $oClass = new ReflectionClass(VideoPosterSize::class);
        foreach ($oClass->getConstants() as $key => $cst) {

            $result[$cst] = ucfirst(strtolower(str_replace('VIDEO_POSTER_SIZE_', '', $key)));
        }

        return $result;
    }
}
