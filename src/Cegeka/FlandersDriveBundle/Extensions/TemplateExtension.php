<?php


namespace Cegeka\FlandersDriveBundle\Extensions;


class TemplateExtension extends \Twig_Extension
{
    public function getName()
    {
        return 'template_extension';
    }

    public function getFilters()
    {
        return [
            new \Twig_SimpleFilter('highlightText', [$this, 'highlightTextFilter'])
        ];
    }

    public function highlightTextFilter($input, $searchTerm)
    {
        return str_replace($searchTerm, '<span style="background: yellow;">' . $searchTerm . '</span>', (string)$input);
    }
}