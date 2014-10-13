<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class MaterialAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('flandersId')
            ->add('process')
            ->add('productType')
            ->add('name')
            ->add('reference')
            ->add('effect')
            ->add('improve')
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
            ->add('process')
            ->add('productType')
            ->add('name')
            ->add('reference')
            ->add('effect')
            ->add('improve')
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
            ->add('process')
            ->add('productType')
            ->add('name')
            ->add('reference')
            ->add('effect')
            ->add('improve')
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
            ->add('process')
            ->add('productType')
            ->add('name')
            ->add('reference')
            ->add('effect')
            ->add('improve')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}