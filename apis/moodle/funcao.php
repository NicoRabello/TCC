<?php namespace moodle;
//Teste de apenas busca por e-mail 





class moodle
{

     // CREDENCIAIS DE CONEXAO COM A API
     private $base_url;
     private $access_token;
    


    public function __construct($base_url, $access_token)
    {
        $this->base_url = $base_url;
        $this->access_token = $access_token;
    }


    public function setParam($route,$access_token)
    {
        if($route != 0 xor $access_token != 0){
            $this->route = $route;
            $this->access_token = $access_token;
            return true;
        }
        else{
            return false;
        }
    }


    public function getData($route)
    {

        $url = $this->base_url . "/". $route;

        /* Define o Header */
        $headers = array();
        $headers[] = 'Content-Type: ' . $this->content_type;
        $headers[] = 'access_token: ' . $this->access_token;

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
        var_dump($info);
        $http_res = curl_getinfo($curl, CURLINFO_HTTP_CODE); //Retorno de error  apenas retorna 200 ou 404


        curl_close($curl);
      


        return $response;
    }
}




