<?php
/*
Data handler for dynamic content via xml. Loops though .xml where the domain data is stored, and makes it avialable for use.
It matches the site url to the url tag in the xml file, and makes that set of tags available to udpate the page with.
Potential use: add symbolic link to one index file in multiple web roots.

Usage Example: 
xmlPage(myfile.xml);
echo $domain;
echo $title;
echo $meta_description;
echo $keywords;

xml file examole: 
<?xml version="1.0" encoding="UTF-8"?>
<sites>
<site>
  <url>http://yourdomain.com</url>
  <title>DEMO</title>
  <meta>A function that helps add content dynamically by matching url.</meta>
  <keywords>A bunch of decriptive keywords here.</keywords>
</site>
</sites>  
*/

function xmlPage($xmlFile){

// Get hostname (URL) for matching $url to a value in the array
$url = "http://".$_SERVER['HTTP_HOST'];

//Load xml file into an array
$xmlData = simplexml_load_file($xmlFile);

//Loop through array, match value to current url(hostname), and assign array values to variables 

	foreach($xmlData->site as $site)
	{
		if($site->url == $url)
		{

		$domain = $site->url;
		$title = $site->title;
		$meta_description = $site->meta;
		$keywords = $site->keywords;

		}

	}

?>
}
