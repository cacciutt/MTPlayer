stage { 'first':
    before => Stage['second'],
}

stage { 'second':
    before => Stage['third'],
}

stage { 'third':
    before => Stage['main']
}

class { "apt_get::update":
    stage  => first,
}

class { 'tools':
    stage => second,
}
 
class {'php':
    stage => third,
}

include apt_get::update
include tools
include git
include vim
include mysql
include php
include nginx
include supervisor
include redis
include git
include nodejs
include composer
