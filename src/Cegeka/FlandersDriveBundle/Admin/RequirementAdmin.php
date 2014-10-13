<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class RequirementAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('tag')
            ->add('scalingBody')
            ->add('scalingTag')
            ->add('scalingApplicationType')
            ->add('scalingProductType')
            ->add('scalingProcess')
            ->add('scalingRegion')
            ->add('clauseContent')
            ->add('clauseTitle')
            ->add('chapterNumber')
            ->add('testType')
            ->add('oblig')
            ->add('chapterTitle')
            ->add('part')
            ->add('title')
            ->add('clauseNumber')
            ->add('clauseType')
            ->add('type')
            ->add('subType')
            ->add('legislation')
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
            ->add('tag')
            ->add('scalingBody')
            ->add('scalingTag')
            ->add('scalingApplicationType')
            ->add('scalingProductType')
            ->add('scalingProcess')
            ->add('scalingRegion')
            ->add('clauseTitle')
            ->add('chapterNumber')
            ->add('testType')
            ->add('oblig')
            ->add('chapterTitle')
            ->add('part')
            ->add('title')
            ->add('clauseNumber')
            ->add('clauseType')
            ->add('type')
            ->add('subType')
            ->add('legislation')
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
            ->add('tag')
            ->add('clauseContent', 'textarea', ['required' => false, 'attr' => ['class' => 'ckeditor']])
            ->add('scalingBody')
            ->add('scalingTag')
            ->add('scalingApplicationType')
            ->add('scalingProductType')
            ->add('scalingProcess')
            ->add('scalingRegion')
            ->add('addInfo')
            ->add('clauseTitle')
            ->add('chapterNumber')
            ->add('testType')
            ->add('oblig')
            ->add('chapterTitle')
            ->add('part')
            ->add('title')
            ->add('clauseNumber')
            ->add('clauseType')
            ->add('type')
            ->add('subType')
            ->add('legislation')
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
            ->add('tag')
            ->add('scalingBody')
            ->add('scalingTag')
            ->add('scalingApplicationType')
            ->add('scalingProductType')
            ->add('scalingProcess')
            ->add('scalingRegion')
            ->add('clauseContent')
            ->add('addInfo')
            ->add('clauseTitle')
            ->add('chapterNumber')
            ->add('testType')
            ->add('oblig')
            ->add('chapterTitle')
            ->add('part')
            ->add('title')
            ->add('clauseNumber')
            ->add('clauseType')
            ->add('type')
            ->add('subType')
            ->add('legislation')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
