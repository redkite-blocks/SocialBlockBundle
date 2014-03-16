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

namespace RedKiteCms\Block\SocialBlockBundle\Tests\Unit\Core\Form\Twitter;

use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Tests\Unit\Core\Form\Base\AlBaseType;
use RedKiteCms\Block\SocialBlockBundle\Core\Form\Twitter\TwitterShareType;

/**
 * LanguagesFormTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class TwitterShareTypeTest extends AlBaseType
{
    protected function configureFields()
    {
        return array(
            'url',
            'text',
            'via',
            'related',
            'hashtags',
            'size',
            'dnt',
            'count',
            'lang',
        );
    }
    
    protected function getForm()
    {
        return new TwitterShareType();
    }
    
    public function testGetName()
    {
        $this->assertEquals('al_json_block', $this->getForm()->getName());
    }
}
