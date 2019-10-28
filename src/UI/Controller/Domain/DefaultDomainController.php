<?php

namespace App\UI\Controller\Domain;

use App\Domain\Command\CommandBusInterface;
use App\Domain\Command\DefaultHandler\CreateHandler;
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
    private $handler;


    public function __construct(CommandBusInterface $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    /**
     * @Route("/")
     */
    public function create(Request $request)
    {
        $this->commandBus->handle(new CreateHandler());
    }
}