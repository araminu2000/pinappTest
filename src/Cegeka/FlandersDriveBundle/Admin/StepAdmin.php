<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class StepAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('title')
            ->add('fileName')
            ->add('scalingProcess')
            ->add('processOwner')
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
            ->add('title')
            ->add('fileName')
            ->add('scalingProcess', 'sonata_type_model')
            ->add('processOwner', 'sonata_type_model')
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
            ->add('title')
            ->add('fileName')
            ->add('scalingProcess', 'sonata_type_model', array('required' => true, 'btn_add' => false))
            ->add('processOwner', 'sonata_type_model', array('required' => true, 'btn_add' => false))
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
            ->add('title')
            ->add('fileName')
            ->add('scalingProcess', 'sonata_type_model')
            ->add('processOwner', 'sonata_type_model')
            ->add('description', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
