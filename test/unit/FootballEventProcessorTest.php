<?php
namespace SSDMTechTest;

use PHPUnit\Framework\TestCase;

class MockEvent implements EventInterface 
{
    protected $sport;
    protected $eventType;
    
    public function __construct($sport, $eventType)
    {
        $this->sport = $sport;
        $this->eventType = $eventType;
    }
    
    public function getSport() : string 
    {
        return $this->sport;
    }
    
    public function getEventType() : string 
    {
        return $this->eventType;
    }
}

class MockEventStorage implements EventStorageInterface
{
    public function store(EventInterface $event) : bool 
    {
        return true;
    }
}

class FootballEventProcessorTest extends TestCase
{
    private $sport;
    private $eventProcessor;
    private $eventStorage;  

    /**
     * Sets up a test environment for football sport
     */             
    protected function setUp() : void 
    {        
        $this->eventStorage = new MockEventStorage();
        $this->eventProcessor = new FootballEventProcessor($this->eventStorage);             
    }
    
    /**
     * Processes a valid event for football
     * @return void
     */     
    public function testCanProcessAValidEvent() : void
    {        
        $event = new MockEvent("football", "goal");        
        
        $this->assertTrue($this->eventProcessor->processEvent($event));        
    }

    /**
     * Processes an invalid sport event for football
     * @return void
     */       
    public function testCanRejectAnInapplicableSportEvent() : void
    {       
        $event = new MockEvent("hockey", "goal");
        
        $this->assertFalse($this->eventProcessor->processEvent($event));                
    }
    
    /**
     * Processes an invalid event type for football
     * @return void
     */       
    public function testCanRejectAnInapplicableEventTypeForTheCorrectSport() : void
    {
        $event = new MockEvent("football", "noevent");
        
        $this->assertFalse($this->eventProcessor->processEvent($event));                
    }
}
