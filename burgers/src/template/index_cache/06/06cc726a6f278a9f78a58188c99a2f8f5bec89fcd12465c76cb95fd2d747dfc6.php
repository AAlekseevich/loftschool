<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* header.twig */
class __TwigTemplate_ea9d13c68c21f231a20b60f1c17bcdf7939d64417698cf4a0b860b1c4eace0f6 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo "<!DOCTYPE html>
<html lang=\"ru\">
<head>
    <meta charset=\"UTF-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge,chrome=1\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <title>Главная страница
    </title>
    <link rel=\"stylesheet\" href=\"./css/vendors.min.css\">
    <link rel=\"stylesheet\" href=\"./css/main.min.css\">
</head>
<body>
<div class=\"wrapper\">
    <div class=\"maincontent\">
        <section class=\"section hero\">
            <div class=\"container\">
                <header class=\"header\">
                    <div class=\"header__logo\"><a class=\"logo\" href=\"#\"><img class=\"logo__icon\" src=\"./img/icons/logo.svg\"></a></div>
                    <div class=\"header__menu\">
                        <nav class=\"nav\">
                            <ul class=\"nav__list\">
                                <li class=\"nav__item\"><a class=\"nav__link\" href=\"1\">о нас</a>
                                </li>
                                <li class=\"nav__item\"><a class=\"nav__link\" href=\"2\">бургеры</a>
                                </li>
                                <li class=\"nav__item\"><a class=\"nav__link\" href=\"3\">команда</a>
                                </li>
                                <li class=\"nav__item\"><a class=\"nav__link\" href=\"4\">меню</a>
                                </li>
                                <li class=\"nav__item\"><a class=\"nav__link\" href=\"5\">отзывы</a>
                                </li>
                                <li class=\"nav__item\"><a class=\"nav__link\" href=\"7\">контакты</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class=\"header__links\"><a class=\"order-link btn\" href=\"6\">Заказать</a><a class=\"hamburger-menu-link\" href=\"\">
                            <div class=\"hamburger-menu-link__bars\"></div></a></div>
                </header>
                <div class=\"hero__container\">
                    <div class=\"hero__content\">
                        <div class=\"hero__left\"><img class=\"hero__img\" src=\"./img/content/burger.png\" alt=\"\"></div>
                        <div class=\"hero__right\">
                            <div class=\"section__title\">Мы делаем</div>
                            <div class=\"hero__desc\">Натуральные бургеры</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>";
    }

    public function getTemplateName()
    {
        return "header.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "header.twig", "F:\\OSPanel\\domains\\loftschool\\burgers\\src\\template\\header.twig");
    }
}
