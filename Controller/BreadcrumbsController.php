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
        $this->View->setEngine('php');
    }

    /**
     * Запуск модуля.
     */
    public function indexAction($router_params = null)
    {
        $this->View->delimiter = $this->delimiter;
        $this->View->items = $this->get('engine.breadcrumbs');
        $this->View->hide_if_only_home = $this->hide_if_only_home;

        return new Response($this->View);
    }
}
