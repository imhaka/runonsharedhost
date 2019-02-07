<?php
header("Content-Type: application/json; charset=utf-8");
include_once 'Operation.php';

$operation = new Operation();
//echo $operation->run("ps aux");

$server = $_GET["server"]; // server path on host ex: node/bin/node
$app = $_GET["app"]; // app path on host ex: myapp/index.js
$kill = $_GET["kill"]; // pid
$listpid = $_GET["listpid"]; // active pid list
$process = $_GET["process"]; //  process is active

if (isset($server) && isset($app)) {
    echo $operation->run("$server $app");
} else if (isset($kill)) {
    echo $operation->kill($kill);
} else if (isset($listpid)) {
    echo $operation->getPids();
} else if (isset($_GET["process"])) {
    echo $operation->processExists($process);
}