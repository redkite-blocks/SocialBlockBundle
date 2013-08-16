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

namespace RedKiteCms\Block\SocialBlockBundle\Core\Form\Facebook;

use RedKiteLabs\RedKiteCmsBundle\Core\Form\JsonBlock\JsonBlockType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Implements the form to manage the facebook like button attributes
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class FacebookLikeType extends JsonBlockType
{
    /**
     *  @{inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        
        $builder->add('url');
        $builder->add('send', 'checkbox');
        $builder->add('layout', 'choice', array('choices' => array('standard' => 'standard', 'button_count' => 'button_count', 'box_count' => 'box_count')));
        $builder->add('width', 'choice', array('choices' => array("225" => "225", "450" => "450")));
        $builder->add('show_faces', 'checkbox');
        $builder->add('font', 'choice', array('choices' => array('arial' => 'arial', 'lucida grande' => 'lucida grande', 'segoe ui' => 'segoe ui', 'tahoma' => 'tahoma', 'trebuchet ms' => 'trebuchet ms', 'verdana' => 'verdana' )));
        $builder->add('colorscheme', 'choice', array('choices' => array('light' => 'light', 'dark' => 'dark')));
        $builder->add('action', 'choice', array('choices' => array('like' => 'like', 'recommend' => 'recommend')));                
    }
    
    /**
     *  @{inheritdoc}
     */
    public function getDefaultOptions(array $options)
    {
        $values = parent::getDefaultOptions($options);
        
        return $values;
    }
    
    /**
     *  @{inheritdoc}
     */
    public function getName()
    {
        return 'al_like';
    }
}
