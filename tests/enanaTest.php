<?php

use PHPUnit\Framework\TestCase;
include './src/Enana.php';

class EnanaTest extends TestCase {
    
    public function testCreandoEnana() {
        #Se probará la creación de enanas vivas, muertas y en limbo y se comprobará tanto la vida como el estado
        $enana = new Enana("Borja", 10);
        $this->assertEquals("viva", $enana->getSituacion());

        $enana2 = new Enana("Sergio", 0);
        $this->assertEquals("limbo", $enana2->getSituacion());

        $enana3 = new Enana("Xavi", -2);
        $this->assertEquals("muerta", $enana3->getSituacion());
    }
    public function testHeridaLeveVive() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida suficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es mayor que 0 y además que su situación es viva
        $enana = new Enana("Borja", 20);
        $enana->heridaLeve();
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testHeridaLeveMuere() {
        #Se probará el efecto de una herida leve a una Enana con puntos de vida insuficientes para sobrevivir al ataque
        #Se tendrá que probar que la vida es menor que 0 y además que su situación es muerta
        $enana = new Enana("Borja", 5);
        $enana->heridaLeve();
        $this->assertEquals("muerta", $enana->getSituacion());
    }

    public function testHeridaGrave() {
        #Se probará el efecto de una herida grave a una Enana con una situación de viva.
        #Se tendrá que probar que la vida es 0 y además que su situación es limbo
        $enana = new Enana("Borja", 20);
        $enana->heridaGrave();
        $this->assertEquals(0, $enana->getPuntosVida());
        $this->assertEquals("limbo", $enana->getSituacion());
    }
    
    public function testPocimaRevive() {
        #Se probará el efecto de administrar una pócima a una Enana muerta pero con una vida mayor que -10 y menor que 0
        #Se tendrá que probar que la vida es mayor que 0 y que su situación ha cambiado a viva
        $enana = new Enana("Borja", -5);
        $this->assertEquals("muerta", $enana->getSituacion());
        $enana->pocima();
        $this->assertEquals("viva", $enana->getSituacion());
    }

    public function testPocimaNoRevive() {
        #Se probará el efecto de administrar una pócima a una Enana en el libo
        #Se tendrá que probar que la vida y situación no ha cambiado
        $enana = new Enana("Borja", 0);
        $this->assertEquals("limbo", $enana->getSituacion());
        $enana->pocima();
        $this->assertEquals("limbo", $enana->getSituacion());
    }

    public function testPocimaExtraLimbo() {
        #Se probará el efecto de administrar una pócima Extra a una Enana en el limbo.
        #Se tendrá que probar que la vida es 50 y la situación ha cambiado a viva.

    }
}
?>