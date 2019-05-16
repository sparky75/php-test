<?php
namespace SSDMTechTest;

use PHPUnit\Framework\TestCase;

class EventProcessorFactoryTest extends TestCase
{    
    protected $eventStorage;
          
    protected function setUp() : void
    {
        $this->eventStorage = new MockEventStorage();
    }

    /**
     * Creates a FootballEventProcessor
     * @return void
     */ 
    public function testCanCreateAFootballEventProcessor() : void
    {
        $this->assertInstanceOf(FootballEventProcessor::class, 
                                EventProcessorFactory::create("football", $this->eventStorage));
    }
    
    /**
     * Test doesn't create a class with incorrect parameter
     * @return void
     */ 
    public function testDoesNotCreateClassWithIncorrectParameter() : void
    {
        $this->assertNull(EventProcessorFactory::create("hockey", $this->eventStorage));
    }

}
