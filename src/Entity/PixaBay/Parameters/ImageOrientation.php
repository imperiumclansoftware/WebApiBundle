<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Parameters;

use ReflectionClass;
use ICS\WebapiBundle\Entity\ApiParameter;

class ImageOrientation extends ApiParameter
{
    // Search image orientation
    const IMAGE_ORIETATION_ALL = "all";
    const IMAGE_ORIETATION_HORIZONTAL = "horizontal";
    const IMAGE_ORIETATION_VERTICAL = "vertical";

    public static function getBaseParameter()
    {
        return "IMAGE_ORIETATION";
    }

    /**
     * Get Image Type parameters list
     */
    public static function getParametersList(): array
    {
        $result = [];
        $oClass = new ReflectionClass(ImageOrientation::class);
        foreach ($oClass->getConstants() as $key => $cst) {

            $result[$cst] = ucfirst(strtolower(str_replace('IMAGE_ORIENTATION_', '', $key)));
        }

        return $result;
    }
}
