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
        $__internal_b32a1fa6607771d61355fa826b50aa4bbae41b616c91cbd71e3c6cc343269dd9 = $this->env->getExtension("native_profiler");
        $__internal_b32a1fa6607771d61355fa826b50aa4bbae41b616c91cbd71e3c6cc343269dd9->enter($__internal_b32a1fa6607771d61355fa826b50aa4bbae41b616c91cbd71e3c6cc343269dd9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Twig/Exception/exception_full.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_b32a1fa6607771d61355fa826b50aa4bbae41b616c91cbd71e3c6cc343269dd9->leave($__internal_b32a1fa6607771d61355fa826b50aa4bbae41b616c91cbd71e3c6cc343269dd9_prof);

    }

    // line 3
    public function block_head($context, array $blocks = array())
    {
        $__internal_6a09a8513eff5892f54343c155eae0bd1c353df8886c0c9283343cdc5710e3db = $this->env->getExtension("native_profiler");
        $__internal_6a09a8513eff5892f54343c155eae0bd1c353df8886c0c9283343cdc5710e3db->enter($__internal_6a09a8513eff5892f54343c155eae0bd1c353df8886c0c9283343cdc5710e3db_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "head"));

        // line 4
        echo "    <link href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('request')->generateAbsoluteUrl($this->env->getExtension('asset')->getAssetUrl("bundles/framework/css/exception.css")), "html", null, true);
        echo "\" rel=\"stylesheet\" type=\"text/css\" media=\"all\" />
";
        
        $__internal_6a09a8513eff5892f54343c155eae0bd1c353df8886c0c9283343cdc5710e3db->leave($__internal_6a09a8513eff5892f54343c155eae0bd1c353df8886c0c9283343cdc5710e3db_prof);

    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        $__internal_1d611bb22f93be0a8da7e412587e0188fbd6e3d5335387f3bd93bb9c2ee025c9 = $this->env->getExtension("native_profiler");
        $__internal_1d611bb22f93be0a8da7e412587e0188fbd6e3d5335387f3bd93bb9c2ee025c9->enter($__internal_1d611bb22f93be0a8da7e412587e0188fbd6e3d5335387f3bd93bb9c2ee025c9_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        // line 8
        echo "    ";
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["exception"]) ? $context["exception"] : $this->getContext($context, "exception")), "message", array()), "html", null, true);
        echo " (";
        echo twig_escape_filter($this->env, (isset($context["status_code"]) ? $context["status_code"] : $this->getContext($context, "status_code")), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, (isset($context["status_text"]) ? $context["status_text"] : $this->getContext($context, "status_text")), "html", null, true);
        echo ")
";
        
        $__internal_1d611bb22f93be0a8da7e412587e0188fbd6e3d5335387f3bd93bb9c2ee025c9->leave($__internal_1d611bb22f93be0a8da7e412587e0188fbd6e3d5335387f3bd93bb9c2ee025c9_prof);

    }

    // line 11
    public function block_body($context, array $blocks = array())
    {
        $__internal_9045af204e748a9de53e55f4dd839001e555780341aec8964527224f0f8f9c6d = $this->env->getExtension("native_profiler");
        $__internal_9045af204e748a9de53e55f4dd839001e555780341aec8964527224f0f8f9c6d->enter($__internal_9045af204e748a9de53e55f4dd839001e555780341aec8964527224f0f8f9c6d_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "body"));

        // line 12
        echo "    ";
        $this->loadTemplate("@Twig/Exception/exception.html.twig", "@Twig/Exception/exception_full.html.twig", 12)->display($context);
        
        $__internal_9045af204e748a9de53e55f4dd839001e555780341aec8964527224f0f8f9c6d->leave($__internal_9045af204e748a9de53e55f4dd839001e555780341aec8964527224f0f8f9c6d_prof);

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
