<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootGeneralInfo")
 * @JMS\ExclusionPolicy("all")
 */
class GeneralInformationCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\GeneralInformation>")
     * @JMS\XmlList(inline = true, entry = "stdGenInfo")
     * @JMS\Expose
     */
    protected $_elements;


} 