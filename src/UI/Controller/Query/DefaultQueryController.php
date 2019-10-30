<?php

namespace App\UI\Controller\Query;

use App\Application\Query\DefaultQuery;
use App\Application\QueryDispatcher;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Domain\Entity\DefaultEntity;
use Swagger\Annotations as SWG;


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
     * @Route("/", methods={"GET"})
     * @SWG\Response(
     *     response=200,
     *     description="Returns all default data",
     *     @SWG\Schema(
     *         type="array",
     *         @SWG\Items(ref=@Model(type=DefaultEntity::class))
     *     )
     * )
     */
    public function index(): JsonResponse
    {
        return $this->json($this->queryDispatcher->execute(new DefaultQuery())->fetchAll(), Response::HTTP_OK);
    }
}