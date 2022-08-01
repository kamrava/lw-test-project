<?php

namespace App\Controller;

use App\Entity\ServerModel;
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
        $server = new ServerModel();

        $servers = $server->paginate(10, 1);

        $resource = UseTransformer::apply($servers, new ServerTransformer);

        $severs = $resource->toArray();

        return Responder::success($severs);
    }

    /**
     * @Route("/servers/filters", name="servers.filters", methods={"GET"})
     */
    public function getFilters(): JsonResponse
    {
        $filters = (new ServerModel)->getFilters();
        return Responder::success($filters);
    }

}
