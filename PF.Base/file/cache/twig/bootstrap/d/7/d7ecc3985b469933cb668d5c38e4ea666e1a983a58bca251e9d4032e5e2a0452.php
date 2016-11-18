<?php

/* @Theme/layout.html */
class __TwigTemplate_d7ecc3985b469933cb668d5c38e4ea666e1a983a58bca251e9d4032e5e2a0452 extends Core\View\Base
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
\t\t<div id=\"pf-loading-message\">
\t\t\t<span class=\"l-1\"></span>
\t\t\t<span class=\"l-2\"></span>
\t\t\t<span class=\"l-3\"></span>
\t\t\t<span class=\"l-4\"></span>
\t\t\t<span class=\"l-5\"></span>
\t\t\t<span class=\"l-6\"></span>
\t\t</div>
\t\t<div id=\"section-header\">
\t\t\t<div class=\"sticky-bar visible-md visible-lg\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t";
        // line 19
        if ((call_user_func_array($this->env->getFunction('is_user')->getCallable(), array()) == true)) {
            // line 20
            echo "\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-md-3 col-sm-3 hidden-xs\">
\t\t\t\t\t\t\t\t";
            // line 22
            echo (isset($context["logo"]) ? $context["logo"] : null);
            echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            // line 24
            if (call_user_func_array($this->env->getFunction('user_group_setting')->getCallable(), array("search.can_use_global_search"))) {
                // line 25
                echo "\t\t\t\t\t\t\t\t<div id=\"search-panel\" class=\"col-md-4 col-sm-4 hidden-xs\">
\t\t\t\t\t\t\t\t\t<div class=\"js_temp_friend_search_form\"></div>
\t\t\t\t\t\t\t\t\t<form method=\"get\" action=\"";
                // line 27
                echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("search"));
                echo "\" class=\"header_search_form\" id=\"header_search_form\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group has-feedback\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"q\" placeholder=\"";
                // line 29
                echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Search..."));
                echo "\" autocomplete=\"off\" class=\"form-control js_temp_friend_search_input in_focus\" id=\"header_sub_menu_search_input\" />
\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-search form-control-feedback\" aria-hidden=\"true\"></span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t";
            }
            // line 35
            echo "\t\t\t\t\t\t\t<div id=\"user_sticky_bar\" class=\"col-md-5 col-sm-5\"></div>
\t\t\t\t\t\t</div>
\t\t\t\t\t\t<div class=\"row visible-xs\" id=\"header_search_form_xs\">
\t\t\t\t\t\t\t<div class=\"col-md-12 panel_xs\">
\t\t\t\t\t\t\t\t";
            // line 39
            if (call_user_func_array($this->env->getFunction('user_group_setting')->getCallable(), array("search.can_use_global_search"))) {
                // line 40
                echo "\t\t\t\t\t\t\t\t\t<div class=\"js_temp_friend_search_form\"></div>
\t\t\t\t\t\t\t\t\t<form method=\"get\" action=\"";
                // line 41
                echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("search"));
                echo "\" class=\"header_search_form_sm\" id=\"header_search_form\">
\t\t\t\t\t\t\t\t\t\t<div class=\"form-group-sm has-feedback relative\">
\t\t\t\t\t\t\t\t\t\t\t<input type=\"text\" name=\"q\" placeholder=\"";
                // line 43
                echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Search..."));
                echo "\" autocomplete=\"off\" class=\"form-control js_temp_friend_search_input in_focus\" id=\"header_sub_menu_search_input_xs\">
\t\t\t\t\t\t\t\t\t\t\t<span class=\"fa fa-search form-control-feedback\" aria-hidden=\"true\"></span>
\t\t\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t\t\t</form>
\t\t\t\t\t\t\t\t";
            }
            // line 48
            echo "\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        } else {
            // line 51
            echo "\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t<div class=\"col-md-4 col-sm-4 hidden-xs\">
\t\t\t\t\t\t\t\t";
            // line 53
            echo (isset($context["logo"]) ? $context["logo"] : null);
            echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"col-md-8 col-sm-8\">
\t\t\t\t\t\t\t\t";
            // line 56
            echo (isset($context["sticky_bar"]) ? $context["sticky_bar"] : null);
            echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t";
        }
        // line 60
        echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t<nav class=\"navbar navbar-default\">
\t\t\t\t<div class=\"container-fluid\">
\t\t\t\t\t<!-- Brand and toggle get grouped for better mobile display -->
\t\t\t\t\t<div class=\"navbar-header\">

\t\t\t\t\t\t<button type=\"button\" class=\"navbar-toggle collapsed\" data-toggle=\"collapse\" data-target=\"#bs-example-navbar-collapse-1\" aria-expanded=\"false\">
\t\t\t\t\t\t\t<span class=\"sr-only\">Toggle navigation</span>
\t\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t\t<span class=\"icon-bar\"></span>
\t\t\t\t\t\t</button>
\t\t\t\t\t\t<div class=\"navbar-brand visible-sm visible-xs\">";
        // line 73
        echo (isset($context["logo"]) ? $context["logo"] : null);
        echo "</div>
\t\t\t\t\t\t<div class=\"sticky-bar-sm\">
\t\t\t\t\t\t\t";
        // line 75
        echo (isset($context["sticky_bar_sm"]) ? $context["sticky_bar_sm"] : null);
        echo "
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>

\t\t\t\t\t<!-- Collect the nav links, forms, and other content for toggling -->
\t\t\t\t\t<div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
\t\t\t\t\t\t";
        // line 81
        echo (isset($context["menu"]) ? $context["menu"] : null);
        echo "
\t\t\t\t\t</div><!-- /.navbar-collapse -->
\t\t\t\t</div><!-- /.container-fluid -->
\t\t\t</nav>
\t\t\t";
        // line 85
        echo (isset($context["sticky_bar_xs"]) ? $context["sticky_bar_xs"] : null);
        echo "
\t\t\t";
        // line 86
        echo (isset($context["location_6"]) ? $context["location_6"] : null);
        echo "
\t\t</div>

\t\t<div id=\"main\" class=\"";
        // line 89
        echo (isset($context["main_class"]) ? $context["main_class"] : null);
        echo "\">
\t\t\t<div class=\"container-fluid row_image\">
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-12 col-sm-12\">
\t\t\t\t\t\t";
        // line 93
        echo (isset($context["location_11"]) ? $context["location_11"] : null);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-3 col-sm-4\" id=\"left\">
\t\t\t\t\t\t";
        // line 98
        echo (isset($context["left"]) ? $context["left"] : null);
        echo "
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-6 col-sm-8\" id=\"content-holder\">
\t\t\t\t\t\t<div id=\"content-stage\" class=\"bg-tran\">
\t\t\t\t\t\t\t<div class=\"\">
\t\t\t\t\t\t\t\t";
        // line 103
        echo (isset($context["breadcrumb"]) ? $context["breadcrumb"] : null);
        echo "
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"\">
\t\t\t\t\t\t\t\t<div id=\"top\">
\t\t\t\t\t\t\t\t\t";
        // line 107
        echo (isset($context["main_top"]) ? $context["main_top"] : null);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t\t\t\t<div class=\"col-md-12\" id=\"content\">
\t\t\t\t\t\t\t\t\t";
        // line 112
        echo (isset($context["errors"]) ? $context["errors"] : null);
        echo "
\t\t\t\t\t\t\t\t\t";
        // line 113
        echo (isset($context["content"]) ? $context["content"] : null);
        echo "
\t\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t\t</div>
\t\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-md-3 col-md-offset-0 col-sm-offset-4\" id=\"right\">
\t\t\t\t\t\t";
        // line 119
        echo (isset($context["right"]) ? $context["right"] : null);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-md-12 col-sm-12\">
\t\t\t\t\t\t";
        // line 124
        echo (isset($context["location_8"]) ? $context["location_8"] : null);
        echo "
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>

\t\t<div id=\"bottom_placeholder\">
\t\t\t";
        // line 131
        echo (isset($context["location_12"]) ? $context["location_12"] : null);
        echo "
\t\t</div>

\t\t<footer id=\"section-footer\">
\t\t\t<div class=\"container-fluid\">
\t\t\t\t";
        // line 136
        echo (isset($context["footer"]) ? $context["footer"] : null);
        echo "
\t\t\t\t";
        // line 137
        echo (isset($context["location_5"]) ? $context["location_5"] : null);
        echo "
\t\t\t</div>
\t\t</footer>
\t\t";
        // line 140
        echo (isset($context["js"]) ? $context["js"] : null);
        echo "

\t</body>
</html>";
    }

    public function getTemplateName()
    {
        return "@Theme/layout.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  261 => 140,  255 => 137,  251 => 136,  243 => 131,  233 => 124,  225 => 119,  216 => 113,  212 => 112,  204 => 107,  197 => 103,  189 => 98,  181 => 93,  174 => 89,  168 => 86,  164 => 85,  157 => 81,  148 => 75,  143 => 73,  128 => 60,  121 => 56,  115 => 53,  111 => 51,  106 => 48,  98 => 43,  93 => 41,  90 => 40,  88 => 39,  82 => 35,  73 => 29,  68 => 27,  64 => 25,  62 => 24,  57 => 22,  53 => 20,  51 => 19,  36 => 7,  31 => 5,  27 => 4,  22 => 2,  19 => 1,);
    }
}
