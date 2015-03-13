<?php

namespace WITR\Slideshow;

class Slide
{
    protected $show;
    protected $type;

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

    public function displayIndex($index)
    {
        $this->index = $index;
    }

    public function displayText()
    {
        if ($this->type == 'EVENT')
        {
            return;
        }

        if ($this->index == 0)
        {
            return '&#9658;&nbsp;Now Playing';
        }

        if ($this->index == 1)
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
}
