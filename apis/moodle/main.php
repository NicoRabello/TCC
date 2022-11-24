<?php namespace moodle;

header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'funcao.php';
include_once 'config.php';

$moodle = new  moodle($BASE_URL, $TOKEN, $CONTENT_TYPE);

//https://moodle.embracore.com.br/webservice/rest/server.php?wstoken=2d7f2a965274f2400344bbf9579bb263&moodlewsrestformat=json&wsfunction=core_course_get_courses  
//https://moodle.embracore.com.br/webservice/rest/server.php?wstoken=73c8b262771558df8bc4728dd16843f5&moodlewsrestformat=json&wsfunction=gradereport_user_get_grade_items&courseid=2
// Parametros vindos via GET, no $_REQUEST
//$route = isset($_REQUEST['route'])? $_REQUEST['route'] : 0;
$route = isset($_REQUEST['route'])? $_REQUEST['route'] : 0;
$data = isset($_REQUEST['data'])? $_REQUEST['data'] : 0;


// Método da própria classe para setar os atribuitos
$set_param = $moodle->setParam($route,$data);

//var_dump($search);
if($set_param && !empty($data)){

   
    $return = $moodle->getData($route,$data);
    if(!empty($return)){
        http_response_code(200);
        header('Content-Type: application/json');
        echo $return; // Já em JSON
    }
    else{
        http_response_code(404);
        header('Content-Type: application/json');
        echo json_encode(array("message" => "Data not found. Message: " . json_decode($return)->message));
    }
}
else{
    http_response_code(401);
    header('Content-Type: application/json');
    echo json_encode(array("message" => "Fail to set params."));




 }




