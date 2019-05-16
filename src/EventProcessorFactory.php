<?php
namespace SSDMTechTest;

class EventProcessorFactory 
{    
    public static function create(string $name, EventStorageInterface $eventStorage) 
    {
        if ($name === "football") {
            return new FootballEventProcessor($eventStorage);
        } else {
            return null;
        }
    }
}