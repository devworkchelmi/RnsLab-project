<?php

namespace App\EventSubscriber;

use App\Repository\ProductsRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;

class ProductsEvent implements EventSubscriberInterface
{
    private $productsRepository;
    private $requestStack;

    public function __construct(ProductsRepository $productsRepository, RequestStack $requestStack)
    {
        $this->productsRepository = $productsRepository;
        $this->requestStack = $requestStack;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }

    public function onKernelController(ControllerEvent $event): void
    {
        $request = $this->requestStack->getCurrentRequest();

        if ($request->attributes->get('_route') === 'admin') {
            $latestProducts = $this->productsRepository->findBy([], ['id' => 'DESC'], 5);
            $request->attributes->set('latestProducts', $latestProducts);
        }
    }
}