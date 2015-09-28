<?php

namespace SmartCore\Module\Breadcrumbs\Form\Type;

use Smart\CoreBundle\Form\DataTransformer\HtmlTransformer;
use SmartCore\Bundle\CMSBundle\Module\AbstractNodePropertiesFormType;
use Symfony\Component\Form\FormBuilderInterface;

class NodePropertiesFormType extends AbstractNodePropertiesFormType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add($builder->create('delimiter', 'text', [
                'attr' => ['autofocus' => 'autofocus'],
                ])->addViewTransformer(new HtmlTransformer(false)))
            ->add('hide_if_only_home', 'checkbox', ['required' => false])  // Скрыть, если выбрана корневая папка
            ->add('css_class', 'text', ['required' => false])              // CSS class div блока
        ;
    }

    public function getName()
    {
        return 'smart_module_breadcrumbs_node_properties';
    }
}
