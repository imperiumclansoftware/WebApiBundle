<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Parameters;

use ICS\WebapiBundle\Entity\ApiParameter;
use ReflectionClass;

class ImageType extends ApiParameter
{
    // Search image type
    const IMAGE_TYPE_ALL = "all";
    const IMAGE_TYPE_PHOTO = "photo";
    const IMAGE_TYPE_ILLUSTRATION = "illustration";
    const IMAGE_TYPE_VECTOR = "vector";

    /**
     * Get Image Type parameters list
     */
    public static function getParametersList(): array
    {
        $result = [];
        $oClass = new ReflectionClass(ImageType::class);
        dump($oClass);
        foreach ($oClass->getConstants() as $key => $cst) {

            $result[$cst] = ucfirst(strtolower(str_replace('IMAGE_TYPE_', '', $key)));
        }

        return $result;
    }
}
