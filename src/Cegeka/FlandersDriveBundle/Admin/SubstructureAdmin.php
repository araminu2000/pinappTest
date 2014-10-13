<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SubstructureAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('group')
            ->add('scaledTo')
            ->add('type')
            ->add('referencedProcess')
            ->add('afterReference')
            ->add('afterYesReference')
            ->add('afterNoReference')
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
            ->add('group', 'sonata_type_model')
            ->add('scaledTo')
            ->add('type')
            ->add('referencedProcess', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterYesReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterNoReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
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
            ->add('group', 'sonata_type_model')
            ->add('scaledTo')
            ->add('type')
            ->add('referencedProcess', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterYesReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterNoReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
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
            ->add('group', 'sonata_type_model')
            ->add('scaledTo')
            ->add('type')
            ->add('referencedProcess', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterYesReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('afterNoReference', 'sonata_type_model', ['required' => false, 'btn_add' => false])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
