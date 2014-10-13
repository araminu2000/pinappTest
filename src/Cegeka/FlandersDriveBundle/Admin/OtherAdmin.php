<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class OtherAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('clauseContent')
            ->add('tag')
            ->add('part')
            ->add('chapterNumber')
            ->add('clauseNumber')
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
            ->add('clauseContent', 'sonata_type_model', ['empty_value' => '- none -'])
            ->add('tag')
            ->add('part')
            ->add('chapterNumber')
            ->add('clauseNumber')
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
            ->add('clauseContent', 'sonata_type_model', ['empty_value' => '- none -'])
            ->add('tag')
            ->add('part')
            ->add('chapterNumber')
            ->add('clauseNumber')
        ;
    }

    /**
     * @param ShowMapper $showMapper
     */
    protected function configureShowFields(ShowMapper $showMapper)
    {
        $showMapper
            ->add('clauseContent', 'sonata_type_model', ['empty_value' => '- none -'])
            ->add('tag')
            ->add('part')
            ->add('chapterNumber')
            ->add('clauseNumber')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
