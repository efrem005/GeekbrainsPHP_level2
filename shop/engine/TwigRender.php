<?php


namespace app\engine;

use app\interfaces\IRender;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\Environment;

class TwigRender implements IRender
{
    private $twig;

    public function __construct()
    {
        $loader = new FilesystemLoader('../templates/');
        $this->twig = new Environment($loader, [
            'cache' => 'cache',
            'debug' => true
        ]);
        $this->twig->addExtension(new DebugExtension());
    }

    public function renderTemplate($template, $params = [])
    {
        return $this->twig->render($template . '.twig', $params);
    }
}