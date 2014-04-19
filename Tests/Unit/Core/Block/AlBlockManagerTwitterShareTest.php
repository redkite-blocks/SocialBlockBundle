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

namespace RedKiteCms\Block\SocialBlockBundle\Tests\Unit\Core\Block;

use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Tests\Unit\Core\Content\Block\Base\BlockManagerContainerBase;
use RedKiteCms\Block\SocialBlockBundle\Core\Block\AlBlockManagerTwitterShare;

/**
 * AlBlockManagerTwitterShareTest
 */
class AlBlockManagerTwitterShareTest extends BlockManagerContainerBase
{    
    public function testDefaultValue()
    {
        $expectedValue = array(
            'Content' => '{
                "0" : {
                    "url" : "",
                    "text" : "",
                    "via" : "",
                    "related" : "",
                    "hashtags" : "",
                    "size" : "",
                    "dnt" : "", 
                    "count" : "", 
                    "lang" : ""
                 }
            }'
        );

        $this->initContainer(); 
        $blockManager = new AlBlockManagerTwitterShare($this->container, $this->validator);
        $this->assertEquals($expectedValue, $blockManager->getDefaultValue());
    }
    
    public function testEditorParameters()
    {
        $value =
        '{
            "0" : {
                "url" : "",
                "text" : "",
                "via" : "",
                "related" : "",
                "hashtags" : "",
                "size" : "",
                "dnt" : "", 
                "count" : "", 
                "lang" : ""
            }
        }';

        $block = $this->initBlock($value);
        $this->initContainer();
        
        $formType = $this->getMock('Symfony\Component\Form\FormTypeInterface');
        $this->container->expects($this->at(3))
                        ->method('get')
                        ->with('twitter_share.form')
                        ->will($this->returnValue($formType))
        ;
        
        $form = $this->getMockBuilder('Symfony\Component\Form\Form')
                    ->disableOriginalConstructor()
                    ->getMock();
        $form->expects($this->once())
            ->method('createView')
        ;
        
        $formFactory = $this->getMock('Symfony\Component\Form\FormFactoryInterface');
        $formFactory->expects($this->once())
                    ->method('create')
                    ->will($this->returnValue($form))
        ;
        
        $this->container->expects($this->at(4))
                        ->method('get')
                        ->with('form.factory')
                        ->will($this->returnValue($formFactory))
        ;
        
        $blockManager = new AlBlockManagerTwitterShare($this->container, $this->validator);
        $blockManager->set($block);
        $blockManager->editorParameters();        
    }
    
    /**
     * @dataProvider getHtmlProvider
     */
    public function testGetHtml($value, $expectedTag)
    {
        $block = $this->initBlock($value);
        $this->initContainer();
        
        $blockManager = new AlBlockManagerTwitterShare($this->container, $this->validator);
        $blockManager->set($block);
        
        $expectedResult = array('RenderView' => array(
            'view' => 'SocialBlockBundle:Content:twitter_share.html.twig',
            'options' => array(
                'data' => $expectedTag,
                'block_manager' => $blockManager,
            ),
        ));
        
        $this->assertEquals($expectedResult, $blockManager->getHtml());
    }
    
    public function getHtmlProvider()
    {   
        return array(
            array(
                '{
                    "0" : {
                        "url" : "",
                        "text" : "",
                        "via" : "",
                        "related" : "",
                        "hashtags" : "",
                        "size" : "",
                        "dnt" : "", 
                        "count" : "", 
                        "lang" : ""
                    }
                }',
                '',
            ),
            array(
                '{
                    "0" : {
                        "url" : "/path/to/twitter",
                        "text" : "an awesome tweet",
                        "via" : "",
                        "related" : "",
                        "hashtags" : "#RedKiteCmscms",
                        "size" : "",
                        "dnt" : "", 
                        "count" : "", 
                        "lang" : ""
                    }
                }',
                'data-url="/path/to/twitter" data-text="an awesome tweet" data-hashtags="#RedKiteCmscms"',
            ),
            array(
                '{
                    "0" : {
                        "url" : "/path/to/twitter",
                        "text" : "an awesome tweet",
                        "via" : "@RedKiteCmscms",
                        "related" : "@RedKiteCmscms",
                        "hashtags" : "#RedKiteCmscms",
                        "size" : "large",
                        "dnt" : "true", 
                        "count" : "vertical", 
                        "lang" : "en"
                    }
                }',
                'data-url="/path/to/twitter" data-text="an awesome tweet" data-via="@RedKiteCmscms" data-related="@RedKiteCmscms" data-hashtags="#RedKiteCmscms" data-size="large" data-dnt="true" data-count="vertical" data-lang="en"',
            ),
        );
    }
    
    private function initBlock($value)
    {
        $block = $this->getMock('RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Model\Block');
        $block->expects($this->once())
              ->method('getContent')
              ->will($this->returnValue($value));

        return $block;
    }
}
