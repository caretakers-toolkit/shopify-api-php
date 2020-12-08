<?php

namespace Slince\Shopify\Tests\Service\Common;

use GuzzleHttp\Utils;
use Slince\Shopify\Service\Common\NestCrudManager;
use Slince\Shopify\Tests\TestCase;

abstract class NestCurdManagerTestCase extends TestCase
{
    protected function getServiceClass()
    {
        return str_ireplace(['Tests', 'Test'], ['', ''], get_called_class());
    }

    protected function getFixturesDir()
    {
        return str_ireplace(['Slince\Shopify\Tests\Service'], [''], $this->getServiceClass());
    }

    /**
     * @param string $fixture
     *
     * @return NestCrudManager
     */
    public function getService($fixture)
    {
        $class = $this->getServiceClass();

        return new $class($this->getClientMock($fixture));
    }

    public function testFindAll()
    {
        $fixture = $this->getFixturesDir().'/'.'all.json';
        $service = $this->getService($fixture);
        $articles = $service->findAll(1);
        $this->assertInstanceOf($service->getModelClass(), $articles[0]);
    }

    public function testFind()
    {
        $fixture = $this->getFixturesDir().'/'.'view.json';
        $service = $this->getService($fixture);
        $article = $service->find(1, 2);
        $this->assertInstanceOf($service->getModelClass(), $article);
    }

    public function testCreate()
    {
        $fixture = $this->getFixturesDir().'/'.'view.json';
        $service = $this->getService($fixture);
        $json = Utils::jsonDecode(file_get_contents(static::FIXTURES_DIR.'/'.$fixture), true);
        $json = reset($json);
        $article = $service->create(1, $json);
        $this->assertInstanceOf($service->getModelClass(), $article);
    }

    public function testUpdate()
    {
        $fixture = $this->getFixturesDir().'/'.'view.json';
        $service = $this->getService($fixture);
        $json = $this->readFixture($fixture);
        $entity = $service->update(1, 2, reset($json));
        $this->assertInstanceOf($service->getModelClass(), $entity);
    }

    public function testCount()
    {
        $fixture = $this->getFixturesDir().'/'.'count.json';
        $service = $this->getService($fixture);
        $count = $service->count(1);
        $json = Utils::jsonDecode(file_get_contents(static::FIXTURES_DIR.'/'.$fixture), true);
        $this->assertEquals($json['count'], $count);
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testRemove()
    {
        $fixture = $this->getFixturesDir().'/'.'delete.json';
        $service = $this->getService($fixture);
        $service->remove(1, 2);
    }
}