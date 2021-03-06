
# Hair Salon Directory App

##### _User builds a directory of clients based on which stylist they belong to. 8/21/2015_

#### Charles Moss

## Description

_User enters a "stylist" and corresponding "clients" to create a directory listing by stylist. User can edit the name of both "stylist" and "client" as well an delete._

## Setup

When installing from source you may notice that once you have cloned this repo, that this project makes use of a PHP Dependency Manager: [Composer](https://github.com/composer/composer). Once you have Composer installed you can acquire any project dependencies via your shell by entering:

```
$ composer install
```

_You then only need to start up a local PHP server from within the "web" directory within the project's folder and point your browser to whatever local host server you have created._

## Database Setup

```
-> CREATE DATABASE hair_salon;

-> USE hair_salon;

-> CREATE TABLE stylists (id serial PRIMARY KEY, name varchar (255));

-> CREATE TABLE clients (id serial PRIMARY KEY, name varchar (255), stylist_id int, appointment date);


```

To produce the "hair_salon_test" database, make a copy via myPHPadmin by selecting "hair_salon" and clicking the "Operations" tab. You will see a "copy database to:" section, fill the input with "hair_salon_test", select "Structure only", and click "Go".

## Technologies Used

_This project makes use of PHP, mySQL, the testing framework [PHPUnit](https://phpunit.de/), the micro-framework [Silex](http://silex.sensiolabs.org/), and uses [Twig](http://twig.sensiolabs.org/) templates._

## Sad Violin Music

_Due to a 2.5 hour detour through local mySQL config quirks hell. You will find that this is not complete. I will be resubmitting asap._

## To Do

* finish client class and tests **completed 8/23/15**
* finish client routes
* finish client twig
* confirm features
* provide documentation of db / export **completed 8/23/15**
* polish

### Legal

Copyright (c) 2015 Charles Moss

This software is licensed under the MIT license.

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
