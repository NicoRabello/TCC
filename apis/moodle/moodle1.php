<?php
require_once "MoodleRest.php";

$token = '2d7f2a965274f2400344bbf9579bb263';


$MoodleRest = new MoodleRest();
$MoodleRest->setServerAddress("https://moodle.embracore.com.br/webservice/rest/server.php");
$MoodleRest->setToken($token);
$MoodleRest->setReturnFormat(MoodleRest::RETURN_JSON);

$json = $MoodleRest->request('core_group_get_groups');

$MoodleRest->printRequest();
echo $json;

