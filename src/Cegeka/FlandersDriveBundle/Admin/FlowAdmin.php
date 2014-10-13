<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class FlowAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('flandersId')
            ->add('name')
            ->add('step')
            ->add('fileStructure')
            ->add('decision')
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
            ->add('flandersId')
            ->add('name')
            ->add('step', 'sonata_type_model')
            ->add('fileStructure', 'sonata_type_model')
            ->add('decision', 'sonata_type_model')
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
            ->add('flandersId')
            ->add('name')
            ->add('step', 'sonata_type_model', ['required' => false])
            ->add('fileStructure', 'sonata_type_model', ['required' => false])
            ->add('decision', 'sonata_type_model', ['required' => false])
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
            ->add('flandersId')
            ->add('name')
            ->add('step', 'sonata_type_model')
            ->add('fileStructure', 'sonata_type_model')
            ->add('decision', 'sonata_type_model')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
