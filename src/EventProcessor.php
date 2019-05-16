<?php
namespace SSDMTechTest;

abstract class EventProcessor
{
    protected $sport;
    protected $eventTypes = [];
    protected $eventStorage;
   
    public function __construct(EventStorageInterface $eventStorage) 
    {
        $this->eventStorage = $eventStorage;
    }

    /**
     * Processes an event
     * @param  EventInterface $event
     * @return bool
     */    
    public function processEvent(EventInterface $event) : bool 
    {        
        $success = false;

        if ($event->getSport() == $this->sport) {
         
            if (in_array($event->getEventType(), $this->eventTypes)) {
                
                $this->eventStorage->store($event);
                $success = true;
                
            }            
            
        }
        return $success;       
    }  
}
