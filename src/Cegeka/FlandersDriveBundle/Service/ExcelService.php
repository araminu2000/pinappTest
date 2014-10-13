<?php


namespace Cegeka\FlandersDriveBundle\Service;


use Cegeka\FlandersDriveBundle\Entity\Component;
use Cegeka\FlandersDriveBundle\Entity\Flow;
use Cegeka\FlandersDriveBundle\Entity\Material;
use Cegeka\FlandersDriveBundle\Entity\Recommendation;
use Cegeka\FlandersDriveBundle\Entity\Requirement;
use Cegeka\FlandersDriveBundle\Entity\Step;
use Cegeka\FlandersDriveBundle\Entity\Testlab;
use ExcelAnt\Adapter\PhpExcel\Writer\PhpExcelWriter\Excel5;
use ExcelAnt\Adapter\PhpExcel\Writer\WriterFactory;
use ExcelAnt\Coordinate\Coordinate;
use ExcelAnt\Table\Table;
use Liuggio\ExcelBundle\Factory;

class ExcelService
{
    /**
     * @var Factory
     */
    protected $excelService;

    public function __construct(Factory $excelService)
    {
        $this->excelService = $excelService;
    }

    /**
     * @param $workbook
     * @return \Symfony\Component\HttpFoundation\StreamedResponse
     */
    public function createResponseFromWorkbook($workbook)
    {
        $writer = (new WriterFactory())->createWriter(new Excel5('php://output'));
        $phpExcel = $writer->convert($workbook);

        $writer = $this->excelService->createWriter($phpExcel, 'Excel5');
        $response = $this->excelService->createStreamedResponse($writer);

        return $response;
    }

    public function exportFlowSheet(array $flows, $sheet)
    {
        $table = new Table();

        // Table Header + Content
        $table->setRow(Flow::getExportableColumns());
        $table = $this->exportFlows($table, $flows);

        // Finish up
        $sheet->addTable($table, new Coordinate(1, 1));
    }

    public function exportFlows($table, array $flows)
    {
        foreach ($flows as $flow) {
            $table->setRow([
                $flow->getName(),
            ]);
        }

        return $table;
    }

    public function exportStepSheet(array $steps, $sheet)
    {
        $table = new Table();

        // Table Header + Content
        $table->setRow(Step::getExportableColumns());
        $table = $this->exportSteps($table, $steps);

        // Finish up
        $sheet->addTable($table, new Coordinate(1, 1));
    }

    public function exportSteps($table, array $steps)
    {
        /** @var Step $step */
        foreach ($steps as $step) {
            $table->setRow([
                $step->getTitle(),
                (null === $step->getScalingProcess()) ? null : $step->getScalingProcess()->getValue(),
                (null === $step->getProcessOwner()) ? null : $step->getProcessOwner()->getName(),
            ]);
        }

        return $table;
    }

    public function exportMaterialSheet($materials, $sheet)
    {
        $table = new Table();

        $table->setRow(Material::getExportableColumns());
        $table = $this->exportMaterials($table, $materials);

        $sheet->addTable($table, new Coordinate(1, 1));
    }

    public function exportMaterials($table, array $materials)
    {
        foreach ($materials as $material) {
            $table->setRow([
                $material->getName(),
                (null === $material->getProductType()) ? null : $material->getProductType()->getValue(),
                (null === $material->getProcess()) ? null : $material->getProcess()->getValue(),
                $material->getEffect(),
                $material->getImprove(),
            ]);
        }

        return $table;
    }

    public function exportRecommendationSheet(array $recommendations, $sheet)
    {
        $table = new Table();

        $table->setRow(Recommendation::getExportableColumns());
        $table = $this->exportRecommendations($table, $recommendations);

        $sheet->addTable($table, new Coordinate(1, 1));
    }

    public function exportRecommendations($table, array $recommendations)
    {
        /** @var Recommendation $recommendation */
        foreach ($recommendations as $recommendation) {
            $table->setRow([
                $recommendation->getName(),
                (null === $recommendation->getActivity()) ? null : $recommendation->getActivity()->getValue(),
                (null === $recommendation->getProcess()) ? null : $recommendation->getProcess()->getValue(),
                (null === $recommendation->getProductType()) ? null : $recommendation->getProductType()->getValue(),
                $recommendation->getText(),
                $recommendation->getGoal(),
                $recommendation->getReference(),
            ]);
        }

        return $table;
    }

    public function exportRequirementSheet(array $requirements, $sheet)
    {
        $table = new Table();

        $table->setRow(Requirement::getExportableColumns());
        $table = $this->exportRequirements($table, $requirements);

        $sheet->addTable($table, new Coordinate(1, 1));
    }

    public function exportRequirements($table, array $requirements)
    {
        /** @var Requirement $requirement */
        foreach ($requirements as $requirement) {
            $table->setRow([
                ($requirement->getScalingBody() !== null) ? $requirement->getScalingBody()->getValue() : null,
                $requirement->getTag(),
                ($requirement->getScalingTag() !== null) ? $requirement->getScalingTag()->getValue() : null,
                $requirement->getPart(),
                $requirement->getTitle(),
                ($requirement->getScalingApplicationType() !== null) ? $requirement->getScalingApplicationType()->getValue() : null,
                ($requirement->getScalingProductType() !== null) ? $requirement->getScalingProductType()->getValue() : null,
                ($requirement->getScalingRegion() !== null) ? $requirement->getScalingRegion()->getValue() : null,
                $requirement->getOblig(),
                $requirement->getLegislation(),
                $requirement->getType(),
                $requirement->getSubType(),
                $requirement->getTestType(),
                $requirement->getClauseType(),
                $requirement->getChapterNumber(),
                $requirement->getChapterTitle(),
                $requirement->getClauseNumber(),
                $requirement->getClauseTitle(),
                $requirement->getClauseContent(),
                $requirement->getAddInfo(),
            ]);
        }

        return $table;
    }

    public function exportComponentSheet(array $components, $sheet)
    {
        $table = new Table();

        $table->setRow(Component::getExportableColumns());
        $table = $this->exportComponents($table, $components);

        $sheet->addTable($table, new Coordinate(1, 1));
    }

    public function exportComponents($table, array $components)
    {
        /** @var Component $component */
        foreach ($components as $component) {
            $table->setRow([
                $component->getName(),
                $component->getReference(),
                $component->getEffect(),
                $component->getImprove(),
                (null === $component->getProcess()) ? null : $component->getProcess()->getValue(),
                (null === $component->getProductType()) ? null : $component->getProductType()->getValue(),
            ]);
        }

        return $table;
    }

    public function exportTestLabSheet($testlabs, $sheet)
    {
        $table = new Table();

        // Table Header + Content
        $table->setRow(Testlab::getExportableColumns());
        $table = $this->exportTestLabs($table, $testlabs);

        // Finish up
        $sheet->addTable($table, new Coordinate(1, 1));
    }

    public function exportTestLabs($table, array $testlabs)
    {
        /** @var Testlab $testlab */
        foreach ($testlabs as $testlab) {
            $table->setRow([
                $testlab->getName(),
                (null === $testlab->getProductType()) ? null : $testlab->getProductType()->getValue(),
                (null === $testlab->getRegion()) ? null : $testlab->getRegion()->getValue(),
                $testlab->getType(),
                $testlab->getEquipmentType(),
                $testlab->getCertification(),
                $testlab->getContact(),
            ]);
        }

        return $table;
    }
} 