<?php

namespace App\UI\Controller\Query;

use App\Application\Query\DefaultQuery;
use App\Application\QueryDispatcher;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class DefaultController
 * @package App\UI\Query
 * @Route("/api/query")
 */
class DefaultQueryController extends AbstractController
{
    /**
     * @var QueryDispatcher
     */
    private $queryDispatcher;

    /**
     * DefaultController constructor.
     * @param QueryDispatcher $queryDispatcher
     */
    public function __construct(QueryDispatcher $queryDispatcher)
    {
        $this->queryDispatcher = $queryDispatcher;
    }

    /**
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     * @Route("/")
     */
    public function index(): JsonResponse
    {
        return $this->json($this->queryDispatcher->execute(new DefaultQuery())->fetchAll(), Response::HTTP_OK);
    }
}