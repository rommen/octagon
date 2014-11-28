<?php

/* base.html.twig */
class __TwigTemplate_5bab4252a6980e23f9a1f86305bdfcc0392ba06cf86380e161676ae32cf9f1ca extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'javascripts' => array($this, 'block_javascripts'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'body' => array($this, 'block_body'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

        <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>

        <!-- jQuery (necessary for Bootstraps JavaScript plugins) -->
        <script src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/jquery.js"), "html", null, true);
        echo "\"></script>
        <!-- Include all JavaScripts, compiled by Assetic -->
        <script src=\"";
        // line 12
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("js/bootstrap.js"), "html", null, true);
        echo "\"></script>
        <!-- Bootstrap -->
        <link href=\"";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/bootstrap.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">

        <!-- HTML5 Shim and Respond.js add IE8 support of HTML5 elements and media queries -->
        ";
        // line 17
        $this->env->loadTemplate("BraincraftedBootstrapBundle::ie8-support.html.twig")->display($context);
        // line 18
        echo "
        <link href=\"";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("css/main.css"), "html", null, true);
        echo "\" rel=\"stylesheet\" media=\"screen\">

        ";
        // line 21
        $this->displayBlock('javascripts', $context, $blocks);
        // line 22
        echo "        ";
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 23
        echo "</head>
<body>
    ";
        // line 25
        $this->displayBlock('body', $context, $blocks);
        // line 26
        echo "        
</body>
</html>
";
    }

    // line 7
    public function block_title($context, array $blocks = array())
    {
        echo "Welcome!";
    }

    // line 21
    public function block_javascripts($context, array $blocks = array())
    {
    }

    // line 22
    public function block_stylesheets($context, array $blocks = array())
    {
    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        // line 26
        echo "    ";
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
        return array (  100 => 26,  97 => 25,  87 => 21,  81 => 7,  74 => 26,  72 => 25,  68 => 23,  65 => 22,  63 => 21,  58 => 19,  55 => 18,  53 => 17,  42 => 12,  37 => 10,  23 => 1,  156 => 53,  152 => 52,  148 => 51,  144 => 50,  140 => 49,  135 => 46,  132 => 45,  128 => 43,  125 => 42,  120 => 39,  114 => 32,  111 => 31,  104 => 35,  102 => 31,  96 => 28,  92 => 22,  88 => 26,  69 => 10,  62 => 5,  59 => 4,  54 => 57,  52 => 45,  49 => 44,  47 => 14,  43 => 40,  41 => 39,  39 => 4,  36 => 3,  33 => 2,  31 => 7,  28 => 3,);
    }
}
