<?php

include("cleanmyhtml.class.php");

//If you want OB, put this on the top and see the bottom line:
ob_start();

//Constuction of object
$cleaning_object = new CleanOutput();

//Get HTML
$google_HTML = file_get_contents("http://www.google.com");

//Clean and print
$cleaning_object->process($google_HTML);
$cleaning_object->show();

//Reset object for new use
$cleaning_object->reset();



/*      Configuring output       */
$cleaning_object->trace = TRUE; //This enables trace-lines
$cleaning_object->indent = "\t"; //This changes the indent-level to be a tab

//Clean, print and reset with new configuration
$cleaning_object->process($google_HTML);
$cleaning_object->show();
$cleaning_object->reset();



/*      Cleaning XML       */
$rss_feed = file_get_contents("http://www.xml.com/cs/xml/query/q/19");
$cleaning_object->setXML();
$cleaning_object->show();

//Continuation of OB
$o = $cleaning_object->ob_clean(ob_get_contents());
ob_end_clean();
echo $o;
//End OB
?>