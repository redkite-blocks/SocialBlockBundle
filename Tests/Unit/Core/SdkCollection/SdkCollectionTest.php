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

namespace RedKiteCms\Block\SocialBlockBundle\Tests\Unit\Core\SdkCollection;

use RedKiteLabs\RedKiteCmsBundle\Tests\TestCase;
use RedKiteCms\Block\SocialBlockBundle\Core\SdkCollection\SdkCollection;

/**
 * LanguagesFormTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class RenderSdkListenerTest extends TestCase
{
    public function testAddSkd()
    {
        $sdk = $this->getMock('RedKiteCms\Block\SocialBlockBundle\Core\Sdk\SdkInterface');
        
        $collection = new SdkCollection();
        $collection->addSdk($sdk);
        
        $this->assertCount(1, $collection);
        $this->assertEquals($sdk, $collection->current());
        $this->assertEquals(0, $collection->key());
        $this->assertTrue($collection->valid());
        $collection->next();
        $this->assertFalse($collection->valid());
    }
}