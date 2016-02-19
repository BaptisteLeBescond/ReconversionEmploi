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
        $__internal_d95f81c361621e625f691fdaee2958fc3133c470740184167670c3dfc2999971 = $this->env->getExtension("native_profiler");
        $__internal_d95f81c361621e625f691fdaee2958fc3133c470740184167670c3dfc2999971->enter($__internal_d95f81c361621e625f691fdaee2958fc3133c470740184167670c3dfc2999971_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_d95f81c361621e625f691fdaee2958fc3133c470740184167670c3dfc2999971->leave($__internal_d95f81c361621e625f691fdaee2958fc3133c470740184167670c3dfc2999971_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_1daac3bc2a254483cf34c893fccf7456165147d9374b0ac9128a6e8e5e98e04f = $this->env->getExtension("native_profiler");
        $__internal_1daac3bc2a254483cf34c893fccf7456165147d9374b0ac9128a6e8e5e98e04f->enter($__internal_1daac3bc2a254483cf34c893fccf7456165147d9374b0ac9128a6e8e5e98e04f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_1daac3bc2a254483cf34c893fccf7456165147d9374b0ac9128a6e8e5e98e04f->leave($__internal_1daac3bc2a254483cf34c893fccf7456165147d9374b0ac9128a6e8e5e98e04f_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_f84a1f1a10f3d1bcee8e2aaa360d5841e07e62adb1ee782b395eaf23cf957168 = $this->env->getExtension("native_profiler");
        $__internal_f84a1f1a10f3d1bcee8e2aaa360d5841e07e62adb1ee782b395eaf23cf957168->enter($__internal_f84a1f1a10f3d1bcee8e2aaa360d5841e07e62adb1ee782b395eaf23cf957168_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_f84a1f1a10f3d1bcee8e2aaa360d5841e07e62adb1ee782b395eaf23cf957168->leave($__internal_f84a1f1a10f3d1bcee8e2aaa360d5841e07e62adb1ee782b395eaf23cf957168_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_f37755e6d1d4002f974532948284b37a82d1e231a85e1fc760fd1c580c860338 = $this->env->getExtension("native_profiler");
        $__internal_f37755e6d1d4002f974532948284b37a82d1e231a85e1fc760fd1c580c860338->enter($__internal_f37755e6d1d4002f974532948284b37a82d1e231a85e1fc760fd1c580c860338_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_f37755e6d1d4002f974532948284b37a82d1e231a85e1fc760fd1c580c860338->leave($__internal_f37755e6d1d4002f974532948284b37a82d1e231a85e1fc760fd1c580c860338_prof);

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
