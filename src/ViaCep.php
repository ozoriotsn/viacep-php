<?php

namespace Ozoriotsn\ViaCep;

use Ozoriotsn\ViaCep\Address;
use Ozoriotsn\ViaCep\Validation;
use GuzzleHttp\Exception\GuzzleException;


class ViaCep
{
    protected $cep;
 

    /**
     * @throws GuzzleException
     * Find the address information for a given CEP.
     *
     * @param string $cep The CEP to search for.
     * @param string $type The type of response to return.
     * @return mixed The address information.
     * @throws \Exception If an error occurs during the API request.
     */
    public static function findByCep($cep, $type = 'json')
    {
        try {
            $cep = Validation::validateCep($cep);
            $type = Validation::validateType($type);

            $response = Api::viaCep()->request('get', "{$cep}/{$type}/")->getBody();
            $response = json_decode($response);

            return new Address([
                'cep' => $response->cep,
                'logradouro' => $response->logradouro,
                'complemento' => $response->complemento,
                'bairro' => $response->bairro,
                'localidade' => $response->localidade,
                'uf' => $response->uf,
                'ibge' => $response->ibge,
                'gia' => $response->gia,
                'ddd' => $response->ddd,
                'siafi' => $response->siafi

            ]);

        } catch (GuzzleException $e) {
            throw new \Exception($e->getMessage());
        }

    }

}