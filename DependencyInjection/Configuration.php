<?php

namespace Oneup\Bundle\ContaoSecurityCheckerBundle\DependencyInjection;

use Symfony\Component\Config\Definition\Builder\TreeBuilder;
use Symfony\Component\Config\Definition\ConfigurationInterface;

class Configuration implements ConfigurationInterface
{
    public function getConfigTreeBuilder()
    {
        $treeBuilder = new TreeBuilder();
        $rootNode = $treeBuilder->root('oneup_contao_security_checker');

        $rootNode
            ->children()
                ->booleanNode('enable_cron')
                    ->defaultFalse()
                ->end()
                ->booleanNode('enable_notifications')
                    ->defaultFalse()
                ->end()
                ->booleanNode('enable_api')
                    ->defaultFalse()
                ->end()
                ->booleanNode('suppress_manual_audits')
                    ->defaultFalse()
                ->end()
                ->booleanNode('notify_only_failed_audits')
                    ->defaultFalse()
                ->end()
                ->scalarNode('notification_email')
                    ->defaultNull()
                ->end()
                ->scalarNode('api_key')
                    ->defaultNull()
                ->end()
                ->enumNode('cron_cycle')
                    ->values([
                        'monthly',
                        'weekly',
                        'daily',
                        'hourly',
                        'minutely',
                    ])
                    ->defaultValue('monthly')
                ->end()
            ->end()
        ;

        return $treeBuilder;
    }
}
