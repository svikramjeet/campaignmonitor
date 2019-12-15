<?php

namespace Svikramjeet\CampaignMonitor;

use Svikramjeet\CampaignMonitor\Contracts\Campaign as Contract;

class CampaignMonitor  implements Contract
{
    protected $app;
    protected $api_key;

    public function __construct($app, $api_key = null)
    {
        $this->app = $app;
        $this->api_key = $api_key;
    }

    public function campaigns($campaign_id = null)
    {
        return new \CS_REST_Campaigns($campaign_id, $this->getAuthTokens());
    }

    public function clients($client_id = null)
    {
        return new \CS_REST_Clients($client_id, $this->getAuthTokens());
    }
    
    public function people($client_id = null)
    {
        return new \CS_REST_People($client_id, $this->getAuthTokens());
    }

    public function lists($list_id = null)
    {
        return new \CS_REST_Lists($list_id, $this->getAuthTokens());
    }

    public function segments($segment_id = null)
    {
        return new \CS_REST_Segments($segment_id, $this->getAuthTokens());
    }

    public function template($template_id = null)
    {
        return new \CS_REST_Templates($template_id, $this->getAuthTokens());
    }

    public function subscribers($list_id = null)
    {
        return new \CS_REST_Subscribers($list_id, $this->getAuthTokens());
    }

    public function classicSend($client_id = null)
    {
        return new \CS_REST_Transactional_ClassicEmail($this->getAuthTokens(), $client_id);
    }

    public function smartSend($smart_id = null, $client_id = null)
    {
        return new \CS_REST_Transactional_SmartEmail($smart_id, $this->getAuthTokens(), $client_id);
    }

    protected function getAuthTokens(): array
    {
        if($this->api_key != null){
            return [
            'api_key' => $this->api_key
            ];
        }

        return [
            'api_key' => $this->app['config']['campaignmonitor.api_key'],
        ];
    }
}
