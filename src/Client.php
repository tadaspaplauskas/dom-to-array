<?php

namespace DOMToArray;

use Goutte\Client as GoutteClient;

class Client extends BaseClient
{
    protected $url;

    public function __construct($url)
    {
        if (!filter_var($source, FILTER_VALIDATE_URL)) {
            throw new \InvalidArgumentException('Invalid URL');
        }

        $this->url = $url;
    }

    public function array()
    {
        $nodes = $this->nodes();

        return $this->buildTree($nodes);

    }

    public function json($jsonFlag = JSON_PRETTY_PRINT)
    {
        return json_encode($this->array(), $jsonFlag);
    }

    protected function nodes()
    {
        $client = new GoutteClient();

        $nodes = $client->request('GET', $this->url);

        return $nodes;
    }

    protected function buildTree($nodes)
    {
        $tree = [];

        foreach ($nodes as $node) {
            if ($node instanceof \DOMElement) {

                $attributes = [];
                foreach ($node->attributes as $attribute) {
                    $attributes[$attribute->name] = $attribute->value;
                }

                $tree[] = [
                    'tag' => $node->tagName,
                    'attributes' => $attributes,
                    'text' => trim($node->textContent),
                    'children' => $this->arrayTree($node->childNodes)
                ];
            }
        }

        return $tree;
    }
}
