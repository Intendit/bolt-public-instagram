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
            'instagramgraphtoken' => 'instagramGraphTokenTwigFunction',
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

        $path = $_SERVER['DOCUMENT_ROOT'].'/extensions/vendor/santinopetrovic/instagram/';
        if (!isset($data["errorinstagram"]) && isset($data) && is_array($data) && !empty($data)) {
            // Write temporary content to the file, so if the instagram crashes, the content will be here.
            file_put_contents($path.'instagram-temp.json', json_encode($data));
            return $data;
        } else {
            if (file_exists($path.'instagram-temp.json')) {
                $instagramTemp = json_decode(file_get_contents($path.'instagram-temp.json'));
                return $instagramTemp;
            } else {
                return $data;
            }

        }
    }

    public function instagramMediaTokenTwigFunction($token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getMediaToken($token, $limit);

        $path = $_SERVER['DOCUMENT_ROOT'].'/extensions/vendor/santinopetrovic/instagram/';
        if (!isset($data["errorinstagram"]) && isset($data) && is_array($data) && !empty($data)) {
            // Write temporary content to the file, so if the instagram crashes, the content will be here.
            file_put_contents($path.'instagram-temp.json', json_encode($data));
            return $data;
        } else {
            if (file_exists($path.'instagram-temp.json')) {
                $instagramTemp = json_decode(file_get_contents($path.'instagram-temp.json'));
                return $instagramTemp;
            } else {
                return $data;
            }

        }
    }

    public function instagramMediaTokenIntenditTwigFunction($token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getMediaTokenIntendit($token, $limit);

        $path = $_SERVER['DOCUMENT_ROOT'].'/extensions/vendor/santinopetrovic/instagram/';
        if (!isset($data["errorinstagram"]) && isset($data) && is_array($data) && !empty($data)) {
            // Write temporary content to the file, so if the instagram crashes, the content will be here.
            file_put_contents($path.'instagram-temp.json', json_encode($data));
            return $data;
        } else {
            if (file_exists($path.'instagram-temp.json')) {
                $instagramTemp = json_decode(file_get_contents($path.'instagram-temp.json'));
                return $instagramTemp;
            } else {
                return $data;
            }

        }
    } 

    public function instagramGraphTokenTwigFunction($limit = 25)
    {
        $config = $this->getConfig();
        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        if (isset($config['instagram_auth_token'])) {
            $data = $instagram->getGraphToken($config['user_id'], $config['instagram_auth_token'], $limit);
        } else {
            if (file_exists($path.'instagram-temp.json')) {
                $instagramTemp = json_decode(file_get_contents($path.'instagram-temp.json'));
                return $data;
            } else {
                return array('errorinstagram' => 'Invalid token.');
            }                        
        }

        $path = $_SERVER['DOCUMENT_ROOT'].'/extensions/vendor/santinopetrovic/instagram/';
        if (!isset($data["errorinstagram"]) && isset($data) && is_array($data) && !empty($data)) {
            // Write temporary content to the file, so if the instagram crashes, the content will be here.
            file_put_contents($path.'instagram-temp.json', json_encode($data));
            return $data;
        } else {
            if (file_exists($path.'instagram-temp.json')) {
                $instagramTemp = json_decode(file_get_contents($path.'instagram-temp.json'));
                return $data;
            } else {
                return $data;
            }

        }
    }   
    
    public function instagramTagsTokenTwigFunction($tag, $token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getTagToken($tag, $token, $limit);

        $path = $_SERVER['DOCUMENT_ROOT'].'/extensions/vendor/santinopetrovic/instagram/';
        if (!isset($data["errorinstagram"]) && isset($data) && is_array($data) && !empty($data)) {
            // Write temporary content to the file, so if the instagram crashes, the content will be here.
            file_put_contents($path.'instagram-temp.json', json_encode($data));
            return $data;
        } else {
            if (file_exists($path.'instagram-temp.json')) {
                $instagramTemp = json_decode(file_get_contents($path.'instagram-temp.json'));
                return $instagramTemp;
            } else {
                return $data;
            }

        }
    }

    public function instagramLocationTokenTwigFunction($location, $token, $limit)
    {

        // Create a new instagram instance.
        $instagram = new Instagram();

        // Fetch the media feed.
        $data = $instagram->getLocationToken($location, $token, $limit);

        $path = $_SERVER['DOCUMENT_ROOT'].'/extensions/vendor/santinopetrovic/instagram/';
        if (!isset($data["errorinstagram"]) && isset($data) && is_array($data) && !empty($data)) {
            // Write temporary content to the file, so if the instagram crashes, the content will be here.
            file_put_contents($path.'instagram-temp.json', json_encode($data));
            return $data;
        } else {
            if (file_exists($path.'instagram-temp.json')) {
                $instagramTemp = json_decode(file_get_contents($path.'instagram-temp.json'));
                return $instagramTemp;
            } else {
                return $data;
            }
        }
    }
}
