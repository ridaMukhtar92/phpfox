<?php

/* manage.html */
class __TwigTemplate_54fdec4bc46be08a990212d1f5815a3c72021ff972c84f8fef2be2797e10d41e extends Core\View\Base
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
        echo "<div id=\"admincp_base\"></div>
<div id=\"flavor_manager\">
\t<div class=\"fm_save\">
\t\t<i class=\"fa fa-spin fa-circle-o-notch\"></i>
\t\t<i class=\"fa fa-check\"></i>
\t</div>
\t<div class=\"fm_sub_menu\">
\t\t<div class=\"fm_sub_menu_title\">
\t\t\t<i class=\"fa fa-chevron-left\"></i><span></span>
\t\t\t<button>";
        // line 10
        echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Save"));
        echo "</button>
\t\t</div>
\t\t<div class=\"fm_sub_menu_content\"></div>
\t\t<div class=\"ace_editor_holder\">
\t\t\t<div class=\"ace_editor\" data-ace-mode=\"html\" data-ace-save=\"";
        // line 14
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()))));
        echo "\" data-onstart=\"flavor_start\" data-onend=\"flavor_end\"></div>
\t\t</div>
\t</div>
\t<div class=\"fm_menu\">
\t\t<div class=\"fm_menu_title\"><i class=\"fa fa-diamond\" onclick=\"window.location.href = '";
        // line 18
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/admincp/theme/"));
        echo "';\"></i>";
        echo $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "name", array());
        echo "</div>
\t\t<div class=\"fm_menu_content\">
\t\t\t<div class=\"image_load theme_icon\" data-src=\"";
        // line 20
        echo $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "icon", array());
        echo "\">
\t\t\t\t";
        // line 21
        if (twig_test_empty($this->getAttribute((isset($context["theme"]) ? $context["theme"] : null), "icon", array()))) {
            // line 22
            echo "\t\t\t\t\t<div class=\"fm_uploader\">
\t\t\t\t\t\t<span><i class=\"fa fa-upload\"></i></span>
\t\t\t\t\t\t<input type=\"file\" class=\"ajax_upload\" value=\"Upload\" name=\"logo\" accept=\"image/png\" data-url=\"";
            // line 24
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "icon")));
            echo "\" data-onstart=\"flavor_start\">
\t\t\t\t\t</div>
\t\t\t\t";
        }
        // line 27
        echo "\t\t\t</div>

\t\t\t";
        // line 29
        if (($this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()) == "bootstrap")) {
            // line 30
            echo "\t\t\t<div class=\"message\" style=\"font-size:12px;\">
\t\t\t\t";
            // line 31
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("You are editing the Core bootstrap theme, which is reverted during a future upgrade. Create a new theme instead."));
            echo "
\t\t\t</div>
\t\t\t";
        }
        // line 34
        echo "
\t\t\t";
        // line 35
        if ((isset($context["has_upgrade"]) ? $context["has_upgrade"] : null)) {
            // line 36
            echo "\t\t\t\t<div class=\"upgrade_product_holder\">
\t\t\t\t\t<p>There is an update available for this product.</p>
\t\t\t\t\t<a href=\"";
            // line 38
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array($this->getAttribute((isset($context["store"]) ? $context["store"] : null), "install_url", array())));
            echo "\" class=\"skip\">Update Now</a>
\t\t\t\t</div>
\t\t\t";
        }
        // line 41
        echo "
\t\t\t<ul>
\t\t\t\t<li><a href=\"#\" data-url=\"";
        // line 43
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "logo")));
        echo "\"><i class=\"fa fa-photo\"></i> ";
        echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Logo"));
        echo "<i class=\"fa fa-chevron-right\"></i></a></li>
\t\t\t\t<li><a href=\"#\" data-url=\"";
        // line 44
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "homepage")));
        echo "\"><i class=\"fa fa-home\"></i> ";
        echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Homepage"));
        echo "<i class=\"fa fa-chevron-right\"></i></a></li>

\t\t\t\t<li><a href=\"#\" data-url=\"";
        // line 46
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "default_photo")));
        echo "\"><i class=\"fa fa-photo\"></i> ";
        echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Default Photo"));
        echo "<i class=\"fa fa-chevron-right\"></i></a></li>

\t\t\t\t";
        // line 48
        if ((isset($context["show_design"]) ? $context["show_design"] : null)) {
            // line 49
            echo "\t\t\t\t<li><a href=\"#\" data-url=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "design")));
            echo "\"><i class=\"fa fa-paint-brush\"></i> ";
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Design"));
            echo "<i class=\"fa fa-chevron-right\"></i></a></li>
\t\t\t\t";
        }
        // line 51
        echo "\t\t\t\t<li><a href=\"#\" data-url=\"";
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "css")));
        echo "\"><i class=\"fa fa-css3\"></i> ";
        echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("CSS"));
        echo "<i class=\"fa fa-chevron-right\"></i></a></li>
\t\t\t\t";
        // line 52
        if ((isset($context["show_js"]) ? $context["show_js"] : null)) {
            // line 53
            echo "\t\t\t\t<li><a href=\"#\" data-url=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "js")));
            echo "\"><i class=\"fa fa-code\"></i> ";
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Javascript"));
            echo "<i class=\"fa fa-chevron-right\"></i></a></li>
\t\t\t\t";
        }
        // line 55
        echo "\t\t\t\t<li><a href=\"#\" data-url=\"";
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "html")));
        echo "\"><i class=\"fa fa-html5\"></i> ";
        echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("HTML"));
        echo "<i class=\"fa fa-chevron-right\"></i></a></li>
\t\t\t</ul>
\t\t</div>
\t</div>
\t<div class=\"fm_content\" data-url=\"";
        // line 59
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/", array("force-flavor" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()))));
        echo "\">
\t\t<div class=\"fm_loader\"><i class=\"fa fa-spin fa-circle-o-notch\"></i></div>
\t</div>
\t<div class=\"fm_responsive\">
\t\t<span><i class=\"fa fa-chevron-up\"></i></span>
\t\t<a href=\"#\" data-type=\"desktop\" class=\"active\"><i class=\"fa fa-desktop\"></i></a>
\t\t<a href=\"#\" data-type=\"tablet\"><i class=\"fa fa-tablet\"></i></a>
\t\t<a href=\"#\" data-type=\"mobile\"><i class=\"fa fa-mobile\"></i></a>
\t\t<div>
\t\t\t";
        // line 68
        if (($this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()) != (isset($context["active_flavor_id"]) ? $context["active_flavor_id"] : null))) {
            // line 69
            echo "\t\t\t<a href=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "default")));
            echo "\" class=\"ajax\" onclick=\"flavor_start();\">";
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Set as Default Theme"));
            echo "</a>
\t\t\t";
        } else {
            // line 71
            echo "\t\t\t<a href=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/admincp/theme/bootstrap/rebuild"));
            echo "\" class=\"ajax\" onclick=\"flavor_start();\">";
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Rebuild Bootstrap Core"));
            echo "</a>
\t\t\t";
        }
        // line 73
        echo "\t\t\t<a href=\"";
        echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "export")));
        echo "\" target=\"_blank\">";
        echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Export"));
        echo "</a>
\t\t\t";
        // line 74
        if (($this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()) == "bootstrap")) {
            // line 75
            echo "\t\t\t\t<a href=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "revert")));
            echo "\" class=\"popup\">";
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Revert"));
            echo "</a>
\t\t\t";
        } else {
            // line 77
            echo "\t\t\t<a href=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/admincp/theme/merge"));
            echo "\" class=\"popup\">";
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Merge Legacy"));
            echo "</a>
\t\t\t";
        }
        // line 79
        echo "\t\t\t";
        if ((($this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()) != (isset($context["active_flavor_id"]) ? $context["active_flavor_id"] : null)) && ($this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()) != "bootstrap"))) {
            // line 80
            echo "\t\t\t<a href=\"";
            echo call_user_func_array($this->env->getFunction('url')->getCallable(), array("/flavors/manage", array("id" => $this->getAttribute((isset($context["flavor"]) ? $context["flavor"] : null), "id", array()), "type" => "delete")));
            echo "\" class=\"delete popup\">";
            echo call_user_func_array($this->env->getFunction('_p')->getCallable(), array("Delete"));
            echo "</a>
\t\t\t";
        }
        // line 82
        echo "\t\t</div>
\t</div>
</div>
<script>
\tif (top.location!= self.location) {
\t\ttop.location = self.location.href;
\t}
</script>";
    }

    public function getTemplateName()
    {
        return "manage.html";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  224 => 82,  216 => 80,  213 => 79,  205 => 77,  197 => 75,  195 => 74,  188 => 73,  180 => 71,  172 => 69,  170 => 68,  158 => 59,  148 => 55,  140 => 53,  138 => 52,  131 => 51,  123 => 49,  121 => 48,  114 => 46,  107 => 44,  101 => 43,  97 => 41,  91 => 38,  87 => 36,  85 => 35,  82 => 34,  76 => 31,  73 => 30,  71 => 29,  67 => 27,  61 => 24,  57 => 22,  55 => 21,  51 => 20,  44 => 18,  37 => 14,  30 => 10,  19 => 1,);
    }
}
