<?php

namespace Prewk;
include_once 'XmlStringStreamer.php';

// auto-loader to include all required files
spl_autoload_register(function ($class) {
    $class = str_replace(array('Prewk\\', '\\'), array('./', '/'), $class);
    include $class . '.php';
});

$options = array('checkShortClosing'=>false, 'uniqueNode'=>'customer');
$parser = XmlStringStreamer::createUniqueNodeParser('test.xml', $options);
// $options = array();
// $parser = XmlStringStreamer::createStringWalkerParser('test.xml', $options);
while ($node = $parser->getNode()) {
	$simpleXmlNode = simplexml_load_string($node);
    echo (string)$simpleXmlNode->firstName."\n";
}
