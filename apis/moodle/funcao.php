<?php namespace moodle;

class moodle
{

     // CREDENCIAIS DE CONEXAO COM A API
     private $base_url;
     private $content_type;
     private $token;


    public function __construct($base_url, $token,$content_type)
    {
        $this->base_url = $base_url;
        $this->content_type = $content_type;
        $this->token = $token;
    }


    public function setParam($data, $route)
    {
        if($data != 0  && $route != 0){
            $this->data = $data;
            $this->route = $route;
            return true;
        }
        else{
            return false;
        }
    }


    public function getData($route,$data)
    {
        $url = $this->base_url  . '?wstoken=2d7f2a965274f2400344bbf9579bb263'. '&moodlewsrestformat=json' .'&wsfunction='. $route . '&courseid=' . $data;
   
        
        /* Define o Header */
        $headers = array();
        $headers[] = 'Content-Type: ' . $this->content_type;
        $headers[] = 'wstoken: ' . $this->token;

        $curl = curl_init();

        //Usando Array pra setar opções do cURL
        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => $headers,
        ));

        $response = curl_exec($curl); //Resultado da resquisão
        //var_dump($response);
        $error = curl_error($curl); //Zero retorno, mesmo tentado força erros.
        $info = curl_getinfo($curl); //Retorno um array 
        //var_dump($info);
        $http_res = curl_getinfo($curl, CURLINFO_HTTP_CODE); //Retorno de error  apenas retorna 200 ou 404


        curl_close($curl);
      


        return $response;
    }
}




