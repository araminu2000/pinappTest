<?php


namespace Cegeka\FlandersDriveBundle\Admin;


use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\UserBundle\Admin\Model\UserAdmin as SonataUserAdmin;

class UserAdmin extends SonataUserAdmin
{
    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('Flanders Identifiers')
            ->add('flandersId', null, ['label' => 'Flanders ID'])
            ->add('company', 'sonata_type_model', ['label' => 'Company']);

        parent::configureFormFields($formMapper);
    }

    /**
     * @param ListMapper $listMapper
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        parent::configureListFields($listMapper);

        $listMapper
            ->add('company', null, ['label' => 'Company'])
            ->add('flandersId', null, ['label' => 'Flanders ID']);
    }
}