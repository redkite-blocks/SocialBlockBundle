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

use Symfony\Component\Templating\EngineInterface;

/**
 * Description of SdkFacebook
 *
 * @author RedKite Labs
 */
abstract class SdkBase implements SdkInterface
{
    protected $templating;
    
    /**
     * Constructor
     * 
     * @param \Symfony\Component\Templating\EngineInterface $templating
     */
    public function __construct(EngineInterface $templating)
    {
        $this->templating = $templating;
    }
    
    /**
     * {@inheritdoc}
     */
    public function getReplacedTag()
    {
        return '</body>';
    }
}
