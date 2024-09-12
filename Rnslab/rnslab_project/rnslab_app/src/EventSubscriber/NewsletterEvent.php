<?php

namespace App\EventSubscriber;

use App\Form\NewsletterSuscribersType;
use App\Repository\NewsletterSuscribersRepository;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ControllerEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\Form\FormFactoryInterface;

class NewsletterEvent implements EventSubscriberInterface
{
    private $newsletterSuscribersRepository;
    private $requestStack;
    private $formFactory;

    public function __construct(NewsletterSuscribersRepository $newsletterSuscribersRepository,FormFactoryInterface $formFactory, RequestStack $requestStack)
    {
        $this->newsletterSuscribersRepository =$newsletterSuscribersRepository;
        $this->requestStack = $requestStack;
        $this->formFactory = $formFactory;

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
        $form = $this->formFactory->create(NewsletterSuscribersType::class);

        $request->attributes->set('newsletterForm', $form->createView());

        if ($request->attributes->get('_route') === 'admin') {
            $latestSuscribers = $this->newsletterSuscribersRepository->findBy([], ['dateSuscription' => 'DESC'], 5);
            $request->attributes->set('latestSuscribers', $latestSuscribers);
        }
    }
}