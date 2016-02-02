<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class ArtsControllerTest extends WebTestCase
{
    public function testDokterIndex() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/Index');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Dokter paneel', $heading);
    }

    public function testUrenRegelen() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/managehours');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Uren regelen', $heading);
    }

    public function testAfsprakenVerwijderen() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/deleteappointments');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Afspraken verwijderen', $heading);
    }


}
