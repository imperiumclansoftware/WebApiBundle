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

    public function getLang()
    {
        return $this->lang;
    }

    public function setLang($lang)
    {
        $this->lang = $lang;
        return $this;
    }

    public function getImage_type()
    {
        return $this->image_type;
    }

    public function setImage_type($image_type)
    {
        $this->image_type = $image_type;
        return $this;
    }

    public function getOrientation()
    {
        return $this->orientation;
    }

    public function setOrientation($orientation)
    {
        $this->orientation = $orientation;
        return $this;
    }

    public function getCategory()
    {
        return $this->category;
    }

    public function setCategory($category)
    {
        $this->category = $category;
        return $this;
    }

    public function getMin_width()
    {
        return $this->min_width;
    }

    public function setMin_width($min_width)
    {
        $this->min_width = $min_width;
        return $this;
    }

    public function getMin_height()
    {
        return $this->min_height;
    }

    public function setMin_height($min_height)
    {
        $this->min_height = $min_height;
        return $this;
    }

    public function getColors()
    {
        return $this->colors;
    }

    public function setColors($colors)
    {
        $this->colors = $colors;
        return $this;
    }

    public function getEditors_choice()
    {
        return $this->editors_choice;
    }

    public function setEditors_choice($editors_choice)
    {
        $this->editors_choice = $editors_choice;
        return $this;
    }

    public function getSafesearch()
    {
        return $this->safesearch;
    }

    public function setSafesearch($safesearch)
    {
        $this->safesearch = $safesearch;
        return $this;
    }

    public function getOrder()
    {
        return $this->order;
    }

    public function setOrder($order)
    {
        $this->order = $order;
        return $this;
    }

    public function getPage()
    {
        return $this->page;
    }

    public function setPage($page)
    {
        $this->page = $page;
        return $this;
    }

    public function getPer_page()
    {
        return $this->per_page;
    }

    public function setPer_page($per_page)
    {
        $this->per_page = $per_page;
        return $this;
    }

    public function getPretty()
    {
        return $this->pretty;
    }

    public function setPretty($pretty)
    {
        $this->pretty = $pretty;
        return $this;
    }

    public function __toString()
    {
        $finalUrlString = "";
        $oClass = new ReflectionClass(__CLASS__);
        $propertyAccessor = PropertyAccess::createPropertyAccessorBuilder()
            ->disableExceptionOnInvalidPropertyPath()
            ->getPropertyAccessor();
        foreach ($oClass->getProperties() as $property) {
            $finalUrlString .= $property->name . '=' . $propertyAccessor->getValue($this, $property->name) . '&';
        }

        $finalUrlString = substr($finalUrlString, 0, strlen($finalUrlString) - 1);
        dump($finalUrlString);
        return $finalUrlString;
    }

    public function getQ()
    {
        return $this->q;
    }

    public function setQ($q)
    {
        $this->q = $q;
        return $this;
    }

    public function getKey()
    {
        return $this->key;
    }
}
