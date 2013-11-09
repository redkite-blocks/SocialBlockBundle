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
use RedKiteCms\Block\SocialBlockBundle\Core\Form\Facebook\FacebookLikeType;

/**
 * LanguagesFormTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class FacebookLikeTypeTest extends AlBaseType
{
    protected function configureFields()
    {
        return array(
            'url',
            'send',
            'layout',
            'width',
            'show_faces',
            'font',
            'colorscheme',
            'action',
        );
    }
    
    protected function getForm()
    {
        return new FacebookLikeType();
    }
    
    public function testGetName()
    {
        $this->assertEquals('al_like', $this->getForm()->getName());
    }
}
