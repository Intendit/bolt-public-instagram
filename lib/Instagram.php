<?php

/*
 * This file is part of Instagram.
 *
 * (c) Vincent Klaiber <hello@vinkla.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace Vinkla\Instagram;

use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;

/**
 * This is the instagram class.
 *
 * @author Vincent Klaiber <hello@vinkla.com>
 */
class Instagram
{
    /**
     * The guzzle http client.
     *
     * @var \GuzzleHttp\ClientInterface
     */
    protected $client;

    /**
     * Create a new instagram instance.
     *
     * @param \GuzzleHttp\ClientInterface $client
     *
     * @return void
     */
    public function __construct(ClientInterface $client = null)
    {
        $this->client = $client ?: new Client();
    }

    /**
     * Fetch the media items.
     *
     * @param string $user
     *
     * @throws \Vinkla\Instagram\InstagramException
     *
     * @return array
     */
    public function get(string $user): array
    {
        try {
            $url = sprintf('https://www.instagram.com/%s/?__a=1', $user);

            $response = $this->client->get($url);

            return json_decode((string) $response->getBody(), true)['user']['media']['nodes'];
        } catch (RequestException $e) {
            return array('errorinstagram' => 'The user was not found.');
        }
    }

    public function getMediaToken(string $token, string $limit): array
    {
        try {
            $url = sprintf('https://api.instagram.com/v1/users/self/media/recent?access_token=%s&count=%s', $token, $limit);

            $response = $this->client->get($url);

            return json_decode((string) $response->getBody(), true)['data'];
        } catch (RequestException $e) {
            return array('errorinstagram' => 'Invalid token or limit.');
        }
    }

    public function getTagToken(string $tag, string $token, string $limit): array
    {
        try {
            $url = sprintf('https://api.instagram.com/v1/tags/%s/media/recent?access_token=%s&count=%s', $tag, $token, $limit);

            $response = $this->client->get($url);

            return json_decode((string) $response->getBody(), true)['data'];
        } catch (RequestException $e) {
            return array('errorinstagram' => 'Invalid token, tag or limit.');
        }
    }
}
