<?php

  define("EVENT_DIR", "./events/");

  $url    = "noevent.php";

  if (isset($_GET["event"])) {
    $filename = EVENT_DIR.$_GET["event"].".json";
    if (file_exists($filename)) {
      $url    = "noevent.php?event=".$_GET["event"];

      $eventdata = json_decode(file_get_contents ($filename), TRUE);

      $now    = time();
      $conf   = $eventdata['configuration'];
      $events = $eventdata['events'];
      $offset = isset($conf["offset"]) ? $conf["offset"] : 0;

      foreach ($events as $event) {
        if (((strtotime($event["start-time"])  - $offset * 60) < $now) && ($now < (strtotime($event["end-time"]) + $offset * 60))) {
          echo $event["url"];
          $url = $event["url"];
          break;
        }
      }
    } else {
      $url    = "noevent.php?event=".$_GET["event"]."&doesnotexist=1";
    }
  }

  header('Location: '.$url,TRUE,307);
  exit;

 ?>
