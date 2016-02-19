<?php

/* FOSUserBundle:Registration:register.html.twig */
class __TwigTemplate_35beac095389c16ebe50cbcab1103b430bf2e0fdd64041c623b796b73a193084 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("FOSUserBundle::layout.html.twig", "FOSUserBundle:Registration:register.html.twig", 1);
        $this->blocks = array(
            'fos_user_content' => array($this, 'block_fos_user_content'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "FOSUserBundle::layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_749006cf48c22a8ab505cd11b23e40800970180e9f623eb4c3c88f3669bc663c = $this->env->getExtension("native_profiler");
        $__internal_749006cf48c22a8ab505cd11b23e40800970180e9f623eb4c3c88f3669bc663c->enter($__internal_749006cf48c22a8ab505cd11b23e40800970180e9f623eb4c3c88f3669bc663c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "FOSUserBundle:Registration:register.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_749006cf48c22a8ab505cd11b23e40800970180e9f623eb4c3c88f3669bc663c->leave($__internal_749006cf48c22a8ab505cd11b23e40800970180e9f623eb4c3c88f3669bc663c_prof);

    }

    // line 3
    public function block_fos_user_content($context, array $blocks = array())
    {
        $__internal_98d9aa27b422ba4fdaddbdb10b9f78dfd2b3366101879fdb50b10e556eee4560 = $this->env->getExtension("native_profiler");
        $__internal_98d9aa27b422ba4fdaddbdb10b9f78dfd2b3366101879fdb50b10e556eee4560->enter($__internal_98d9aa27b422ba4fdaddbdb10b9f78dfd2b3366101879fdb50b10e556eee4560_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "fos_user_content"));

        // line 4
        $this->loadTemplate("FOSUserBundle:Registration:register_content.html.twig", "FOSUserBundle:Registration:register.html.twig", 4)->display($context);
        
        $__internal_98d9aa27b422ba4fdaddbdb10b9f78dfd2b3366101879fdb50b10e556eee4560->leave($__internal_98d9aa27b422ba4fdaddbdb10b9f78dfd2b3366101879fdb50b10e556eee4560_prof);

    }

    public function getTemplateName()
    {
        return "FOSUserBundle:Registration:register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends "FOSUserBundle::layout.html.twig" %}*/
/* */
/* {% block fos_user_content %}*/
/* {% include "FOSUserBundle:Registration:register_content.html.twig" %}*/
/* {% endblock fos_user_content %}*/
/* */
