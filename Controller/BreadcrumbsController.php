<?php
/**
 * Хлебные крошки (Дублирующая навигация).
 */
namespace SmartCore\Module\Breadcrumbs\Controller;

use SmartCore\Bundle\EngineBundle\Module\Controller;
use SmartCore\Bundle\EngineBundle\Response;
 
class BreadcrumbsController extends Controller
{
    /**
     * Разделитель.
     * @var string
     */
    protected $delimiter = '&raquo;';

    /**
     * Скрыть "хлебные крошки", если выбрана корневая папка.
     * @var bool
     */
    protected $hide_if_only_home = false;

    /**
     * Конструктор.
     */
    protected function init()
    {
        $this->View->setOptions(array(
            'engine'        => 'simple',
            'template_ext'  => '.tpl',
        ));
    }

    /**
     * Запуск модуля.
     */
    public function indexAction($router_params = null)
    {
        $this->View->delimiter = $this->delimiter;
        $this->View->Items = $this->engine('breadcrumbs');
        $this->View->hide_if_only_home = $this->hide_if_only_home;

        return new Response($this->View);
    }
}
