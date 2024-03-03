<?php

namespace App\Helpers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class Zoho
{

    // Create record in Zoho CRM 
    public function createRecord($module, $data): bool
    {
        $body = [
            'json' => [
                'data' => $data,
                'trigger' => [
                    'approval',
                    'workflow',
                    'blueprint'
                ],
            ]
        ];
        try {
            $response = $this->ZohoRecordRequest('post', $module, $body);
            if ($response['data'][0]['code'] == 'SUCCESS') {
                return true;
            }
            return false;
        } catch (RequestException) {
            return false;
        }
    }

    // Get record in Zoho CRM 
    public function getRecord($module): array | bool
    {
        $body = ['query' => ['fields' => 'Account_Name']];
        try {
            $response = $this->ZohoRecordRequest('get', $module, $body);
            if ($response && $data = $response['data'])
                return $data;
            return false;
        } catch (RequestException $e) {
            return false;
        }
    }

    private function ZohoRecordRequest($req_type, $module, array $body)
    {
        $request_data = [
            'headers' => [
                'Authorization' => 'Zoho-oauthtoken ' . ZohoAuth::getToken(),
            ]
        ];
        $request_data = array_merge($request_data, $body);

        $client = new Client();
        $response = $client->$req_type('https://www.zohoapis.eu/crm/v6/' . $module, $request_data);
        return json_decode($response->getBody(), true);
    }
}
