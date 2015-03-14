<?php

namespace WITR\Slideshow;

use Illuminate\Support\Collection;

class Slides extends Collection
{

    public static function forShows($shows)
    {
        $slides = new Slides();

        foreach ($shows as $key => $show) {
            $slide = Slide::fromScheduledShow($show);
            $slide->playOrder($key);
            $slide->index($key);
            $slides->push($slide);
        }

        return $slides;
    }

    public function addEvent($event)
    {
        $this->pop();
        $this->prepend(Slide::fromEvent($event));
        $index = 0;
        foreach ($this as $value) {
            $value->index($index++);
        }
    }
}
