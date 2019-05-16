<?php
namespace SSDMTechTest;

class FootballEventProcessor extends EventProcessor
{
    protected $sport = "football";
    protected $eventTypes = ['kickoff', 'goal', 'yellowcard', 'redcard', 
                            'penalty', 'halftime', 'fulltime', 'extratime', 'freekick', 'corner'];    
}