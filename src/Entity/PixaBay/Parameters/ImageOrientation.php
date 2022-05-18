<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Parameters;

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
}
