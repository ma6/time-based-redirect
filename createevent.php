<?php

function createConfiguration($offset=0)
{
  return array("offset" => $offset);
}

function createEvent($starttime, $endtime, $url)
{
  return array("start-time" => $starttime, "end-time" => $endtime, "url" => $url);
}

function createJson($conf, $events)
{
  return json_encode(array('configuration' => $conf,'events' => $events), JSON_PRETTY_PRINT);
}

$ev =array(createEvent("2019-09-07T15:50+01:00", "2019-09-07T15:50+01:00", "http://test.de/1") ,
        createEvent("2019-09-07T15:50+01:00", "2019-09-07T15:50+01:00", "http://test.de/2") ,
        createEvent("2019-09-07T15:50+01:00", "2019-09-07T15:50+01:00", "http://test.de/3"));

$json = (createJson(createConfiguration(), $ev));

echo $json;
var_dump (json_decode($json, TRUE));

//*/
?>
