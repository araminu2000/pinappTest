<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Doctrine\Common\Persistence\ObjectManager;

class ScalingParametersService
{
    public static $scalingParameterTypes = [
        'Activity' => 'activities',
        'ApplicationType' => 'applicationTypes',
        'Body' => 'bodies',
        'Process' => 'processes',
        'ProductType' => 'productTypes',
        'Region' => 'regions',
        'Tag' => 'tags'
    ];

    /**
     * @var ObjectManager
     */
    protected $manager;

    /**
     * @var FinderGenerator
     */
    protected $finderGenerator;

    public function __construct(ObjectManager $manager, FinderGenerator $finderGenerator)
    {
        $this->manager = $manager;
        $this->finderGenerator = $finderGenerator;
    }

    protected function hydrateScalingParameters($scalingParameters)
    {
        foreach (self::$scalingParameterTypes as $key => $value) {
            if (!array_key_exists($value, $scalingParameters)) {
                $scalingParameters[$value] = [];
            }
        }

        return $scalingParameters;
    }

    public function updateUserScalingParameters($user, $scalingParameters)
    {
        if (null === $scalingParameters) {
            $scalingParameters = [];
        }

        $userScalingParameters = $this->finderGenerator->findUserScalingParametersOrGenerateIt($user);
        $scalingParameters = $this->hydrateScalingParameters($scalingParameters);

        $userScalingParameters->setActivities(json_encode($scalingParameters['activities']));
        $userScalingParameters->setApplicationTypes(json_encode($scalingParameters['applicationTypes']));
        $userScalingParameters->setBodies(json_encode($scalingParameters['bodies']));
        $userScalingParameters->setProcesses(json_encode($scalingParameters['processes']));
        $userScalingParameters->setProductTypes(json_encode($scalingParameters['productTypes']));
        $userScalingParameters->setRegions(json_encode($scalingParameters['regions']));
        $userScalingParameters->setTags(json_encode($scalingParameters['tags']));

        $this->manager->persist($userScalingParameters);
        $this->manager->flush();

        return $userScalingParameters;
    }

    public function findUniqueScalingParameters($type)
    {
        $scalingParametersValues = [];

        $scalingParameters = $this->manager->getRepository("CegekaFlandersDriveBundle:Scaling\\{$type}")->findBy([], [
            'value' => 'ASC'
        ]);

        foreach ($scalingParameters as $scalingParameter) {
            $entries = explode('|', $scalingParameter->getValue());

            foreach ($entries as $entry) {
                $entry = str_replace("\n", ' ', trim($entry));

                if (null == $entry) {
                    continue;
                }

                $scalingParametersValues[] = $entry;
            }
        }

        return array_unique($scalingParametersValues);
    }

    public function findAllUniqueScalingParameters()
    {
        $uniqueScalingParameters = [];

        foreach (self::$scalingParameterTypes as $scalingParameterType => $scalingKey) {
            $uniqueScalingParameters[$scalingKey] = $this->findUniqueScalingParameters($scalingParameterType);
        }

        return $uniqueScalingParameters;
    }

} 