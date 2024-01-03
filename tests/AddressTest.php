<?php
namespace Ozoriotsn\tests\Address;

use Exception;
use Ozoriotsn\ViaCep\ViaCep;
use Ozoriotsn\ViaCep\Address;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    /**
     * @covers Ozoriotsn\ViaCep\ViaCep::findByCep
     * @covers Ozoriotsn\ViaCep\Validation
     * @covers Ozoriotsn\ViaCep\Api 
     * @covers Ozoriotsn\ViaCep\Address
     * @return void
     */
    public function testFindByCepSuccess()
    {
        // Arrange
        $cep = '01001-000';
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


    /**
     * @covers Ozoriotsn\ViaCep\Validation::validateCep
     * @covers Ozoriotsn\ViaCep\ViaCep::findByCep
     * @return mixed
     */
    public function testFindByCepThrowsExceptionForInvalidCep()
    {
    
        // Assert
        $this->expectException(Exception::class);

        // Act
        ViaCep::findByCep('123', 'json');


    }

}
