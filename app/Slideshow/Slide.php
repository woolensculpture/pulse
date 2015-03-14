<?php

namespace WITR\Slideshow;

class Slide
{
    protected $show;
    protected $type;
    protected $playOrder;
    protected $index;

    public static function fromScheduledShow($show)
    {
        $slide = new Slide();

        $slide->type = 'SHOW';
        $slide->show = $show;

        return $slide;
    }

    public static function fromEvent($event)
    {
        $slide = new Slide();

        $slide->type = 'EVENT';
        $slide->event = $event;

        return $slide;
    }

    public function playOrder($playOrder)
    {
        $this->playOrder = $playOrder;
    }

    public function displayText()
    {
        if ($this->type == 'EVENT')
        {
            return;
        }

        if ($this->playOrder == 0)
        {
            return '&#9658;&nbsp;Now Playing';
        }

        if ($this->playOrder == 1)
        {
            return 'Up Next:';
        }

        return $this->show->getRelativeAirDate() . ' ' . $this->show->timespan();
    }

    public function image()
    {
        if ($this->type == 'EVENT')
        {
            return $this->event->picture;
        }

        return $this->show->sliderPicture();
    }

    public function textStyle()
    {
        if ($this->type != 'SHOW')
        {
            return;
        }
        
        return $this->show->sliderStyle();
    }

    public function url()
    {
        if ($this->type != 'EVENT')
        {
            return;
        }

        return $this->event->url;
    }

    public function type()
    {
        return $this->type;
    }

    public function index($index)
    {
        $this->index = $index;
    }

    public function displayIndex()
    {
        $display = [
            0 => 'first',
            1 => 'second',
            2 => 'third',
            3 => 'fourth',
        ];
        return $display[$this->index];
    }
}
