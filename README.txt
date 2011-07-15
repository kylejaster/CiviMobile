CiviMobile

Project Members:

Kyle Jaster - rayogram.com
Xavier Dutoit - techtothepeople.com

Purpose:

A Drupal module (and eventually independant webapp) that leverages the CiviCRM API v3 to provide a small but very effective mobile interface to your CiviCRM installation.

Tentative feature scope of version 1 - kerouac: to be released for CiviCON
- being able to login
- being able to search for a contact,
- display contact details (email, address, phone)
- being able to log a meeting (activity)
- being able to add a contact (name, organisation, email, phone)

DEV & Git
We are using a submodule for jquery-mobile (the 1. branch, beta1 as I'm writing it)
so beside the usual
$git clone
you'll need 
$git submodule init

and beside
$git pull
you need to run
$git submodule updatee

Warning: It seems that jquery-1.5.min.js is missing from the repo (on my TODO)

TODO:

- they are 40 types of entity available on the API, quite a few features to add ;)
Beside that, things like canvassing or updating the status of participants (registered -> attended) seems to be some of the features that would benefit most a mobile interface.

if this project is ever going to grow, it needs a proper architecture on the jquery side
- a templating solution
- a MVC

Any suggestion of plugins to use more than welcome, patch even more welcomed ;)

