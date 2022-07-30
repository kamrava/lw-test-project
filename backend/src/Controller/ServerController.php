<?php

namespace App\Controller;

use App\Response\Responder;
use App\Services\Excel\Import\ImportServers;
use App\Transformer\ServerTransformer;
use App\Transformer\UseTransformer;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ServerController extends AbstractController
{
    /**
     * @Route("/servers", name="servers.index", methods={"GET"})
     */
    public function index(): JsonResponse
    {
        $servers = ImportServers::getRows(2, 10);

        $resource = UseTransformer::apply($servers, new ServerTransformer);

        $severs = $resource->toArray();

        return Responder::success($severs);
    }

}
