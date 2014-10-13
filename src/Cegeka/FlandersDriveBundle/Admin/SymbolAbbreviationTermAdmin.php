<?php

namespace Cegeka\FlandersDriveBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

class SymbolAbbreviationTermAdmin extends Admin
{
    /**
     * @param DatagridMapper $datagridMapper
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('flandersId')
            ->add('li_safe')
            ->add('iec_62660_1')
            ->add('iec_62660_2')
            ->add('iec_62133')
            ->add('iec_60050_482')
            ->add('iec_60068_2_64')
            ->add('iec_62281')
            ->add('iec_61851')
            ->add('iso12405_1')
            ->add('iso12405_2')
            ->add('iso16750_1_2006')
            ->add('iso_iec_pas_16898')
            ->add('iso_6469_1_2009')
            ->add('iso_6469_2_2009')
            ->add('iso_dis_6469')
            ->add('iso_iec_17000')
            ->add('saej1797')
            ->add('saej2380')
            ->add('saej2464')
            ->add('saej1798')
            ->add('saej2289')
            ->add('saej2929')
            ->add('saej2344')
            ->add('un38_3')
            ->add('reg_nr_100')
            ->add('ieee_1625')
            ->add('ieee_1725')
            ->add('ul_1642')
            ->add('ul_2054')
            ->add('ul_2580')
            ->add('us_dep_transp')
            ->add('nen_en_15194')
            ->add('batso_01')
            ->add('jis_c_8714')
            ->add('ansi_c18_1')
            ->add('ansi_c18_2')
            ->add('ineris')
            ->add('usabc_energystorageabusetest')
            ->add('usabc_freedomcar')
            ->add('sand99_0497')
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
            ->add('li_safe')
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
            ->add('li_safe', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iec_62660_1', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iec_62660_2', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iec_62133', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iec_60050_482', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iec_60068_2_64', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iec_62281', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iec_61851', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso12405_1', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso12405_2', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso16750_1_2006', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso_iec_pas_16898', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso_6469_1_2009', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso_6469_2_2009', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso_dis_6469', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('iso_iec_17000', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('saej1797', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('saej2380', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('saej2464', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('saej1798', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('saej2289', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('saej2929', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('saej2344', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('un38_3', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('reg_nr_100', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ieee_1625', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ieee_1725', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ul_1642', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ul_2054', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ul_2580', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('us_dep_transp', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('nen_en_15194', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('batso_01', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('jis_c_8714', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ansi_c18_1', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ansi_c18_2', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('ineris', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('usabc_energystorageabusetest', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('usabc_freedomcar', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
            ->add('sand99_0497', 'sonata_type_model', ['required' => false, 'empty_value' => '- none -'])
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
            ->add('li_safe', 'sonata_type_model')
            ->add('iec_62660_1', 'sonata_type_model')
            ->add('iec_62660_2', 'sonata_type_model')
            ->add('iec_62133', 'sonata_type_model')
            ->add('iec_60050_482', 'sonata_type_model')
            ->add('iec_60068_2_64', 'sonata_type_model')
            ->add('iec_62281', 'sonata_type_model')
            ->add('iec_61851', 'sonata_type_model')
            ->add('iso12405_1', 'sonata_type_model')
            ->add('iso12405_2', 'sonata_type_model')
            ->add('iso16750_1_2006', 'sonata_type_model')
            ->add('iso_iec_pas_16898', 'sonata_type_model')
            ->add('iso_6469_1_2009', 'sonata_type_model')
            ->add('iso_6469_2_2009', 'sonata_type_model')
            ->add('iso_dis_6469', 'sonata_type_model')
            ->add('iso_iec_17000', 'sonata_type_model')
            ->add('saej1797', 'sonata_type_model')
            ->add('saej2380', 'sonata_type_model')
            ->add('saej2464', 'sonata_type_model')
            ->add('saej1798', 'sonata_type_model')
            ->add('saej2289', 'sonata_type_model')
            ->add('saej2929', 'sonata_type_model')
            ->add('saej2344', 'sonata_type_model')
            ->add('un38_3', 'sonata_type_model')
            ->add('reg_nr_100', 'sonata_type_model')
            ->add('ieee_1625', 'sonata_type_model')
            ->add('ieee_1725', 'sonata_type_model')
            ->add('ul_1642', 'sonata_type_model')
            ->add('ul_2054', 'sonata_type_model')
            ->add('ul_2580', 'sonata_type_model')
            ->add('us_dep_transp', 'sonata_type_model')
            ->add('nen_en_15194', 'sonata_type_model')
            ->add('batso_01', 'sonata_type_model')
            ->add('jis_c_8714', 'sonata_type_model')
            ->add('ansi_c18_1', 'sonata_type_model')
            ->add('ansi_c18_2', 'sonata_type_model')
            ->add('ineris', 'sonata_type_model')
            ->add('usabc_energystorageabusetest', 'sonata_type_model')
            ->add('usabc_freedomcar', 'sonata_type_model')
            ->add('sand99_0497', 'sonata_type_model')
            ->add('createdAt')
            ->add('updatedAt')
        ;
    }
}
