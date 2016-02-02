<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class AdminControllerTest extends WebTestCase
{
    public function testAdminIndex() {
        $client = static::createClient();

        $crawler = $client->request('GET', '/',array(), array(), array(
            'PHP_AUTH_USER' => 'Dylan',
            'PHP_AUTH_PW'   => 'd1',
        ));
        $client->followRedirects(true);
        $link = $crawler->selectLink('Admin paneel')->link();

        $client->click($link);
        var_dump($client->getResponse()->getContent());
        $heading = $crawler->filter('h1')->eq(0)->text();
        $this->assertEquals('Admin paneel', $heading);
    }



}
