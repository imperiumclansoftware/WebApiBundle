<?php

namespace ICS\WebapiBundle\Entity\PixaBay\Response;

use ICS\WebapiBundle\Entity\PixaBay\SearchOptions;

class PixaBayImageResponse
{
    private $id;
    private $pageUrl;
    private $type;
    private $tags;
    private $preview;
    private $webFormat;
    private $largeImage;
    private $views;
    private $downloads;
    private $collections;
    private $likes;
    private $comments;
    private $user;
	

    public function __construct(object $response)
    {
        $this->id = $response->id;
        $this->pageUrl = $response->pageURL;
        $this->type = $response->type;
        foreach(explode(',', $response->tags) as $tag)
        {
            $this->tags[]=trim($tag);
        }
        
        $this->preview = new PixaBayImage($response->previewURL, $response->previewWidth, $response->previewHeight);
        $this->webFormat = new PixaBayImage($response->webformatURL, $response->webformatWidth, $response->webformatHeight);
        $this->largeImage = new PixaBayImage($response->largeImageURL, $response->imageWidth, $response->imageHeight);
        $this->views = $response->views;
        $this->downloads = $response->downloads;
        $this->collections = $response->collections;
        $this->likes = $response->likes;
        $this->comments = $response->comments;
        $this->user = new PixaBayUser($response->user_id, $response->user, $response->userImageURL);
    }


	function getId() {
		return $this->id;
	}

	function getPageUrl() {
		return $this->pageUrl;
	}

	function getType() {
		return $this->type;
	}

	function getTags() {
		return $this->tags;
	}

	function getPreview() {
		return $this->preview;
	}

	function getWebFormat() {
		return $this->webFormat;
	}

	function getLargeImage() {
		return $this->largeImage;
	}


	function getViews() {
		return $this->views;
	}


	function getDownloads() {
		return $this->downloads;
	}

	function getCollections() {
		return $this->collections;
	}

	function getLikes() {
		return $this->likes;
	}

	function getComments() {
		return $this->comments;
	}

	function getUser() {
		return $this->user;
	}

	
}
