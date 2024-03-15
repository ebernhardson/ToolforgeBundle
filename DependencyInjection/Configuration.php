<?php

declare(strict_types=1);

namespace Wikimedia\ToolforgeBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{

    /**
     * @return TreeBuilder
     */
    public function getConfigTreeBuilder(): TreeBuilder
    {
        $builder = new TreeBuilder('toolforge');
        $builder->getRootNode()
            ->children()
                ->arrayNode('oauth')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('url')
                            ->defaultValue('https://meta.wikimedia.org/w/index.php?title=Special:OAuth')
                            ->end()
                        ->scalarNode('consumer_key')->defaultValue('')->end()
                        ->scalarNode('consumer_secret')->defaultValue('')->end()
                        ->scalarNode('logged_in_user')->defaultValue('')->end()
                        ->scalarNode('redirect_to')->defaultValue('/')->end()
                        ->booleanNode('authenticate_only')->defaultValue(false)->end()
                    ->end()
                ->end()
                ->arrayNode('intuition')
                    ->addDefaultsIfNotSet()
                    ->children()
                        ->scalarNode('domain')->defaultValue('')->end()
                    ->end()
                ->end()
            ->end();
        return $builder;
    }
}
