<?php
namespace Ozoriotsn\tests\Address;

use Exception;
use Ozoriotsn\ViaCep\ViaCep;
use Ozoriotsn\ViaCep\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    public function testFindByCepSuccess()
    {
        // Arrange
        $cep = '01001-000';

        // Act
        $address = ViaCep::findByCep($cep, 'json');

        // Assert
        $this->assertInstanceOf(Address::class, $address);
        $this->assertEquals($cep, $address->cep);
        $this->assertEquals('Praça da Sé', $address->logradouro);
        $this->assertEquals('lado ímpar', $address->complemento);
        $this->assertEquals('Sé', $address->bairro);
        $this->assertEquals('São Paulo', $address->localidade);
        $this->assertEquals('SP', $address->uf);
        $this->assertEquals('3550308', $address->ibge);
    }

    
    public function testFindByCepThrowsExceptionForInvalidCep()
    {
        $this->expectException(Exception::class);

        $cep = 'invalid-cep';
        $type = 'json';

        ViaCep::findByCep($cep, $type);
    }


    
}
