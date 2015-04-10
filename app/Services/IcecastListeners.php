<?php

namespace WITR\Services;

use Illuminate\Support\Collection;

class IcecastListeners extends Collection
{

    protected $mounts;

    public static function forMounts($mounts)
    {
        $listeners = new IcecastListeners();

        $listeners->mounts = $mounts;

        return $listeners;
    }

    public function getMounts()
    {
        return $this->mounts;
    }

    public function forMount($mount)
    {
        return $this->filter(function($listener) use($mount) {
            return $listener->mount == $mount;
        });
    }

}
