<?php

/* @Twig/Exception/exception_full.html.twig */
class __TwigTemplate_3b225ae1e93f33bff2795b129878554fec96cb3817df569a9fe821d22a83ad93 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("@Twig/layout.html.twig", "@Twig/Exception/exception_full.html.twig", 1);
        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'title' => array($this, 'block_title'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "@Twig/layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1c14fdc6f126a2576488f428f387dc4e9481a43b47886c6ce390ab78e5568a9e = $this->env->getExtension("native_profiler");
        $__internal_1c14fdc6f126a2576488f428f387dc4e9481a43b47886c6ce390ab78e5568a9e->enter($__internal_1c14fdc6f126a2576488f428f387dc4e9481a43b47886c6ce390ab78e5568a9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_1c14fdc6f126a2576488f428f387dc4e9481a43b47886c6ce390ab78e5568a9e->leave($__internal_1c14fdc6f126a2576488f428f387dc4e9481a43b47886c6ce390ab78e5568a9e_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_c864165df6c7eeed5e7f3fb3330715f206bdeff6549538e391a692471bb5e595 = $this->env->getExtension("native_profiler");
        $__internal_c864165df6c7eeed5e7f3fb3330715f206bdeff6549538e391a692471bb5e595->enter($__internal_c864165df6c7eeed5e7f3fb3330715f206bdeff6549538e391a692471bb5e595_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_c864165df6c7eeed5e7f3fb3330715f206bdeff6549538e391a692471bb5e595->leave($__internal_c864165df6c7eeed5e7f3fb3330715f206bdeff6549538e391a692471bb5e595_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_06f2dd2c49cf027b8f581a553e774fe5e91e3c23387a145a8529dabedd613e1c = $this->env->getExtension("native_profiler");
        $__internal_06f2dd2c49cf027b8f581a553e774fe5e91e3c23387a145a8529dabedd613e1c->enter($__internal_06f2dd2c49cf027b8f581a553e774fe5e91e3c23387a145a8529dabedd613e1c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_06f2dd2c49cf027b8f581a553e774fe5e91e3c23387a145a8529dabedd613e1c->leave($__internal_06f2dd2c49cf027b8f581a553e774fe5e91e3c23387a145a8529dabedd613e1c_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_a9f6490e636dca426292b45496e8d2bf8df2b7c13395b455e1ff0b79a5d39f9e = $this->env->getExtension("native_profiler");
        $__internal_a9f6490e636dca426292b45496e8d2bf8df2b7c13395b455e1ff0b79a5d39f9e->enter($__internal_a9f6490e636dca426292b45496e8d2bf8df2b7c13395b455e1ff0b79a5d39f9e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_a9f6490e636dca426292b45496e8d2bf8df2b7c13395b455e1ff0b79a5d39f9e->leave($__internal_a9f6490e636dca426292b45496e8d2bf8df2b7c13395b455e1ff0b79a5d39f9e_prof);

    }

    public function getTemplateName()
    {
        return "@Twig/Exception/exception_full.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 12,  72 => 11,  58 => 8,  52 => 7,  42 => 4,  36 => 3,  11 => 1,);
    }
}
/* {% extends '@Twig/layout.html.twig' %}*/
/* */
/* {% block head %}*/
/*     <link href="{{ absolute_url(asset('bundles/framework/css/exception.css')) }}" rel="stylesheet" type="text/css" media="all" />*/
/* {% endblock %}*/
/* */
/* {% block title %}*/
/*     {{ exception.message }} ({{ status_code }} {{ status_text }})*/
/* {% endblock %}*/
/* */
/* {% block body %}*/
/*     {% include '@Twig/Exception/exception.html.twig' %}*/
/* {% endblock %}*/
/* */
