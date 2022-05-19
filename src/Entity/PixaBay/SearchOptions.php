<?php

namespace ICS\WebapiBundle\Entity\PixaBay;

use Symfony\Component\PropertyAccess\PropertyAccess;
use ReflectionClass;
use ICS\WebapiBundle\Entity\PixaBay\Parameters\Language;
use ICS\WebapiBundle\Entity\PixaBay\Parameters\ImageType;
use ICS\WebapiBundle\Entity\PixaBay\Parameters\ImageOrientation;

class SearchOptions
{
    /**
     * @var string
     */
    protected $key;
    /**
     * Search Query
     *
     * @var string
     */
    protected $q;
    /**
     * @var string
     */
    protected $lang = Language::LANGUAGE_ENGLISH;
    /**
     * @var string
     */
    protected $image_type = ImageType::IMAGE_TYPE_ALL;
    /**
     * @var string
     */
    protected $orientation = ImageOrientation::IMAGE_ORIETATION_ALL;
    /**
     * @var string
     */
    protected $category;
    /**
     * @var string
     */
    protected $min_width = 0;
    /**
     * @var string
     */
    protected $min_height = 0;
    /**
     * @var string
     */
    protected $colors;
    /**
     * @var string
     */
    protected $editors_choice = false;
    /**
     * @var bool
     */
    protected $safesearch = false;
    /**
     * @var string
     */
    protected $order;
    /**
     * @var int
     */
    protected $page = 1;
    /**
     * @var int
     */
    protected $per_page = 12;
    /**
     * @var bool
     */
    protected $pretty = false;

    public function __construct(string $apiKey)
    {
        $this->key = $apiKey;
    }

    function getLang()
    {
        return $this->lang;
    }

    function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    function getImage_type()
    {
        return $this->image_type;
    }

    function setImage_type($image_type)
    {
        $this->image_type = $image_type;
        return $this;
    }

    function getOrientation()
    {
        return $this->orientation;
    }

    function setOrientation($orientation)
    {
        $this->orientation = $orientation;
        return $this;
    }

    function getCategory()
    {
        return $this->category;
    }

    function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    function getMin_width()
    {
        return $this->min_width;
    }

    function setMin_width($min_width)
    {
        $this->min_width = $min_width;
        return $this;
    }

    function getMin_height()
    {
        return $this->min_height;
    }

    function setMin_height($min_height)
    {
        $this->min_height = $min_height;
        return $this;
    }

    function getColors()
    {
        return $this->colors;
    }

    function setColors($colors)
    {
        $this->colors = $colors;
        return $this;
    }

    function getEditors_choice()
    {
        return $this->editors_choice;
    }

    function setEditors_choice($editors_choice)
    {
        $this->editors_choice = $editors_choice;
        return $this;
    }

    function getSafesearch()
    {
        return $this->safesearch;
    }

    function setSafesearch($safesearch)
    {
        $this->safesearch = $safesearch;
        return $this;
    }

    function getOrder()
    {
        return $this->order;
    }

    function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    function getPage()
    {
        return $this->page;
    }

    function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    function getPer_page()
    {
        return $this->per_page;
    }

    function setPer_page($per_page)
    {
        $this->per_page = $per_page;
        return $this;
    }

    function getPretty()
    {
        return $this->pretty;
    }

    function setPretty($pretty)
    {
        $this->pretty = $pretty;
        return $this;
    }

    function __toString()
    {
        $finalUrlString = "";
        $oClass = new ReflectionClass(__CLASS__);
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->disableExceptionOnInvalidPropertyPath()
            ->getPropertyAccessor();
        foreach ($oClass->getProperties() as $property) {
            $finalUrlString .= $property->name . '=' . $propertyAccessor->getValue($this, $property->name) . '&';
        }

        return substr($finalUrlString, 0, strlen($finalUrlString) - 1);
    }

    function getQ()
    {
        return $this->q;
    }

    function setQ($q)
    {
        $this->q = $q;
        return $this;
    }

    function getKey()
    {
        return $this->key;
    }
}
