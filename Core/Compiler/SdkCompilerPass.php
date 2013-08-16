<?php
/*
 * This file is part of the SocialBlockBundle and it is distributed
 * under the MIT LICENSE. To use this application you must leave intact this copyright 
 * notice.
 *
 * Copyright (c) RedKiteCms <info@redkite-labs.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * For extra documentation and help please visit http://www.redkite-labs.com
 * 
 * @license    MIT LICENSE
 * 
 */

namespace RedKiteCms\Block\SocialBlockBundle\Core\Compiler;

use Symfony\Component\DependencyInjection\Reference;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Register the SkdInterface objects
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class SdkCompilerPass implements CompilerPassInterface
{
    /**
     * {@inheritdoc}
     */
    public function process(ContainerBuilder $container)
    {
        if (false === $container->hasDefinition('social_sdk.sdk_collection')) {
            return;
        }
        
        $definition = $container->getDefinition('social_sdk.sdk_collection');
        foreach ($container->findTaggedServiceIds('social_sdk.sdk_interface') as $id => $attributes) {
            foreach ($attributes as $tagAttributes) {
                $tagAttributes['id'] = $id;
                $definition->addMethodCall('addSdk', array(new Reference($id), $tagAttributes));
            }
        }
    }
}
