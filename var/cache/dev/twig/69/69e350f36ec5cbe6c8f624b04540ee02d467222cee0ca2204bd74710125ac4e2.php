<?php

/* NotificationBundle:Notification:index.html.twig */
class __TwigTemplate_e926894eaae832009a3e95d0065e5a3f955814f96d1c892331f2e9f1fad5db24 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_992adc9504b37dc760aacd2d0bd25bcdf9e026b2f174253fab31590cc77b2ff3 = $this->env->getExtension("native_profiler");
        $__internal_992adc9504b37dc760aacd2d0bd25bcdf9e026b2f174253fab31590cc77b2ff3->enter($__internal_992adc9504b37dc760aacd2d0bd25bcdf9e026b2f174253fab31590cc77b2ff3_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "NotificationBundle:Notification:index.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\">
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    </head>
    <body>
\t\t<div id=\"content\">
  <header class=\"header\" id=\"page-header\">
    <div class=\"content-wrap\">
      <h1 class=\"image-text home\">Reconversion Pro</h1>
      <nav>
        <ul>
          <li class=\"nav-item\"><a class=\"round-btn\" href=\"#\">Notre démarche</a></li>
          <li class=\"nav-item\"><a class=\"round-btn\" href=\"#\">Les étapes</a></li>
          <li class=\"nav-item\"><a class=\"round-btn\" href=\"#\">Témoignages</a></li>
          <li class=\"nav-item\"><a class=\"round-btn\" href=\"#\">FAQ</a></li>
          <li class=\"nav-item\"><a class=\"round-btn\" href=\"#\">Liens utiles</a></li>
          <li class=\"nav-item\"><a class=\"round-btn\" href=\"#\">Contact</a></li>
          <li class=\"user-action\"> <a href=\"#\" class=\"round-btn fill-btn\">Connexion</a> </li>
        </ul>
      </nav>
    </div>
  </header>
  <nav class=\"subnav\">
    <ul class=\"content-wrap\">
      <li class=\"accueil ui-state-active\"> <a href=\"#\">Mon accueil</a> </li>
      <li class=\"library\"> <a href=\"#\">Ma bibliothèque</a> </li>
      <li class=\"agenda\"> <a href=\"#\">Mon agenda</a> </li>
      <li class=\"messagerie\"> <a href=\"#\">Ma messagerie <i>1</i></a> </li>
      <li class=\"notifications\"> <a href=\"#\">Mes notifications <i>7</i></a> </li>
      <li class=\"personal\"> <a href=\"#\">Mes informations</a> </li>
    </ul>
  </nav>
  <main role=\"main\" class=\"main\">

  </main>
  <footer class=\"footer fixed-footer\">
    <div class=\"content-wrap clearfix\">
      <p class=\"ml\"> Formation continue  / 2015 <a href=\"#\">Mentions légales</a></p>
    </div>
  </footer>
</div>
    </body>
</html>";
        
        $__internal_992adc9504b37dc760aacd2d0bd25bcdf9e026b2f174253fab31590cc77b2ff3->leave($__internal_992adc9504b37dc760aacd2d0bd25bcdf9e026b2f174253fab31590cc77b2ff3_prof);

    }

    public function block_title($context, array $blocks = array())
    {
        $__internal_bc484cc5016292800b4d689dde1b3994cc7a6e823088235fec7243105ee45555 = $this->env->getExtension("native_profiler");
        $__internal_bc484cc5016292800b4d689dde1b3994cc7a6e823088235fec7243105ee45555->enter($__internal_bc484cc5016292800b4d689dde1b3994cc7a6e823088235fec7243105ee45555_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Notifications";
        
        $__internal_bc484cc5016292800b4d689dde1b3994cc7a6e823088235fec7243105ee45555->leave($__internal_bc484cc5016292800b4d689dde1b3994cc7a6e823088235fec7243105ee45555_prof);

    }

    public function getTemplateName()
    {
        return "NotificationBundle:Notification:index.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  29 => 5,  23 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8">*/
/*         <title>{% block title %}Notifications{% endblock %}</title>*/
/*     </head>*/
/*     <body>*/
/* 		<div id="content">*/
/*   <header class="header" id="page-header">*/
/*     <div class="content-wrap">*/
/*       <h1 class="image-text home">Reconversion Pro</h1>*/
/*       <nav>*/
/*         <ul>*/
/*           <li class="nav-item"><a class="round-btn" href="#">Notre démarche</a></li>*/
/*           <li class="nav-item"><a class="round-btn" href="#">Les étapes</a></li>*/
/*           <li class="nav-item"><a class="round-btn" href="#">Témoignages</a></li>*/
/*           <li class="nav-item"><a class="round-btn" href="#">FAQ</a></li>*/
/*           <li class="nav-item"><a class="round-btn" href="#">Liens utiles</a></li>*/
/*           <li class="nav-item"><a class="round-btn" href="#">Contact</a></li>*/
/*           <li class="user-action"> <a href="#" class="round-btn fill-btn">Connexion</a> </li>*/
/*         </ul>*/
/*       </nav>*/
/*     </div>*/
/*   </header>*/
/*   <nav class="subnav">*/
/*     <ul class="content-wrap">*/
/*       <li class="accueil ui-state-active"> <a href="#">Mon accueil</a> </li>*/
/*       <li class="library"> <a href="#">Ma bibliothèque</a> </li>*/
/*       <li class="agenda"> <a href="#">Mon agenda</a> </li>*/
/*       <li class="messagerie"> <a href="#">Ma messagerie <i>1</i></a> </li>*/
/*       <li class="notifications"> <a href="#">Mes notifications <i>7</i></a> </li>*/
/*       <li class="personal"> <a href="#">Mes informations</a> </li>*/
/*     </ul>*/
/*   </nav>*/
/*   <main role="main" class="main">*/
/* */
/*   </main>*/
/*   <footer class="footer fixed-footer">*/
/*     <div class="content-wrap clearfix">*/
/*       <p class="ml"> Formation continue  / 2015 <a href="#">Mentions légales</a></p>*/
/*     </div>*/
/*   </footer>*/
/* </div>*/
/*     </body>*/
/* </html>*/
