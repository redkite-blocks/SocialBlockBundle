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

use RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Form\JsonBlock\JsonBlockType;
use Symfony\Component\Form\FormBuilderInterface;

/**
 * Implements the form to manage the facebook open graph attributes
 *
 * @author RedKite Labs <info@redkite-labs.com>
 */
class FacebookOpenGraphType extends \RedKiteLabs\RedKiteCms\RedKiteCmsBundle\Core\Form\Base\BaseBlockType
{
    /**
     *  @{inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('url');
        $builder->add('title');
        $builder->add('type', 'choice', array('choices' => 
            array(        
                "actor" => "actor",
                "album" => "album",
                "article" => "article",
                "athlete" => "athlete",
                "author" => "author",
                "band" => "band",
                "bar" => "bar",
                "blog" => "blog",
                "book" => "book",
                "cafe" => "cafe",
                "cause" => "cause",
                "city" => "city",
                "company" => "company",
                "country" => "country",
                "director" => "director",
                "drink" => "drink",
                "food" => "food",
                "game" => "game",
                "government" => "government",
                "hotel" => "hotel",
                "landmark" => "landmark",
                "movie" => "movie",
                "musician" => "musician",
                "non_profit" => "non_profit",
                "politician" => "politician",
                "product" => "product",
                "public_figure" =>"public_figure", 
                "restaurant" => "restaurant",
                "school" => "school",
                "song" => "song",
                "sport" => "sport",
                "sports_league" =>"sports_league", 
                "sports_team" => "sports_team",
                "state_province" => "state_province",
                "tv_show" => "tv_show",
                "university" => "university",
                "website" => "website",
            ),
        ));
        $builder->add('image');
        $builder->add('site_name');
        $builder->add('admins'); 
        
        parent::buildForm($builder, $options);
    }
    
    /**
     *  @{inheritdoc}
     */
    public function getName()
    {
        return 'al_open_graph';
    }
}
