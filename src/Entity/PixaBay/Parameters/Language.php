<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Parameters;

use ReflectionClass;
use ICS\WebapiBundle\Entity\ApiParameter;

class Language extends ApiParameter
{
    // Search language
    const LANGUAGE_cs = 'cs';
    const LANGUAGE_da = 'da';
    const LANGUAGE_DEUTCH = 'de';
    const LANGUAGE_ENGLISH = 'en';
    const LANGUAGE_SPANISH = 'es';
    const LANGUAGE_FRENCH = 'fr';
    const LANGUAGE_id = 'id';
    const LANGUAGE_ITALIAN = 'it';
    const LANGUAGE_HUNGARIAN = 'hu';
    const LANGUAGE_nl = 'nl';
    const LANGUAGE_no = 'no';
    const LANGUAGE_pl = 'pl';
    const LANGUAGE_pt = 'pt';
    const LANGUAGE_ro = 'ro';
    const LANGUAGE_sk = 'sk';
    const LANGUAGE_fi = 'fi';
    const LANGUAGE_sv = 'sv';
    const LANGUAGE_tr = 'tr';
    const LANGUAGE_vi = 'vi';
    const LANGUAGE_th = 'th';
    const LANGUAGE_bg = 'bg';
    const LANGUAGE_RUSSIAN = 'ru';
    const LANGUAGE_el = 'el';
    const LANGUAGE_JAPANASE = 'ja';
    const LANGUAGE_ko = 'ko';
    const LANGUAGE_zh  = 'zh';

    /**
     * Get Image Type parameters list
     */
    public static function getParametersList(): array
    {
        $result = [];
        $oClass = new ReflectionClass(Language::class);
        foreach ($oClass->getConstants() as $key => $cst) {

            $result[$cst] = ucfirst(strtolower(str_replace('LANGUAGE_', '', $key)));
        }

        return $result;
    }
}
