<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use App\Repository\ProductsRepository;
use Symfony\Component\HttpFoundation\RequestStack;

class ProductsSubscriber implements EventSubscriberInterface
{
    private $productsReposiory;
    private $requestStack;
    public function __construct(ProductsRepository $productsRepository, RequestStack $requestStack){
        $this->productsReposiory = $productsRepository;
        $this->requestStack = $requestStack;
    }
    public function onKernelController(ControllerEvent $event): void
    {
     $products = $this->productsReposiory->findAll();
     $this->requestStack->getCurrentRequest()->attributes->set('productsPresentation', $products) ;  
    }

    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::CONTROLLER => 'onKernelController',
        ];
    }
}
