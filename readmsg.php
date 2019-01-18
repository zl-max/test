<?php  
$xml=simplexml_load_file("message.xml");
echo $xml->getName()."<br>";
foreach ($xml->children() as $value) {
	echo $value->getName()."=".$value."<br>";
}

echo  getcwd();
?>