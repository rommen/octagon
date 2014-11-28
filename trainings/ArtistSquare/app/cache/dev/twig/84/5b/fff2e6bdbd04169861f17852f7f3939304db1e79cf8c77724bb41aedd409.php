<?php

/* index.html.twig */
class __TwigTemplate_845bfff2e6bdbd04169861f17852f7f3939304db1e79cf8c77724bb41aedd409 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("base.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
            'navigation' => array($this, 'block_navigation'),
            'navigationAuthentication' => array($this, 'block_navigationAuthentication'),
            'header' => array($this, 'block_header'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = array())
    {
        // line 3
        echo "
    ";
        // line 4
        $this->displayBlock('navigation', $context, $blocks);
        // line 39
        $this->displayBlock('header', $context, $blocks);
        // line 40
        echo "
<div id=\"content\" style=\"margin-top:58px;\">
    ";
        // line 42
        $this->displayBlock('content', $context, $blocks);
        // line 44
        echo "</div>
";
        // line 45
        $this->displayBlock('footer', $context, $blocks);
        // line 57
        echo "
";
    }

    // line 4
    public function block_navigation($context, array $blocks = array())
    {
        // line 5
        echo "        <nav id=\"top-navigation\" class=\"navbar navbar-default navbar-fixed-top\" role=\"navigation\">
            <div class=\"container-fluid\">
                <ul class=\"nav navbar-nav\" > 
                    <li class=\"dropdown active\">
                        <a id=\"logo\" href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">
                            <img style=\"margin-left: 20px\" height=\"25px\" src=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/apple-touch-icon.png"), "html", null, true);
        echo "\"/>
                            ArtistSquare
                        </a>
                        <ul class=\"dropdown-menu\" role=\"menu\">
                            <li><a href=\"#\">Photograpy</a></li>
                            <li><a href=\"#\">Biser</a></li>
                            <li><a href=\"#\">Video</a></li>
                            <li><a href=\"#\">Vishivka</a></li>
                            <li><a href=\"#\">Vizanije</a></li>
                            <li><a href=\"#\">Origamy</a></li>
                            <li><a href=\"#\">Paintings/Drawings</a></li>
                        </ul>                    
                    </li>                    
                </ul>               

                <ul class=\"nav navbar-nav navbar-left\">
                    <li><a href=\"";
        // line 26
        echo $this->env->getExtension('routing')->getPath("_home");
        echo "\">Home</a></li>
                    <li><a href=\"";
        // line 27
        echo $this->env->getExtension('routing')->getPath("_galleries");
        echo "\">Galleries</a></li>
                    <li><a href=\"";
        // line 28
        echo $this->env->getExtension('routing')->getPath("_galleries");
        echo "\">Blog</a></li>
                </ul>
                <ul class=\"nav navbar-nav navbar-right\" style=\"margin-right: 20px\">
                    ";
        // line 31
        $this->displayBlock('navigationAuthentication', $context, $blocks);
        // line 35
        echo "                </ul>
            </div><!-- /.container-fluid -->
        </nav>
    ";
    }

    // line 31
    public function block_navigationAuthentication($context, array $blocks = array())
    {
        // line 32
        echo "                        <li><a href=\"#\">Sign up</a></li>
                        <li><a href=\"#\">Login</a></li>
                        ";
    }

    // line 39
    public function block_header($context, array $blocks = array())
    {
    }

    // line 42
    public function block_content($context, array $blocks = array())
    {
        // line 43
        echo "    ";
    }

    // line 45
    public function block_footer($context, array $blocks = array())
    {
        // line 46
        echo "    <div id=\"footer\">
            <span style=\"margin-left:15px\">(c) All rights server by Romans Grišins</span>
            <div style=\"float:right;\">
                <img src=\"";
        // line 49
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/social/small/facebook.png"), "html", null, true);
        echo "\"/>
                <img src=\"";
        // line 50
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/social/small/mail.png"), "html", null, true);
        echo "\"/>
                <img src=\"";
        // line 51
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/social/small/rss.png"), "html", null, true);
        echo "\"/>
                <img src=\"";
        // line 52
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/social/small/twitter.png"), "html", null, true);
        echo "\"/>
                <img src=\"";
        // line 53
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("images/social/small/youtube.png"), "html", null, true);
        echo "\"/>
            </div>
    </div>
";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 53,  152 => 52,  148 => 51,  144 => 50,  140 => 49,  135 => 46,  132 => 45,  128 => 43,  125 => 42,  120 => 39,  114 => 32,  111 => 31,  104 => 35,  102 => 31,  96 => 28,  92 => 27,  88 => 26,  69 => 10,  62 => 5,  59 => 4,  54 => 57,  52 => 45,  49 => 44,  47 => 42,  43 => 40,  41 => 39,  39 => 4,  36 => 3,  33 => 2,  31 => 4,  28 => 3,);
    }
}
