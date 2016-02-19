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
        $__internal_89bfc4d0ca5282c236c756c6fc4a318412c6acb7591ee7506dbbbe052f18697e = $this->env->getExtension("native_profiler");
        $__internal_89bfc4d0ca5282c236c756c6fc4a318412c6acb7591ee7506dbbbe052f18697e->enter($__internal_89bfc4d0ca5282c236c756c6fc4a318412c6acb7591ee7506dbbbe052f18697e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@WebProfiler/Collector/router.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_89bfc4d0ca5282c236c756c6fc4a318412c6acb7591ee7506dbbbe052f18697e->leave($__internal_89bfc4d0ca5282c236c756c6fc4a318412c6acb7591ee7506dbbbe052f18697e_prof);

    }

    // line 3
    public function block_toolbar($context, array $blocks = array())
    {
        $__internal_8aacd2c90757de90f82223d21b64a1133b68ebcab609b5be9587b1b232545b5a = $this->env->getExtension("native_profiler");
        $__internal_8aacd2c90757de90f82223d21b64a1133b68ebcab609b5be9587b1b232545b5a->enter($__internal_8aacd2c90757de90f82223d21b64a1133b68ebcab609b5be9587b1b232545b5a_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "toolbar"));

        
        $__internal_8aacd2c90757de90f82223d21b64a1133b68ebcab609b5be9587b1b232545b5a->leave($__internal_8aacd2c90757de90f82223d21b64a1133b68ebcab609b5be9587b1b232545b5a_prof);

    }

    // line 5
    public function block_menu($context, array $blocks = array())
    {
        $__internal_ab8250d3164343a8cfdf536c68e2b64cd1316541d1102db1a06af1ac942540c2 = $this->env->getExtension("native_profiler");
        $__internal_ab8250d3164343a8cfdf536c68e2b64cd1316541d1102db1a06af1ac942540c2->enter($__internal_ab8250d3164343a8cfdf536c68e2b64cd1316541d1102db1a06af1ac942540c2_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 6
        echo "<span class=\"label\">
    <span class=\"icon\">";
        // line 7
        echo twig_include($this->env, $context, "@WebProfiler/Icon/router.svg");
        echo "</span>
    <strong>Routing</strong>
</span>
";
        
        $__internal_ab8250d3164343a8cfdf536c68e2b64cd1316541d1102db1a06af1ac942540c2->leave($__internal_ab8250d3164343a8cfdf536c68e2b64cd1316541d1102db1a06af1ac942540c2_prof);

    }

    // line 12
    public function block_panel($context, array $blocks = array())
    {
        $__internal_e9a84272db110a6c0e1700fe2e3600d84922333374e8851b813fcfb225b59548 = $this->env->getExtension("native_profiler");
        $__internal_e9a84272db110a6c0e1700fe2e3600d84922333374e8851b813fcfb225b59548->enter($__internal_e9a84272db110a6c0e1700fe2e3600d84922333374e8851b813fcfb225b59548_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        // line 13
        echo "    ";
        echo $this->env->getExtension('http_kernel')->renderFragment($this->env->getExtension('routing')->getPath("_profiler_router", array("token" => (isset($context["token"]) ? $context["token"] : $this->getContext($context, "token")))));
        echo "
";
        
        $__internal_e9a84272db110a6c0e1700fe2e3600d84922333374e8851b813fcfb225b59548->leave($__internal_e9a84272db110a6c0e1700fe2e3600d84922333374e8851b813fcfb225b59548_prof);

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
