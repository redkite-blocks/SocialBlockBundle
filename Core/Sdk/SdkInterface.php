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

namespace RedKiteCms\Block\SocialBlockBundle\Core\Sdk;

use Symfony\Component\HttpKernel\Event\FilterResponseEvent;

/**
 * Defines the interface a derived object must implement
 
 * @author RedKite Labs
 */
interface SdkInterface 
{
    /**
     * Renders the SDK code
     *
     * @param \Symfony\Component\HttpKernel\Event\FilterResponseEvent $event
     * @return string
     */
    public function render(FilterResponseEvent $event);
    
    /**
     * Defines the tag that will be replaced to join the rendered SDK
     *
     * @return string
     */
    public function getReplacedTag();
}
