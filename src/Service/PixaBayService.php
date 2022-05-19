<?php

namespace ICS\WebapiBundle\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use ICS\WebapiBundle\Entity\PixaBay\SearchOptions;
use ICS\WebapiBundle\Entity\PixaBay\Response\PixaBayResponse;
use ICS\WebapiBundle\Entity\PixaBay\Response\PixaBayImageSearchResponse;
use ICS\WebapiBundle\Entity\PixaBay\Parameters\VideoPosterSize;

class PixaBayService
{

    private $httpClient;
    private $apiUrl = "https://pixabay.com/api/";
    private $config;
    private $searchOptions;

    public function __construct(HttpClientInterface  $httpClient,ParameterBagInterface $parameterBag)
    {
        $this->httpClient = $httpClient;
        $this->config = $parameterBag->get('webapi');
        $this->searchOptions = new SearchOptions($this->config['pixabay']['apiKey']);
    }

    public function searchImages(string $search)
    {
        $this->searchOptions->setQ($search);
        $finalUrl = $this->apiUrl . '?'.$this->searchOptions;
        $response = $this->httpClient->request('GET', $finalUrl);
        $finalResponse = new PixaBayImageSearchResponse($response->getContent(),$response->getHeaders(),$this->searchOptions);
        dump($finalResponse);
        return $finalResponse;
    }

    public function searchVideos(string $search)
    {
        $finalUrl = $this->apiUrl . 'videos/' . '?'.$this->searchOptions;

        $response = $this->httpClient->request('GET', $finalUrl);

        return json_decode($response->getContent());
    }

    public function getVideoPoster(string $id, $size = VideoPosterSize::VIDEO_POSTER_SIZE_640x360)
    {
        return "https://i.vimeocdn.com/video/" . $id . "_" . $size . ".jpg ";

    }

	function getSearchOptions(): SearchOptions {
		return $this->searchOptions;
	}
}
