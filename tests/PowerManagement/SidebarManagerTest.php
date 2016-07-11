<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class SidebarManagerTest extends TestCase
{
    /**
     * @var \ActLoudBur\PowerManagement\Frame\SidebarManager
     */
    protected $sidebarManager;

    public function testAdd()
    {
        $this->sidebarManager->add('test', []);
        $this->sidebarManager->add('header', [], true);
        $this->sidebarManager->add('test-multi.a', []);
        $this->sidebarManager->add('test-multi.b', []);
        $this->sidebarManager->add('test-multi.b.foo', []);

        $this->assertAttributeEquals([
            'test'       => 'test',
            'header'     => null,
            'test-multi' => [
                'a' => 'test-multi.a',
                'b' => [
                    'foo' => 'test-multi.b.foo',
                ],
            ],
        ], 'items', $this->sidebarManager);
    }

    /**
     * Setup the test environment.
     *
     * @return void
     */
    protected function setUp()
    {
        parent::setUp();

        $this->sidebarManager = new \ActLoudBur\PowerManagement\Frame\SidebarManager();
    }


}
