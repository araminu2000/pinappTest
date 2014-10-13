<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ParagraphAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('step')
            ->add('htmlText')
            ->add('materials')
            ->add('recommendations')
            ->add('components')
            ->add('inputs')
            ->add('linkFlowSteps')
            ->add('workProducts')
            ->add('testLabs')
            ->add('images')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('step', 'sonata_type_model')
            ->add('htmlText')
            ->add('materials', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('recommendations', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('components', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('inputs', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('requirements', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('workProducts', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('testLabs', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('createdAt')
            ->add('updatedAt')
            ->add('_action', 'actions', array(
                'actions' => array(
                    'show' => array(),
                    'edit' => array(),
                    'delete' => array(),
                )
            ))
        ;
    }

    /**
     * @param FormMapper $formMapper
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('step', 'sonata_type_model')
            ->add('htmlText', 'textarea', ['required' => false, 'attr' => ['class' => 'ckeditor']])
            ->add('productType', null, ['required' => false])
            ->add('activity', null, ['required' => false])
            ->add('materials', null, ['required' => false])
            ->add('recommendations',  null, ['required' => false])
            ->add('components',  null, ['required' => false])
            ->add('inputs',  null, ['required' => false])
            ->add('requirements',  null, ['required' => false])
            ->add('linkFlowSteps',  null, ['required' => false])
            ->add('workProducts',  null, ['required' => false])
            ->add('testLabs',  null, ['required' => false])
            ->add('images',  null, ['required' => false])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('step', 'sonata_type_model')
            ->add('htmlText')
            ->add('materials', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('recommendations', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('components', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('inputs', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('requirements', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('linkFlowSteps', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('workProducts', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('testLabs', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('images', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
