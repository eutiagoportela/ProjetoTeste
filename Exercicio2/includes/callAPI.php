<?php

function call_api($url) {


    $curl = curl_init($url);
    curl_setopt_array($curl,[
        CURLOPT_URL            => $url,
        CURLOPT_CUSTOMREQUEST  => "GET",
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_USERAGENT      => 'TESTE'
    ]);

      //executa requisicao
      $resultado = json_decode(curl_exec($curl));

      //fecha conexao
      curl_close($curl);

      if(curl_getinfo($curl, CURLINFO_HTTP_CODE) != 200)
       return false;
      else
      return $resultado;

}

?>



