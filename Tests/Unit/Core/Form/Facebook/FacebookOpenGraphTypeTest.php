<?php
/**
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

namespace RedKiteCms\Block\SocialBlockBundle\Tests\Unit\Core\Form\Facebook;

use RedKiteLabs\RedKiteCmsBundle\Tests\Unit\Core\Form\Base\AlBaseType;
use RedKiteCms\Block\SocialBlockBundle\Core\Form\Facebook\FacebookOpenGraphType;

/**
 * LanguagesFormTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class FacebookOpenGraphTypeTest extends AlBaseType
{
    protected function configureFields()
    {
        return array(
            'url',
            'title',
            'type',
            'image',
            'site_name',
            'admins',
        );
    }
    
    protected function getForm()
    {
        return new FacebookOpenGraphType();
    }
    
    public function testGetName()
    {
        $this->assertEquals('al_open_graph', $this->getForm()->getName());
    }
}