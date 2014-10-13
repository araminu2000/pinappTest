<?php


namespace Cegeka\FlandersDriveBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="term")
 */
class Term extends EntityBase
{
    /**
     * @var Standard
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Standard",cascade={"remove", "persist"})
     * @Assert\NotNull
     */
    protected $liSafe;

    /**
     * @var Standard
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Standard",cascade={"remove", "persist"})
     * @Assert\NotNull
     */
    protected $iec_62660_1;

    /**
     * @var Standard
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Standard",cascade={"remove", "persist"})
     * @Assert\NotNull
     */
    protected $iec_62660_2;

    /**
     * @var Standard
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Standard",cascade={"remove", "persist"})
     * @Assert\NotNull
     */
    protected $iec_62133;

    /**
     * @var Standard
     * @ORM\OneToOne(targetEntity="Cegeka\FlandersDriveBundle\Entity\Standard",cascade={"remove", "persist"})
     * @Assert\NotNull
     */
    protected $iec_60050_482;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=true)
     * @Assert\NotNull
     * @Assert\Type(type="string", message="The value {{ value }} is not a valid {{ type }}.")
     */
    protected $termId;

    /**
     * @param mixed $iec_60050_482
     * @return $this
     */
    public function setIec60050482($iec_60050_482)
    {
        $this->iec_60050_482 = $iec_60050_482;
        return $this->iec_60050_482;
    }

    /**
     * @return mixed
     */
    public function getIec60050482()
    {
        return $this->iec_60050_482;
    }

    /**
     * @param mixed $iec_62133
     * @return $this
     */
    public function setIec62133($iec_62133)
    {
        $this->iec_62133 = $iec_62133;
        return $this->iec_62133;
    }

    /**
     * @return mixed
     */
    public function getIec62133()
    {
        return $this->iec_62133;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Standard $iec_62660_1
     * @return $this
     */
    public function setIec626601($iec_62660_1)
    {
        $this->iec_62660_1 = $iec_62660_1;
        return $this->iec_62660_1;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Standard
     */
    public function getIec626601()
    {
        return $this->iec_62660_1;
    }

    /**
     * @param \Cegeka\FlandersDriveBundle\Entity\Standard $iec_62660_2
     * @return $this
     */
    public function setIec626602($iec_62660_2)
    {
        $this->iec_62660_2 = $iec_62660_2;
        return $this->iec_62660_2;
    }

    /**
     * @return \Cegeka\FlandersDriveBundle\Entity\Standard
     */
    public function getIec626602()
    {
        return $this->iec_62660_2;
    }

    /**
     * @param mixed $liSafe
     * @return $this
     */
    public function setLiSafe($liSafe)
    {
        $this->liSafe = $liSafe;
        return $this->liSafe;
    }

    /**
     * @return mixed
     */
    public function getLiSafe()
    {
        return $this->liSafe;
    }

    /**
     * @param string $termId
     * @return $this
     */
    public function setTermId($termId)
    {
        $this->termId = $termId;
        return $this->termId;
    }

    /**
     * @return string
     */
    public function getTermId()
    {
        return $this->termId;
    }


} 