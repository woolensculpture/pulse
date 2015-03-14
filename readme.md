## Pulse
[![Build Status](https://travis-ci.org/JPBetley/pulse.svg?branch=master)](https://travis-ci.org/JPBetley/pulse)

### Setup
Following the instructions outlined [here](http://laravel.com/docs/5.0/homestead#installation-and-setup).

Once you have have Vagrant, VirtualBox, and Homestead installed, run `homestead edit` and add the following:

```
sites:
    - map: witr.dev
      to: /home/vagrant/Code/pulse/public

databases:
    - web
    - bible
```