<?php

namespace ICS\WebapiBundle\Entity\PixaBay;

class SearchOptions
{
    /**
     * @var string
     */
    private $key;
    /**
     * @var string
     */
    private $lang;
    /**
     * @var string
     */
    private $image_type;
    /**
     * @var string
     */
    private $orientation;
    /**
     * @var string
     */
    private $category;
    /**
     * @var string
     */
    private $min_width;
    /**
     * @var string
     */
    private $min_height;
    /**
     * @var string
     */
    private $colors;
    /**
     * @var string
     */
    private $editors_choice;
    /**
     * @var bool
     */
    private $safesearch;
    /**
     * @var string
     */
    private $order;
    /**
     * @var int
     */
    private $page;
    /**
     * @var int
     */
    private $per_page;
    /**
     * @var bool
     */
    private $pretty;

    function getKey()
    {
        return $this->key;
    }

    function setKey($key)
    {
        $this->key = $key;
        return $this;
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
}
