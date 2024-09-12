<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class CardRightPicture
{
    public string $title;
    public string $subtitle;
    public string $textContent;
    public string $mediaSrc;
    public string $mediaAlt;
    public string $hook;

    
}
