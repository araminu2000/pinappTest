<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class ClauseContentAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('id')
            ->add('requirement')
            ->add('referencedStandards')
            ->add('linkFlowSteps')
            ->add('referencedOtherRequirements')
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
            ->add('id')
            ->add('requirement', 'sonata_type_model')
            ->add('referencedStandards')
            ->add('linkFlowSteps', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
            ->add('referencedOtherRequirements', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
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
            ->add('requirement', 'sonata_type_model')
            ->add('referencedStandards', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
            ->add('linkFlowSteps', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
            ->add('referencedOtherRequirements', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('id')
            ->add('requirement', 'sonata_type_model')
            ->add('referencedStandards', 'sonata_type_collection')
            ->add('linkFlowSteps', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
            ->add('referencedOtherRequirements', 'sonata_type_collection', ['required' => false, 'btn_add' => false], ['edit' => 'inline', 'inline' => 'table'])
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
