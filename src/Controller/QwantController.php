<?php

namespace ICS\WebapiBundle\Controller;

use ICS\WebapiBundle\Service\QwantService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

class QwantController extends AbstractController
{

    /**
     * @Route("/qwant/" , name="ics_webapi_qwant_homepage")
     */
    public function index(Request $request, QwantService $searchService)
    {
        $search = $request->get('search');
        return $this->render('@Webapi/qwant/index.html.twig', [
            'search' => $search,
        ]);
    }

    /**
     * @Route("/qwant/search/{type}/{search}/{offset}" , name="ics_webapi_qwant_next_homepage")
     */
    public function search(QwantService $searchService, $search = '', $offset = 0, $type = 'web')
    {
        $response = [];

        if ('' != $search) {
            $res = $searchService->search($search, 30, $offset, $type);
            $response = $res->data->result->items;
        }

        switch ($type) {
            case 'images':
                $result['results'] = $this->renderView('@Webapi/qwant/imageResults.html.twig', [
                    'response' => $response,
                ]);
                break;
            case 'videos':
                $result['results'] = $this->renderView('@Webapi/qwant/videosResults.html.twig', [
                    'response' => $response,
                ]);
                break;
            case 'news':
                $result['results'] = $this->renderView('@Webapi/qwant/newsResults.html.twig', [
                    'response' => $response,
                ]);
                break;
            default:
                $result['results'] = $this->renderView('@Webapi/qwant/webResults.html.twig', [
                    'response' => $response,
                ]);
        }

        if (is_countable($response)) {
            $result['next_offset'] = count($response);
        }

        return new JsonResponse($result);
    }

    public function getVideos()
    {
        $videoId = 'ok';
        $url = 'https://www.youtube.com/get_video_info?video_id=' . $videoId . '&el=embedded&ps=default&eurl=&gl=US&hl=en';
    }
}
