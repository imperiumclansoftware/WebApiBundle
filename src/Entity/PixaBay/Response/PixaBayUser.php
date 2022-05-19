<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Response;


class PixaBayUser
{
    private $id;
    private $name;
    private $imageUrl;

    public function __construct(int $id, string $name, string $imageUrl)
    {
        $this->id = $id;
        $this->name = $name;
        $this->imageUrl = $imageUrl;
    }

    function getId()
    {
        return $this->id;
    }

    function getName()
    {
        return $this->name;
    }

    function getImageUrl()
    {
        return $this->imageUrl;
    }

    function getPageUrl()
    {
        return 'https://pixabay.com/fr/users/'.$this->getName().'-'.$this->getId();
    }
}
