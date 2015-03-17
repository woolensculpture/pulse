<?php

namespace WITR\RSS;

use Illuminate\Support\Collection;
use GuzzleHttp\Client;

class Reader
{

    protected $parser;

    public static function forParser(Parser $parser)
    {
        $reader = new Reader();

        $reader->parser = $parser;

        return $reader;
    }

    public function get()
    {
        $results = new Collection;

        $client = new Client();
        $response = $client->get($this->parser->url(), [
            'headers' => ['User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_10_1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/40.0.2214.111 Safari/537.36']
        ]);
        
        $xml = simplexml_load_string($response->getBody())->channel->item;
        foreach ($xml as $node)
        {
            $this->adjustNamespaces($node);
            $results[] = $this->parser->parse($node);
        }

        return $results;
    }

    private function adjustNamespaces($el)
    {
        foreach ($el->getNamespaces(TRUE) as $prefix => $ns) {
            $children = $el->children($ns);
            foreach ($children as $tag => $content) {
                $el->{$prefix . ':' . $tag} = $content;
            }
        }
    }
}
