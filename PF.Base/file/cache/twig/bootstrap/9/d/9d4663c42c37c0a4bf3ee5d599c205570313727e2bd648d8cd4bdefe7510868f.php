<?php

/* @Theme/blank.html */
class __TwigTemplate_9d4663c42c37c0a4bf3ee5d599c205570313727e2bd648d8cd4bdefe7510868f extends Core\View\Base
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
        echo "<!DOCTYPE html>
<html ";
        // line 2
        echo (isset($context["html"]) ? $context["html"] : null);
        echo ">
\t<head>
\t\t<title>";
        // line 4
        echo (isset($context["title"]) ? $context["title"] : null);
        echo "</title>
\t\t";
        // line 5
        echo (isset($context["header"]) ? $context["header"] : null);
        echo "
\t</head>
\t<body ";
        // line 7
        echo (isset($context["body"]) ? $context["body"] : null);
        echo ">
\t\t";
        // line 8
        echo (isset($context["errors"]) ? $context["errors"] : null);
        echo "
\t\t";
        // line 9
        echo (isset($context["content"]) ? $context["content"] : null);
        echo "
\t\t";
        // line 10
        echo (isset($context["js"]) ? $context["js"] : null);
        echo "
\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "@Theme/blank.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 10,  44 => 9,  40 => 8,  36 => 7,  31 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}
