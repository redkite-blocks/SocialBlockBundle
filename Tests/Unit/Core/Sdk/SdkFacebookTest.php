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

namespace RedKiteCms\Block\SocialBlockBundle\Tests\Unit\Core\Sdk;

use RedKiteCms\Block\SocialBlockBundle\Core\Sdk\SdkFacebook;

/**
 * LanguagesFormTest
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class SdkFacebookTest extends SdkBase
{  
    /**
     * @dataProvider sdkProvider()
     */
    public function testRender($responseContent, $expectedResult)
    {   
        $expectedCall = (empty($expectedResult)) ? 0 : 1;
        $this->init($responseContent, $expectedResult, $expectedCall);
        if ( ! empty($expectedResult)) {
            $request = $this->getMockBuilder('Symfony\Component\HttpFoundation\Request')
                            ->disableOriginalConstructor()
                            ->getMock()
            ;
            
            $request
                ->expects($this->once())
                ->method('getPreferredLanguage')
            ;
            
            $this->event
                ->expects($this->once())
                ->method('getRequest')
                ->will($this->returnValue($request))
            ;            
        }
    
        $sdk = new SdkFacebook($this->templating);; 
        $sdk->render($this->event);
    }
    
    public function sdkProvider()
    {
        return array(
            array(
                'Page contents',
                '',
            ),
            array(
                'Page contents<div class="fb-like"></div>Page contents',
                'facebook sdk',
            ),
        );
    }
}