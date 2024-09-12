<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class AllVertical
{
    public string $title;
    public string $subtitle;
    public string $href;
    public string $textContent;
    public string $mediaSrc;
    public string $mediaAlt;
    public string $hook;    
}
