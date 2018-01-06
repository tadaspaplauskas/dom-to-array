# dom-to-array
You pass an url to a HTML page, it builds an array or JSON structure representing the DOM. Framework agnostic.

## Install

`composer require tadaspaplauskas/dom-to-array`

Do not forget to require autoload file if your framework doesn't do that for you.

## Sample usage

```
<?php

require 

use DOMToArray\Client;

$client = new Client('http://info.cern.ch');

// returns tree representing DOM
$tree = $client->array();

// returns JSON representation of the same tree structure
// you can pass a json_encode() option to it,
// which defaults to JSON_PRETTY_PRINT
$json = $client->json();

echo $json;
```

Will output:
```
{
    "tag": "html",
    "attributes": [],
    "text": "http:\/\/info.cern.ch\n\n\nhttp:\/\/info.cern.ch - home of the first website\nFrom here you can:\n\nBrowse the first website\nBrowse the first website using the line-mode browser simulator\nLearn about the birth of the web\nLearn about CERN, the physics laboratory where the web was born",
    "children": [
        {
            "tag": "head",
            "attributes": [],
            "text": "",
            "children": []
        },
        {
            "tag": "body",
            "attributes": [],
            "text": "http:\/\/info.cern.ch\n\n\nhttp:\/\/info.cern.ch - home of the first website\nFrom here you can:\n\nBrowse the first website\nBrowse the first website using the line-mode browser simulator\nLearn about the birth of the web\nLearn about CERN, the physics laboratory where the web was born",
            "children": [
                {
                    "tag": "header",
                    "attributes": [],
                    "text": "http:\/\/info.cern.ch",
                    "children": [
                        {
                            "tag": "title",
                            "attributes": [],
                            "text": "http:\/\/info.cern.ch",
                            "children": []
                        }
                    ]
                },
                {
                    "tag": "h1",
                    "attributes": [],
                    "text": "http:\/\/info.cern.ch - home of the first website",
                    "children": []
                },
                {
                    "tag": "p",
                    "attributes": [],
                    "text": "From here you can:",
                    "children": []
                },
                {
                    "tag": "ul",
                    "attributes": [],
                    "text": "Browse the first website\nBrowse the first website using the line-mode browser simulator\nLearn about the birth of the web\nLearn about CERN, the physics laboratory where the web was born",
                    "children": [
                        {
                            "tag": "li",
                            "attributes": [],
                            "text": "Browse the first website",
                            "children": [
                                {
                                    "tag": "a",
                                    "attributes": {
                                        "href": "http:\/\/info.cern.ch\/hypertext\/WWW\/TheProject.html"
                                    },
                                    "text": "Browse the first website",
                                    "children": []
                                }
                            ]
                        },
                        {
                            "tag": "li",
                            "attributes": [],
                            "text": "Browse the first website using the line-mode browser simulator",
                            "children": [
                                {
                                    "tag": "a",
                                    "attributes": {
                                        "href": "http:\/\/line-mode.cern.ch\/www\/hypertext\/WWW\/TheProject.html"
                                    },
                                    "text": "Browse the first website using the line-mode browser simulator",
                                    "children": []
                                }
                            ]
                        },
                        {
                            "tag": "li",
                            "attributes": [],
                            "text": "Learn about the birth of the web",
                            "children": [
                                {
                                    "tag": "a",
                                    "attributes": {
                                        "href": "http:\/\/home.web.cern.ch\/topics\/birth-web"
                                    },
                                    "text": "Learn about the birth of the web",
                                    "children": []
                                }
                            ]
                        },
                        {
                            "tag": "li",
                            "attributes": [],
                            "text": "Learn about CERN, the physics laboratory where the web was born",
                            "children": [
                                {
                                    "tag": "a",
                                    "attributes": {
                                        "href": "http:\/\/home.web.cern.ch\/about"
                                    },
                                    "text": "Learn about CERN, the physics laboratory where the web was born",
                                    "children": []
                                }
                            ]
                        }
                    ]
                }
            ]
        }
    ]
}
```