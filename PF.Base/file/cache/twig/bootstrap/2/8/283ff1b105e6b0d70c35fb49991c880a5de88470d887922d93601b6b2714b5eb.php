<?php

/* @Base/layout.html */
class __TwigTemplate_283ff1b105e6b0d70c35fb49991c880a5de88470d887922d93601b6b2714b5eb extends Core\View\Base
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
