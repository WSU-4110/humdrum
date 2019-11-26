# Install Guide

The following instructions will get you a copy of the project up and running on your local machine for development and testing purposes.

What things you need to install the software

```
WAMP Server - https://sourceforge.net/projects/wampserver/files/latest/download
Composer - https://getcomposer.org/download/
Spotify Web API - https://github.com/jwilsson/spotify-web-api-php
```

### Installing

1) Pull master branch from repo

```
git pull https://github.com/WSU-4110/humdrum
```

2) Manually move humdrum files to local server through WAMP application. 

```
path: C:\wamp64\www
```

3) Install composer to the php command prompt in the WAMP application.

```
path: C:\wamp64\bin\php
```

4) Install spotify web api to composer

```
command: composer require jwilsson/spotify-web-api-php
```

5) Select local host in the wamp application to view the website.

```
WAMP -> localhost
```
