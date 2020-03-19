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

/* footer.twig */
class __TwigTemplate_702a43c395ea5aad5efe7ee4e387cbb8a3736b9da9010fa40e10b69f7899b6a7 extends Template
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
        echo "<footer>
    <div class=\"full-review popup\" id=\"full-review\"><a class=\"full-review__close\" href=\"#\"><svg id=\"icon\" xmlns=\"http://www.w3.org/2000/svg\" width=\"15\" height=\"15\" viewBox=\"0 0 15 15\">
                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" fill=\"#E45028\"
                      d=\"M9.831 7.494l4.673-4.673A1.651 1.651 0 1 0 12.167.484L7.494 5.157 2.82.483A1.653 1.653 0 0 0 .483 2.82l4.673 4.673-4.673 4.673a1.653 1.653 0 0 0 2.337 2.337L7.493 9.83l4.673 4.673c.646.646 1.691.646 2.337 0s.646-1.691 0-2.337L9.831 7.494z\"/>
            </svg></a>
        <div class=\"full-review__inner\">
            <div class=\"full-review__title\">Констнтин Спилберг</div>
            <div class=\"full-review__content\">
                Мысли все о них и о них, о них и о них. Нельзя устоять, невозможно забыть... Никогда не думал, что булочки могут быть такими мягкими, котлетка такой сочной, а сыр таким расплавленным. Мысли все о них и о них, о них и о них. Нельзя устоять, невозможно забыть... Никогда не думал, что булочки могут быть такими мягкими, котлетка такой сочной, а сыр таким расплавленным.

            </div>
        </div>
    </div>
    <div class=\"status-popup popup\" id=\"success\">
        <div class=\"status-popup__inner\">
            <div class=\"status-popup__message\">Сообщение отправлено</div><a class=\"status-popup__close btn\" href=\"#\">Закрыть</a>
        </div>
    </div>
    <div class=\"status-popup popup\" id=\"error\">
        <div class=\"status-popup__inner\">
            <div class=\"status-popup__message error-message\">Произошла ошибка</div><a class=\"status-popup__close btn\" href=\"#\">Закрыть</a>
        </div>
    </div>
    <script
            src=\"https://code.jquery.com/jquery-3.4.1.min.js\"
            integrity=\"sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=\"
            crossorigin=\"anonymous\"></script>
    <script src=\"./js/vendors.min.js\"></script>
    <script src=\"https://api-maps.yandex.ru/2.1/?lang=ru_RU\" type=\"text/javascript\"></script>
    <script src=\"./js/main.min.js\"></script>
</footer>
</body>
</html>";
    }

    public function getTemplateName()
    {
        return "footer.twig";
    }

    public function getDebugInfo()
    {
        return array (  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "footer.twig", "F:\\OSPanel\\domains\\loftschool\\burgers\\src\\template\\footer.twig");
    }
}
