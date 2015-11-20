<?php
namespace TheCodingMachine\Quiz\Controllers;

use Mouf\Mvc\Splash\Controllers\Controller;
use Mouf\Html\Template\TemplateInterface;
use Mouf\Html\HtmlElement\HtmlBlock;
use \Twig_Environment;
use Mouf\Html\Renderer\Twig\TwigTemplate;
use Mouf\Mvc\Splash\HtmlResponse;

/**
 * Main controller
 */
class RootController extends Controller {

    /**
     * The template used by this controller.
     * @var TemplateInterface
     */
    private $template;

    /**
     * The main content block of the page.
     * @var HtmlBlock
     */
    private $content;

    /**
     * The Twig environment (used to render Twig templates).
     * @var Twig_Environment
     */
    private $twig;


    /**
     * Controller's constructor.
     * @param TemplateInterface $template The template used by this controller
     * @param HtmlBlock $content The main content block of the page
     * @param Twig_Environment $twig The Twig environment (used to render Twig templates)
     */
    public function __construct(TemplateInterface $template, HtmlBlock $content, Twig_Environment $twig) {
        $this->template = $template;
        $this->content = $content;
        $this->twig = $twig;
    }

    /**
     * @URL /
     */
    public function index() {
        // Let's add the twig file to the template.
        $this->content->addHtmlElement(new TwigTemplate($this->twig, 'views/root/index.twig'));
        return new HtmlResponse($this->template);
    }
}
