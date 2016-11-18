<?php

/* @Base/layout.html */
class __TwigTemplate_fbd4ede58061bf5875984e1491854ceeca09e938ccd55ee02b8166ef2a8ea7ac extends Core\View\Base
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo (isset($context["content"]) ? $context["content"] : null);
    }

    public function getTemplateName()
    {
        return "@Base/layout.html";
    }

    public function getDebugInfo()
    {
        return array (  19 => 1,);
    }
}
