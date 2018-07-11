<?php

namespace Bolt\Extension\Zomars\Instagram;

use Bolt\Extension\SimpleExtension;
use Vinkla\Instagram\Instagram;

/**
 * Instagram extension class.
 *
 * @author Your Name <you@example.com>
 */
class InstagramExtension extends SimpleExtension
{
    /**
     * {@inheritdoc}
     */
    protected function registerTwigFunctions()
    {
        return [
            'instagram' => 'instagramTwigFunction',
            'instagrammediatoken' => 'instagramMediaTokenTwigFunction',
            'instagramtagstoken' => 'instagramTagsTokenTwigFunction',
            'instagramlocationtoken' => 'instagramLocationTokenTwigFunction',
            'instagrammediatokenintendit' => 'instagramMediaTokenIntenditTwigFunction',
        ];
    }

    /**
     * The callback function when {{ my_twig_function() }} is used in a template.
     *
     * @return string
     */
    public function instagramTwigFunction($user)
    {
        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->get($user);

        return $data;
    }

    public function instagramMediaTokenTwigFunction($token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getMediaToken($token, $limit);

        return $data;
    }

    public function instagramMediaTokenIntenditTwigFunction($token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getMediaTokenIntendit($token, $limit);

        return $data;
    } 

    public function instagramTagsTokenTwigFunction($tag, $token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getTagToken($tag, $token, $limit);

        return $data;
    }

    public function instagramLocationTokenTwigFunction($location, $token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getLocationToken($location, $token, $limit);

        return $data;
    }    

}
