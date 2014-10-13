<?php


namespace Cegeka\FlandersDriveBundle\Extensions;


use Cegeka\FlandersDriveBundle\Service\ReleaseService;

class FooterExtension extends \Twig_Extension
{
    /**
     * @var ReleaseService
     */
    protected $releaseService;

    public function __construct(ReleaseService $releaseService)
    {
        $this->releaseService = $releaseService;
    }

    public function getGlobals() {
        return array(
            'releaseService' => $this->releaseService
        );
    }

    public function getName()
    {
        return 'releaseService';
    }
} 