<?php


namespace Cegeka\FlandersDriveBundle\Entity\Collection;

use Doctrine\Common\Collections\ArrayCollection;
use JMS\Serializer\Annotation as JMS;
use Doctrine\ORM\Mapping as ORM;

/**
 * @JMS\XmlRoot("rootCompany")
 * @JMS\ExclusionPolicy("all")
 */
class CompanyCollection extends BaseCollection
{
    /**
     * @var ArrayCollection
     * @JMS\Type("array<Cegeka\FlandersDriveBundle\Entity\Company>")
     * @JMS\XmlList(inline = true, entry = "company")
     * @JMS\Expose
     */
    protected $_elements;


} 