<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class PatientControllerTest extends WebTestCase
{
    public function testDokterprofielen() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/dokterprofielen');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Overzicht dokters', $heading);
    }

    public function testAfspraakmaken() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Welkom!', $heading);
    }

}
