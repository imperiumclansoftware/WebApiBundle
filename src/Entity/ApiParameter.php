<?php

namespace ICS\WebapiBundle\Entity;

use ReflectionClass;

abstract class ApiParameter
{
    public static abstract function getParametersList();
}
