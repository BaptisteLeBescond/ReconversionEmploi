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
        $__internal_df089223e398945a7041200b62a3779f8c77788dfdf05874b309a03dcc354ed9 = $this->env->getExtension("native_profiler");
        $__internal_df089223e398945a7041200b62a3779f8c77788dfdf05874b309a03dcc354ed9->enter($__internal_df089223e398945a7041200b62a3779f8c77788dfdf05874b309a03dcc354ed9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_df089223e398945a7041200b62a3779f8c77788dfdf05874b309a03dcc354ed9->leave($__internal_df089223e398945a7041200b62a3779f8c77788dfdf05874b309a03dcc354ed9_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_4ddd6bc139d79029682ea48b05c1df4fa5db80abf0081bf2029027967b563803 = $this->env->getExtension("native_profiler");
        $__internal_4ddd6bc139d79029682ea48b05c1df4fa5db80abf0081bf2029027967b563803->enter($__internal_4ddd6bc139d79029682ea48b05c1df4fa5db80abf0081bf2029027967b563803_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_4ddd6bc139d79029682ea48b05c1df4fa5db80abf0081bf2029027967b563803->leave($__internal_4ddd6bc139d79029682ea48b05c1df4fa5db80abf0081bf2029027967b563803_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_ea2e40ece71905d1161e4797441d2f474b2ae4b1e8a915809cf843b3d2c752d5 = $this->env->getExtension("native_profiler");
        $__internal_ea2e40ece71905d1161e4797441d2f474b2ae4b1e8a915809cf843b3d2c752d5->enter($__internal_ea2e40ece71905d1161e4797441d2f474b2ae4b1e8a915809cf843b3d2c752d5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_ea2e40ece71905d1161e4797441d2f474b2ae4b1e8a915809cf843b3d2c752d5->leave($__internal_ea2e40ece71905d1161e4797441d2f474b2ae4b1e8a915809cf843b3d2c752d5_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_2a95ad60e6abe73b3e402cae9fb65cdf76dcf3cb20a44505f2909186a2ac78d8 = $this->env->getExtension("native_profiler");
        $__internal_2a95ad60e6abe73b3e402cae9fb65cdf76dcf3cb20a44505f2909186a2ac78d8->enter($__internal_2a95ad60e6abe73b3e402cae9fb65cdf76dcf3cb20a44505f2909186a2ac78d8_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_2a95ad60e6abe73b3e402cae9fb65cdf76dcf3cb20a44505f2909186a2ac78d8->leave($__internal_2a95ad60e6abe73b3e402cae9fb65cdf76dcf3cb20a44505f2909186a2ac78d8_prof);

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
