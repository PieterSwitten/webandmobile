<?php

namespace AppBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\BrowserKit\Cookie;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;


class AdminControllerTest extends WebTestCase
{
    private $client = null;
    public function setUp()
    {
        $this->client = static::createClient();
    }

    public function testSecuredAdminPage()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/adminpage');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Admin paneel")')->count());

    }

    public function testSecuredArtsenBeheer()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/artscontrolpage');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Artsen beheren")')->count());

    }


    public function testSecuredLocatieBeheer()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/locationcontrolpage');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Locaties beheren")')->count());

    }
    public function testSecuredLocatieDokterBeheer()
    {
        $this->logIn();

        $crawler = $this->client->request('GET', '/locationartspage');

        $this->assertTrue($this->client->getResponse()->isSuccessful());
        $this->assertGreaterThan(0, $crawler->filter('html:contains("Locatie Arts")')->count());

    }

    private function logIn()
    {
        $session = $this->client->getContainer()->get('session');

        $firewall = 'secured_area';
        $token = new UsernamePasswordToken('admin', null, $firewall, array('ROLE_ADMIN'));
        $session->set('_security_'.$firewall, serialize($token));
        $session->save();

        $cookie = new Cookie($session->getName(), $session->getId());
        $this->client->getCookieJar()->set($cookie);
    }

























    /*public function testAdminIndex() {

        $client = static::createclient();
        $crawler = $client->request('GET', '/login',
            array(),
            array(),
            array('PHP_AUTH_USER' => 'user01', 'PHP_AUTH_PW' => '1')
        );

        $form = $crawler->selectButton('Inloggen')->form();
        $form['_username'] = 'user01';
        $form['_password'] = '1';
        $form['_remember_me']->tick();
        $crawler = $client->submit($form);
        $client->followRedirects(true);
        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        var_dump($client->getResponse()->getContent());

    }*/



}
