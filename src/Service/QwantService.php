<?php

namespace ICS\WebapiBundle\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class QwantService
{
    private $client;

    public function __construct(ContainerInterface $container, HttpClientInterface $httpclient)
    {
        $this->client = $httpclient;
        $this->container = $container;
    }

    public function Search($searchValue, $nbResult = 30, $offset = 0, $type = 'web')
    {
        $requestOptions = [];

        $url = 'https://api.qwant.com/v3/search/' . $type;
        $requestOptions['t'] = $type;
        $requestOptions['q'] = trim($searchValue);
        $requestOptions['safesearch'] = 0;
        $requestOptions['device'] = 'desktop';
        $requestOptions['locale'] = 'fr_FR';
        if ($offset > 0) {
            $requestOptions['offset'] = $offset;
        }

        if ('images' == $type) {
            $requestOptions['count'] = $nbResult;
            $requestOptions['size'] = 'large';
        }

        $options = '';
        if (count($requestOptions) > 0) {
            $options = '?';
            foreach ($requestOptions as $key => $opt) {
                $options .= $key . '=' . $opt . '&';
            }
            $options = substr($options, 0, strlen($options) - 1);
        }

        $response = $this->client->request('GET', $url . $options, [
            'max_redirects' => 5,
            'headers' => [
                'User-Agent' => 'PostmanRuntime/7.26.10'
            ]
        ]);

        return json_decode($response->getContent());
    }
}
