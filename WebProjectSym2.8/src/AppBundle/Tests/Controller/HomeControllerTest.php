<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class HomeControllerTest extends WebTestCase
{
    public function testIndex() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Welkom!', $heading);
    }

    public function testTeam()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/team');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Teammembers', $heading);

    }

    public function testLogin() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Inloggen', $heading);
    }

    public function testRegister() {
        $client = static::createClient();
        $crawler = $client->request('GET', '/registerpage');


        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Registreren', $heading);
    }

}