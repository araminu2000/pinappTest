<?php


namespace Cegeka\FlandersDriveBundle\Entity\Scaling;

use Cegeka\FlandersDriveBundle\Entity\Collection\Scaling\ProcessCollection;
use Cegeka\FlandersDriveBundle\Entity\EntityBase;
use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use JMS\Serializer\DeserializationContext;
use JMS\Serializer\XmlDeserializationVisitor;
use JMS\Serializer\XmlSerializationVisitor;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="scaling_process")
 */
class Process extends EntityBase
{
    /**
     * @var string
     * @ORM\Column(type="string")
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $value;

    public function __toString()
    {
        return $this->getValue();
    }

    /**
     * @JMS\HandlerCallback("xml", direction = "serialization")
     */
    public function serializeToXml(XmlSerializationVisitor $visitor)
    {
        return $visitor->getDocument()->createTextNode($this->getValue());
    }

    /**
     * @JMS\HandlerCallback("xml", direction = "deserialization")
     */
    public function deserializeFromXml(XmlDeserializationVisitor $visitor, \SimpleXMLElement $data, DeserializationContext $context)
    {
        $this->setValue((string)$data);

        /**
         * @var ProcessCollection $parentCollection
         */
        $parentCollection = $visitor->getCurrentObject();
        if ($parentCollection instanceof ProcessCollection) {
            $parentCollection->add($this);
        }
    }

    /**
     * @param string $value
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this->value;
    }

    /**
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }
} 