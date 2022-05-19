<?php

namespace ICS\WebapiBundle\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use ICS\WebapiBundle\Service\PixaBayService;
use ICS\WebapiBundle\Entity\PixaBay\Parameters\ImageType;

class PixaBayController extends AbstractController
{
    /**
     * @Route("/pixabay/{imagePage}", name="ics-webapi-pixabay-homepage")
     */
    public function index(Request $request,PixaBayService $service,int $imagePage=1)
    {
        $resultImages=[];
        $type=$request->get('type',ImageType::IMAGE_TYPE_ALL);
        $search=$request->get('search','');
        if($search != '')
        {
            $service->getSearchOptions()->setImage_type($type);
            $service->getSearchOptions()->setPage($imagePage);
            $resultImages = $service->searchImages($search);
        }
        
        return $this->render("@Webapi\pixabay\pixabay.html.twig",[
            'imageTypes' => ImageType::getParametersList(),
            'selectedType' => $type,
            'search' => $search,
            'resultsImages' => $resultImages,
            'currentImagePage' => $imagePage,
        ]);
    }
}