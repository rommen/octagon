<?php

/* ArtistBundle:Gallery:gallery_fence.html.twig */
class __TwigTemplate_24b33018b522170a1586758e424451b6754e71d6cb4ce9be6dd5ebf00d7f02d1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<a href=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("_gallery", array("id" => $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : $this->getContext($context, "gallery")), "hashId"))), "html", null, true);
        echo "\">
    <div class=\"gallery_fence\">
        <div class=\"fence_image\">
            <img src=\"/image\" alt=\"no image\"/>
            <div class=\"fence_rate\">
                <div>
                    <span class=\"fence_views glyphicon glyphicon-eye-open\" style=\"padding-left: 4px\">
                    </span>
                        3,565
                    <span class=\"fence_likes glyphicon glyphicon-thumbs-up\" >
                    </span>
                        67
                    <span class=\"fence_shares glyphicon glyphicon-share\">
                    </span>
                        78
                </div>
            </div>
        </div>    
        <div class=\"fence_text\">
            <span class=\"fence_gallery_title glyphicon\">";
        // line 20
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : $this->getContext($context, "gallery")), "name"), "html", null, true);
        echo "</span><br/>
            <span class=\"fence_gallery_descr\">";
        // line 21
        echo twig_escape_filter($this->env, $this->getAttribute((isset($context["gallery"]) ? $context["gallery"] : $this->getContext($context, "gallery")), "description"), "html", null, true);
        echo "</span>        
        </div>    
    </div>
</a>


";
    }

    public function getTemplateName()
    {
        return "ArtistBundle:Gallery:gallery_fence.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  46 => 21,  42 => 20,  19 => 1,);
    }
}
