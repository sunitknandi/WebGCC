WebGCC
======


Introduction
------------

Welcome to my little project called WebGCC, a barebones PHP based web interface for the GNU Compiler Collections, that lets you test C and C++ codes online.


Features
--------

* Written in HTML and PHP.
* Accepts code, standard input, command-line arguments, and text input.
* Supports multiple execution sessions.

More features will be added soon, like graphics, a nicer code editor and library selection support.
Feel free to fork my project, modify it and merge the changes back to it.


Requirements
------------

The requirements aren't anything special, just an ordinary LAMP stack. The specific requirements are:
* Linux distribution (preferably Debian)
* Apache webserver (2.2 or greater)
* PHP 5.4 or greater
* shell_exec() should be enabled


Installation manual
-------------------

1. Download the repo as a zip file, extract it locally into a folder named 'webgcc'.

2. (a)  The script files should be placed in /var/www/. This can be achieved by just copying the 'webgcc' script folder into the directory. 

   (b)  Alternatively, if the script is to be hosted by a particular user account, a VirtualHost should be created pointing to the public_html directory of that user. The instructions on creating a VirtualHost can be found in Apache HTTP server manual at http://httpd.apache.org/docs/2.2/vhosts/examples.html. After the VirtualHost is created, the user account must be added to the www-data group, and the group ownership of the public_html directory must be set to www-data, along with the proper permissions.
This is done by issuing the following commands in order in the terminal:

    cd /home/user/ (where 'user' is the username of the user account) , 
    chown -R user.www-data public_html , 
    usermod -a -G www-data user , 
    chmod 775 public_html 

Finally the 'webgcc' script folder must be copied into public_html directory.

3. The 'webgcc' folder must have writeable permissions, so it's most recommended to set the permissions to 775. This is done by navigating to the working directory from the terminal and issuing the command: chmod 775 webgcc

4. Finally the script files should be set with the proper permissions (755). This is done by typing the following commands in order:

    cd webgcc ,
    chmod 755 *


Usage
-----

Just open the URL of the interface site. Rest is self-explanatory.


Changelog
---------

* 18 Dec 2013: Merged changes from Akshit Tripathi's fork. New stylesheet added. Updated the placeholders in the input boxes.
* 16 Dec 2013: Added CodeMirror text editor for line numbers and highlighting (Credits: Aditya Rajan). Changed "Standard input" field into a textarea for taking multi-line input.
* 15 Dec 2013: Fixed output display formatting. Now displays error list only when there is an error/warning. Now executes code only when executable file is present. Better cleanup of session files. Now displays stderr while execution. Added comments and fixed code indentation. Also included a .htaccess file for server security.
* 14 Dec 2013: First release.


More info and discussion
------------------------

Just go to the forum thread http://forum.technofaq.org/discussion/3/a-simple-web-interface-for-gcc and drop in your suggestions, or ask me other queries.
