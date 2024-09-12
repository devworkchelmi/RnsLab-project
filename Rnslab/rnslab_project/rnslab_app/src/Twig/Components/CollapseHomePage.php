<?php

namespace App\Twig\Components;

use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;

#[AsTwigComponent]
final class CollapseHomePage
{
    public string $title;

    public string $textContent;

    public string $picture;

    public string $alt;

    public int $index;


}
