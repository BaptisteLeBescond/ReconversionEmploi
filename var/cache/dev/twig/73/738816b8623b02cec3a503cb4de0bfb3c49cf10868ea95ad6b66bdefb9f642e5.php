<?php

/* base.html.twig */
class __TwigTemplate_5238c2fea0d66221fcefdc9ed64a187d2a400325479cc200801993ce8d2975cb extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_817279f1c865430c4f8412ad81a3d1b8871523a8836576d9bc1f8703a79dce55 = $this->env->getExtension("native_profiler");
        $__internal_817279f1c865430c4f8412ad81a3d1b8871523a8836576d9bc1f8703a79dce55->enter($__internal_817279f1c865430c4f8412ad81a3d1b8871523a8836576d9bc1f8703a79dce55_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 7
        echo "        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
    </head>
    <body>
        ";
        // line 10
        $this->displayBlock('body', $context, $blocks);
        // line 11
        echo "        ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 12
        echo "    </body>
</html>
";
        
        $__internal_817279f1c865430c4f8412ad81a3d1b8871523a8836576d9bc1f8703a79dce55->leave($__internal_817279f1c865430c4f8412ad81a3d1b8871523a8836576d9bc1f8703a79dce55_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_f09a05c79cf2186184c0c2a72c3997a095432c64f2a6e13f65d531286ccb5225 = $this->env->getExtension("native_profiler");
        $__internal_f09a05c79cf2186184c0c2a72c3997a095432c64f2a6e13f65d531286ccb5225->enter($__internal_f09a05c79cf2186184c0c2a72c3997a095432c64f2a6e13f65d531286ccb5225_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_f09a05c79cf2186184c0c2a72c3997a095432c64f2a6e13f65d531286ccb5225->leave($__internal_f09a05c79cf2186184c0c2a72c3997a095432c64f2a6e13f65d531286ccb5225_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_55139c4353dc1edf2397cbf2ef5c575f793e4ea454e55a00aa7e2f1633d76869 = $this->env->getExtension("native_profiler");
        $__internal_55139c4353dc1edf2397cbf2ef5c575f793e4ea454e55a00aa7e2f1633d76869->enter($__internal_55139c4353dc1edf2397cbf2ef5c575f793e4ea454e55a00aa7e2f1633d76869_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        
        $__internal_55139c4353dc1edf2397cbf2ef5c575f793e4ea454e55a00aa7e2f1633d76869->leave($__internal_55139c4353dc1edf2397cbf2ef5c575f793e4ea454e55a00aa7e2f1633d76869_prof);

    }

    // line 10
    public function block_body($context, array $blocks = array())
    {
        $__internal_3417996454fdad7ac93010e56dedfe3918e920b9ef32b61984f17ab13103f7c4 = $this->env->getExtension("native_profiler");
        $__internal_3417996454fdad7ac93010e56dedfe3918e920b9ef32b61984f17ab13103f7c4->enter($__internal_3417996454fdad7ac93010e56dedfe3918e920b9ef32b61984f17ab13103f7c4_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_3417996454fdad7ac93010e56dedfe3918e920b9ef32b61984f17ab13103f7c4->leave($__internal_3417996454fdad7ac93010e56dedfe3918e920b9ef32b61984f17ab13103f7c4_prof);

    }

    // line 11
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_49eba448c8fbae30297305c658a2555330bf34155fca3b5bd8fb7e02033e9288 = $this->env->getExtension("native_profiler");
        $__internal_49eba448c8fbae30297305c658a2555330bf34155fca3b5bd8fb7e02033e9288->enter($__internal_49eba448c8fbae30297305c658a2555330bf34155fca3b5bd8fb7e02033e9288_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_49eba448c8fbae30297305c658a2555330bf34155fca3b5bd8fb7e02033e9288->leave($__internal_49eba448c8fbae30297305c658a2555330bf34155fca3b5bd8fb7e02033e9288_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  93 => 11,  82 => 10,  71 => 6,  59 => 5,  50 => 12,  47 => 11,  45 => 10,  38 => 7,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}{% endblock %}*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*     </head>*/
/*     <body>*/
/*         {% block body %}{% endblock %}*/
/*         {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
