<?php
/**
 * Created by PhpStorm.
 * User: aigie
 * Date: 11/03/2017
 * Time: 14:48
 */

namespace AG\SitemapGeneratorBundle\DependencyInjection;


use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Extension\Extension;

class SitemapGeneratorExtension extends Extension
{

    /**
     * Loads a specific configuration.
     *
     * @param array $configs An array of configuration values
     * @param ContainerBuilder $container A ContainerBuilder instance
     *
     * @throws \InvalidArgumentException When provided tag is not defined in this extension
     */
    public function load(array $configs, ContainerBuilder $container)
    {
        // TODO: Implement load() method.
    }
}
