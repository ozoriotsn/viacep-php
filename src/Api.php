<?php

namespace Ozoriotsn\ViaCep;

use GuzzleHttp\Client;

class Api
{

    /**
     * @return Client
     */
    public static function viaCep(){

        return new Client([
            'base_uri' => 'https://viacep.com.br/ws/',
            'timeout'  => 2.0,
        ]);
    }

}