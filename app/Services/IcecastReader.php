<?php

namespace WITR\Services;

use stdClass;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;

class IcecastReader
{

    protected $hostname;
    protected $credentials;
    protected $mounts;

    public function __construct($hostname, $credentials, $mounts)
    {
        $this->hostname = $hostname;
        $this->credentials = $credentials;
        $this->mounts = $mounts;
    }

    public function getMounts()
    {
        return $this->mounts;
    }

    public function get($studio)
    {
        $results = new Collection;

        $client = new Client();
        
        $listeners = IcecastListeners::forMounts($this->mounts[$studio]);
        foreach ($this->mounts[$studio] as $mount)
        {
            $response = $client->get($this->hostname . '/admin/listclients?mount=/'. $mount, [
                'auth' => $this->credentials
            ]);
            $xml = simplexml_load_string($response->getBody())->source->listener;
            foreach ($xml as $node)
            {
                $listener = new stdClass;
                $listener->hostname = gethostbyaddr($node->IP);
                $listener->minutesConnected = round($node->Connected / 60);
                $listener->userAgent = $node->UserAgent;
                $listener->mount = $mount;
                $listeners->push($listener);
            }
        }

        return $listeners;
    }
}
