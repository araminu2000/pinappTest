<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class GeneralInformationAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('flandersId')
            ->add('title')
            ->add('scopes')
            ->add('normes')
            ->add('generalRequirements')
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
            ->add('title')
            ->add('scopes', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
            ->add('normes', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
            ->add('generalRequirements', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
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
            ->add('title')
            ->add('scopes', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
            ->add('normes', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
            ->add('generalRequirements', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
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
            ->add('title')
            ->add('scopes', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
            ->add('normes', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
            ->add('generalRequirements', 'sonata_type_model', ['multiple' => true, 'required' => false, 'btn_add' => false])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
