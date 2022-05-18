<?php

namespace ICS\WebapiBundle\Service;

use ICS\WebapiBundle\Entity\PixaBay\Parameters\VideoPosterSize;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class PixaBayService
{

    private $httpClient;
    private $apiUrl = "https://pixabay.com/api/";
    private $apiKey = "27440602-3e39ef975e6e60cb304a6b113";



    public function __construct(HttpClientInterface  $httpClient)
    {
        $this->httpClient = $httpClient;
    }

    public function searchImages(string $search, string $type = 'photo', int $nbResult = 10)
    {
        $options = [];
        $options['key'] = $this->apiKey;
        $options['q'] = $search;
        $options['image_type'] = $type;
        $options['lang'] = 'fr';
        $options['category'] = 'people';
        $options['per_page'] = $nbResult;

        $finalUrl = $this->apiUrl . '?';

        foreach ($options as $key => $option) {
            $finalUrl .= $key . '=' . $option . '&';
        }

        $finalUrl = substr($finalUrl, 0, strlen($finalUrl) - 1);

        $response = $this->httpClient->request('GET', $finalUrl);

        return json_decode($response->getContent());
    }

    public function searchVideos(string $search)
    {
        $options = [];
        $options['key'] = $this->apiKey;
        $options['q'] = $search;
        // $options['lang'] = 'fr';
        // $options['category'] = 'people';
        // $options['per_page'] = $nbResult;

        $finalUrl = $this->apiUrl . 'videos/' . '?';

        foreach ($options as $key => $option) {
            $finalUrl .= $key . '=' . $option . '&';
        }

        $finalUrl = substr($finalUrl, 0, strlen($finalUrl) - 1);

        $response = $this->httpClient->request('GET', $finalUrl);

        return json_decode($response->getContent());
    }

    public function getVideoPoster(string $id, $size = VideoPosterSize::VIDEO_PICTURE_SIZE_640x360)
    {
        return "https://i.vimeocdn.com/video/" . $id . "_" . $size . ".jpg ";
    }
}
