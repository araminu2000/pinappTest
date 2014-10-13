<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class DecisionAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('fileName')
            ->add('process')
            ->add('activity')
            ->add('productType')
            ->add('processOwner')
            ->add('title')
            ->add('tagYes')
            ->add('tagNo')
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
            ->add('fileName')
            ->add('process')
            ->add('activity')
            ->add('productType')
            ->add('processOwner')
            ->add('title')
            ->add('tagYes')
            ->add('tagNo')
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
            ->add('fileName')
            ->add('process')
            ->add('activity')
            ->add('productType')
            ->add('processOwner')
            ->add('title')
            ->add('tagYes')
            ->add('tagNo')
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
            ->add('fileName')
            ->add('process')
            ->add('activity')
            ->add('productType')
            ->add('processOwner')
            ->add('title')
            ->add('tagYes')
            ->add('tagNo')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
