<?php
namespace InmuebleBundle\Tests\Utility;

use InmuebleBundle\Utility\CalcularTiempo;

class CalcularTiempoTest extends PHPUnit_Framework_TestCase
{
    public function testCalcularTiempo(){
        $calc = new CalcularTiempo();
        $result = $calc->calcularTiempoAnuncio();

        $this->assertEmpty($result);
    }
}