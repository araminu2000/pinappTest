<?php


namespace Cegeka\FlandersDriveBundle\Listener;


use Cegeka\FlandersDriveBundle\Service\FinderGenerator;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Security\Core\SecurityContext;
use Symfony\Component\Security\Http\Event\InteractiveLoginEvent;

class LoginListener
{
    /**
     * @var \Symfony\Component\Security\Core\SecurityContext
     */
    protected $securityContext;

    /**
     * @var FinderGenerator
     */
    protected $finderGenerator;

    /**
     * @var \Symfony\Component\HttpFoundation\Session\Session
     */
    protected $session;

    /**
     * Constructor
     *
     * @param SecurityContext $securityContext
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     * @param \Cegeka\FlandersDriveBundle\Service\FinderGenerator $finderGenerator
     */
    public function __construct(SecurityContext $securityContext, Session $session, FinderGenerator $finderGenerator)
    {
        $this->securityContext = $securityContext;
        $this->session = $session;
        $this->finderGenerator = $finderGenerator;
    }

    /**
     * Do the magic.
     *
     * @param InteractiveLoginEvent $event
     */
    public function onSecurityInteractiveLogin(InteractiveLoginEvent $event)
    {
        if ($this->securityContext->isGranted('IS_AUTHENTICATED_FULLY')) {
            $user = $this->securityContext->getToken()->getUser();
            $scalingParameters = $this->finderGenerator->findUserScalingParametersOrGenerateIt($user);
            $this->session->set('scalingParameters', $scalingParameters->toArrayScalingParameters());
        }
    }
} 