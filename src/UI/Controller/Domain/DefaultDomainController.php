<?php

namespace App\UI\Controller\Domain;

use App\Domain\Command\CommandBusInterface;
use App\Domain\Command\Handler\DefaultHandler\CreateHandler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

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
     */
    public function create(Request $request, CreateHandler $handler)
    {
        $this->commandBus->handle($handler, $request->getContent());
    }
}