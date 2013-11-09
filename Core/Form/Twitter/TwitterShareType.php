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

namespace RedKiteCms\Block\SocialBlockBundle\Core\Form\Twitter;

use RedKiteLabs\RedKiteCmsBundle\Core\Form\JsonBlock\JsonBlockType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Implements the form to manage the facebook like button attributes
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class TwitterShareType extends JsonBlockType
{
    /**
     *  @{inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url');
        $builder->add('text', 'textarea');
        $builder->add('via');
        $builder->add('related');
        $builder->add('hashtags');
        $builder->add('size', 'choice', array('choices' => array('' => 'small', 'large' => 'large')));
        $builder->add('dnt', 'choice', array('choices' => array('' => 'false', 'true' => 'true')));
        $builder->add('count', 'choice', array('choices' => array('horizontal' => 'horizontal', 'vertical' => 'vertical', 'none' => 'false')));
        $builder->add('lang');
        
        parent::buildForm($builder, $options);            
    }
}
