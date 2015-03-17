<?php

namespace WITR\RSS;

use Illuminate\Support\Collection;

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
        
        $xml = simplexml_load_file($this->parser->url())->channel->item;
        foreach ($xml as $node)
        {
            $results[] = $this->parser->parse($node);
        }

        return $results;
    }
}
