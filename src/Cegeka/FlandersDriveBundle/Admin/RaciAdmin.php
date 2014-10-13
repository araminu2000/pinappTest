<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class RaciAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('paragraph')
            ->add('peopleResponsible')
            ->add('peopleConsulted')
            ->add('peopleInformed')
            ->add('peopleAccountable')
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
            ->add('paragraph', 'sonata_type_model', array('required' => true, 'btn_add' => false))
            ->add('peopleResponsible', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('peopleConsulted', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('peopleInformed', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('peopleAccountable', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
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
            ->add('paragraph', 'sonata_type_model', array('required' => true, 'btn_add' => false))
            ->add('peopleResponsible', 'sonata_type_model', array('by_reference' => false,'compound' => true,'multiple' => true,'expanded' => true,'required' => false,'btn_add'  => false))
            ->add('peopleConsulted', 'sonata_type_model', array('by_reference' => false,'compound' => true,'multiple' => true,'expanded' => true,'required' => false,'btn_add'  => false))
            ->add('peopleInformed', 'sonata_type_model', array('by_reference' => false,'compound' => true,'multiple' => true,'expanded' => true,'required' => false,'btn_add'  => false))
            ->add('peopleAccountable', 'sonata_type_model', array('by_reference' => false,'compound' => true,'multiple' => true,'expanded' => true,'required' => false,'btn_add'  => false))
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
            ->add('paragraph', 'sonata_type_model', array('required' => true, 'btn_add' => false))
            ->add('peopleResponsible', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('peopleConsulted', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('peopleInformed', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('peopleAccountable', 'sonata_type_collection', array('required' => false, 'btn_add' => false), array('edit' => 'inline', 'inline' => 'table'))
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
