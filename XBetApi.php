<?php

include "Mode.php";
include "Sport.php";

class XBetApi
{
    private const URL = 'https://1xstavka.ru/LineFeed/';
    private $sport = null;
    private $count = 500;
    private $mode = Mode::DEFAULT;

    public $raw = null;

    public function __construct(Sport $sport)
    {
        $this->sport = $sport;
    }

    private function request($type){

        $GET = [
            'sport' => $this->sport,
            'mode' => $this->mode,
            'count' => $this->count
        ];

        return file_get_contents(self::URL . "$type/Get1x2_VZip" . http_build_query($GET));

    }

    public function setMode(Mode $mode){
        $this->mode = $mode;
    }

    public function getLine(){
        $this->raw = $this->request('LineFeed');


    }
}