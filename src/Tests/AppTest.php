<?php

use Silex\WebTestCase;

class AppTest extends WebTestCase
{
    public function createApplication()
    {
        return require __DIR__ . '/../bootstrap.php';
    }

    public function testContent()
    {
        $client = $this->createClient();
        $crawler = $client->request('GET', '/');

        $this->assertSame(200, $client->getResponse()->getStatusCode());
        $this->assertCount(1, $crawler->filter('h1:contains("Marcel Kraus")'));
        $this->assertCount(1, $crawler->filter('h2:contains("iOS- & Web-Entwickler bei Chefkoch.de")'));
        $this->assertCount(1, $crawler->filter('h2:contains("Selbstständiger Web-Entwickler und IT-Dienstleister")'));
    }
}
