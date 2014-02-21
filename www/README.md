
# Easy Host / Folder Setup
This folder is the web root of the VM. It maps to /var/www using the shared folders of vagrant / virtualbox.
Nginx is configured that it automatically maps your host to any folder inside this directory with the same name. 
So http://devbox will map to devbox/public, http://myproject.dev will map to myproject.dev/public
