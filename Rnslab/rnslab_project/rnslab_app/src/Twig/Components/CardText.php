<?php
 
namespace App\Twig\Components;
 
use Symfony\UX\TwigComponent\Attribute\AsTwigComponent;
 
#[AsTwigComponent]
final class CardText
{
    public string $title;
    public string $subtitle;
    public string $textContent;
}