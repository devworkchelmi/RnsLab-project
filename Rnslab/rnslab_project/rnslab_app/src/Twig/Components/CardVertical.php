<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class CardVertical
{
    public string $subtitle ;
    public string $textContent ;
    public string $mediaSrc ;
    public string $mediaAlt;
    public string $Hook  ;

}
