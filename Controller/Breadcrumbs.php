<?php
/**
 * Хлебные крошки (Дублирующая навигация).
 */
namespace SmartCore\Module\Breadcrumbs\Controller;

use SmartCore\Bundle\EngineBundle\Controller\Module;
 
class Breadcrumbs extends Module
{
	/**
	 * Разделитель.
	 * @var string
	 */
	protected $delimiter;
	
	/**
	 * Скрыть "хлебные крошки", если выбрана корневая папка.
	 * @var bool
	 */
	protected $hide_if_only_home;
	
	/**
	 * Конструктор.
	 */
	protected function init()
	{
		$this->NodeProperties->setDefaultParams(array(
			'delimiter'			=> '&raquo;',
			'hide_if_only_home'	=> false,
			));

		$this->View->setOptions(array(
			'engine'		=> 'simple',
			'template_ext' => '.tpl',
		));
			
		$this->delimiter		 = $this->NodeProperties->getParam('delimiter');
		$this->hide_if_only_home = $this->NodeProperties->getParam('hide_if_only_home');
	}
	
	/**
	 * Запуск модуля.
	 */
	public function indexAction($params)
	{
		$this->View->delimiter = $this->delimiter;
		$this->View->Items = $this->Breadcrumbs;
		$this->View->hide_if_only_home = $this->hide_if_only_home;
	}	
}