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

namespace RedKiteCms\Block\SocialBlockBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use RedKiteCms\Block\SocialBlockBundle\Core\Compiler\SdkCompilerPass;

class SocialBlockBundle extends Bundle
{
    /**
     * @inheritdoc
     */
    public function build(\Symfony\Component\DependencyInjection\ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new SdkCompilerPass());
    }
}
