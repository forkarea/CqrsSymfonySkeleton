<?php

namespace App\UI\Controller\Domain;

use App\Domain\Command\CommandBusInterface;
use App\Domain\Command\Handler\DefaultHandler\CreateHandler;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Domain\Entity\DefaultEntity;
use Swagger\Annotations as SWG;

/**
 * Class DefaultDomainController
 * @package App\UI\Controller\Domain
 * @Route("/api/domain")
 */
class DefaultDomainController extends AbstractController
{
    private $commandBus;

    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @Route("/", methods={"POST"})
     * @SWG\Parameter(
     *     name="JSON body",
     *     in="body",
     *     @Model(type=DefaultEntity::class), )
     * )
     * @SWG\Response(
     *     response=201,
     *     description="Returns null only status that created",
     * )
     */
    public function create(Request $request)
    {
        $this->commandBus->handle($request->getContent());
        return $this->json(null, Response::HTTP_CREATED);
    }
}