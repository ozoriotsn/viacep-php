<?php
namespace Ozoriotsn\tests\ApiTest;

use GuzzleHttp\Client;
use Ozoriotsn\ViaCep\Api;
use PHPUnit\Framework\TestCase;


class ApiTest extends TestCase
{
    /**
     * @covers Ozoriotsn\ViaCep\Api::viaCep
     */
    public function testViaCepReturnsInstanceOfClient()
    {
        $client = Api::viaCep();

        $this->assertInstanceOf(Client::class, $client);
    }


}
