<?php

namespace App\EventSubscriber;

use App\Repository\ArticlesRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;

class ArticlesEvent implements EventSubscriberInterface
{
    private $articlesRepository;
    private $requestStack;

    public function __construct(ArticlesRepository $articlesRepository, RequestStack $requestStack)
    {
        $this->articlesRepository = $articlesRepository;
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
            $latestArticles = $this->articlesRepository->findBy([], ['id' => 'DESC'], 5);
            $request->attributes->set('latestArticles', $latestArticles);
        }

        $allArticles = $this->articlesRepository->findAll();
        $request->attributes->set('allArticles', $allArticles);
    }
}