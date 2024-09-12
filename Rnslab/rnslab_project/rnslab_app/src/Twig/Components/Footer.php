<?php

    namespace App\Twig\Components;

    use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
    use Symfony\Component\Form\FormFactoryInterface;
    use Symfony\Component\Form\FormInterface;
    use App\Form\NewsletterSuscribersType;
    use App\Entity\NewsletterSuscribers;

    #[AsTwigComponent('footer')]
    final class Footer
    {
        private FormFactoryInterface $formFactory;
        public FormInterface $form;

        public function __construct(FormFactoryInterface $formFactory)
        {
            $this->formFactory = $formFactory;
            $this->initializeForm();
        }

        private function initializeForm(): void
        {
            $newsletterSubscriber = new NewsletterSuscribers(); // Assurez-vous d'instancier votre entité ici
            $this->form = $this->formFactory->create(NewsletterSuscribersType::class, $newsletterSubscriber);
        }
    }