<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Response;


class PixaBayImage
{
    private $url;
    private $width;
    private $height;
    
    public function __construct(string $url,int $width,int $height)
    {
        $this->url = $url;
        $this->width = $width;
        $this->height = $height;
    }

	function getUrl():string {
		return $this->url;
	}

	function getWidth():int {
		return $this->width;
	}

	function getHeight():int {
		return $this->height;
	}

    function getSize(): string {
        return $this->width.'x'.$this->height;
    }
}