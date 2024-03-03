<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Cache;

class ZohoAuth
{

    private static $oauthUrl = 'https://accounts.zoho.eu/oauth/v2/token';

    // Get the Zoho token.
    public static function getToken(): string | bool
    {

        if (Cache::get('zoho_access_token'))
            return Cache::get('zoho_access_token');
        else
            return self::refreshToken();
    }

    // Get the Zoho authorization token.
    public static function getAuthToken(string $code): array
    {
        $client = new Client();
        $response = $client->post(self::$oauthUrl, [
            'form_params' => [
                'grant_type' => 'authorization_code',
                'client_id' => env('ZOHO_CLIENT_ID'),
                'client_secret' => env('ZOHO_CLIENT_SECRET'),
                'code' => $code,
            ],
        ]);
        return json_decode($response->getBody(), true);
    }

    // Create new token using refresh token
    private static function refreshToken(): string | bool
    {

        try {
            $client = new Client();
            $response = $client->post(self::$oauthUrl, [
                'form_params' => [
                    'refresh_token' => env('ZOHO_REFRESH_TOKEN'),
                    'client_id' => env('ZOHO_CLIENT_ID'),
                    'client_secret' => env('ZOHO_CLIENT_SECRET'),
                    'grant_type' => 'refresh_token',
                ],
            ]);
            $responce = json_decode($response->getBody(), true);
            if (isset($responce['access_token'])) {
                $token = $responce['access_token'];
                Cache::put('zoho_access_token', $token, 3600);
                return $token;
            }
            return false;
        } catch (RequestException $e) {
            return false;
        }
    }
}
