<?php

/* @WebProfiler/Collector/router.html.twig */
class __TwigTemplate_7647be2d669b37c1f0be46c576d6b2d45578ba715a4a963368262a97a6679d32 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@WebProfiler/Profiler/layout.html.twig", "@WebProfiler/Collector/router.html.twig", 1);
        $this->blocks = array(
            'toolbar' => array($this, 'block_toolbar'),
            'menu' => array($this, 'block_menu'),
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@WebProfiler/Profiler/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_a075cf900f307ed137b6b3c33cd85155cdf24dac5fdb630ea28cf3cb83d66257 = $this->env->getExtension("native_profiler");
        $__internal_a075cf900f307ed137b6b3c33cd85155cdf24dac5fdb630ea28cf3cb83d66257->enter($__internal_a075cf900f307ed137b6b3c33cd85155cdf24dac5fdb630ea28cf3cb83d66257_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_a075cf900f307ed137b6b3c33cd85155cdf24dac5fdb630ea28cf3cb83d66257->leave($__internal_a075cf900f307ed137b6b3c33cd85155cdf24dac5fdb630ea28cf3cb83d66257_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_1db5f5c9304d2d4c2ab96bc5dfeb68c8362a3068a649cb119c99dd7e9e436f27 = $this->env->getExtension("native_profiler");
        $__internal_1db5f5c9304d2d4c2ab96bc5dfeb68c8362a3068a649cb119c99dd7e9e436f27->enter($__internal_1db5f5c9304d2d4c2ab96bc5dfeb68c8362a3068a649cb119c99dd7e9e436f27_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_1db5f5c9304d2d4c2ab96bc5dfeb68c8362a3068a649cb119c99dd7e9e436f27->leave($__internal_1db5f5c9304d2d4c2ab96bc5dfeb68c8362a3068a649cb119c99dd7e9e436f27_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_efb5a83f7389a932f58457eb6c50b3b53af254318d24e1ba78bcdbce6c502b33 = $this->env->getExtension("native_profiler");
        $__internal_efb5a83f7389a932f58457eb6c50b3b53af254318d24e1ba78bcdbce6c502b33->enter($__internal_efb5a83f7389a932f58457eb6c50b3b53af254318d24e1ba78bcdbce6c502b33_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_efb5a83f7389a932f58457eb6c50b3b53af254318d24e1ba78bcdbce6c502b33->leave($__internal_efb5a83f7389a932f58457eb6c50b3b53af254318d24e1ba78bcdbce6c502b33_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_29a15c9f24ce1cfec8180820ee863b62af0c10317d62ad1093eea301ad5a0ecd = $this->env->getExtension("native_profiler");
        $__internal_29a15c9f24ce1cfec8180820ee863b62af0c10317d62ad1093eea301ad5a0ecd->enter($__internal_29a15c9f24ce1cfec8180820ee863b62af0c10317d62ad1093eea301ad5a0ecd_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_29a15c9f24ce1cfec8180820ee863b62af0c10317d62ad1093eea301ad5a0ecd->leave($__internal_29a15c9f24ce1cfec8180820ee863b62af0c10317d62ad1093eea301ad5a0ecd_prof);

    }

    public function getTemplateName()
    {
        return "@WebProfiler/Collector/router.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 13,  67 => 12,  56 => 7,  53 => 6,  47 => 5,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@WebProfiler/Profiler/layout.html.twig' %}*/
/* */
/* {% block toolbar %}{% endblock %}*/
/* */
/* {% block menu %}*/
/* <span class="label">*/
/*     <span class="icon">{{ include('@WebProfiler/Icon/router.svg') }}</span>*/
/*     <strong>Routing</strong>*/
/* </span>*/
/* {% endblock %}*/
/* */
/* {% block panel %}*/
/*     {{ render(path('_profiler_router', { token: token })) }}*/
/* {% endblock %}*/
/* */
