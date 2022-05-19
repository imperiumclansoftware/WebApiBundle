<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Response;

use ICS\WebapiBundle\Entity\PixaBay\SearchOptions;

class PixaBayImageSearchResponse
{
    private $total;
    private $totalHits;
    private $images=[];

    private $limit;
    private $remaining;
    private $reset;

    private $options;

    public function __construct(string $jsonresponse, array $responseHeaders, SearchOptions $options)
    {
        $this->options =$options;
        $response = json_decode($jsonresponse);
        $this->total = $response->total;
        $this->totalHits = $response->totalHits;
        // Rate limit infos
        $this->remaining=$responseHeaders["x-ratelimit-remaining"][0];
        $this->limit=$responseHeaders["x-ratelimit-limit"][0];
        $this->reset=$responseHeaders["x-ratelimit-reset"][0];
        // Image Result
        foreach($response->hits as $img)
        {
            $this->images[]=new PixaBayImageResponse($img);
        }
    }

	function getTotal() {
		return $this->total;
	}

	function getTotalHits() {
		return $this->totalHits;
	}

	function getImages() {
		return $this->images;
	}

    function getLimit() {
		return $this->limit;
	}

	function getRemaining() {
		return $this->remaining;
	}

	function getReset() {
		return $this->reset;
	}

    function getNbPages() : int 
	{
        $nbPage = (int)($this->totalHits/$this->options->getPer_page());
        if(($this->totalHits/$this->options->getPer_page()) > $nbPage)
        {
            $nbPage++;
        }
		return  $nbPage;
	}

}