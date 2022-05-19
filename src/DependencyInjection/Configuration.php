<?php

    namespace ICS\WebapiBundle\DependencyInjection;

    use Symfony\Component\Config\Definition\ConfigurationInterface;
    use Symfony\Component\Config\Definition\Builder\TreeBuilder;

    class Configuration implements ConfigurationInterface
    {

        public function getConfigTreeBuilder()
        {
            $treeBuilder = new TreeBuilder('webapi');
            $treeBuilder->getRootNode()->children()
                ->arrayNode('pixabay')
                    ->children()
                        ->scalarNode('apiKey')->defaultValue('')->end()
                    ->end()
            //    ->scalarNode('path')->defaultValue('medias')->end()
            ;
            return $treeBuilder;
        }
    }
    