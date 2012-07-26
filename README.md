PDNS Edit
===========

PDNS Edit is a Web UI for PowerDNS' MySQL backend. It is intended to make managing large-scale PDNS deployments - such as those operated by ISPs or web hosting providers - easier.

It uses [CakePHP](http://cakephp.net) and Twitter's [Bootstrap](http://twitter.githum.com).

Installation
------------

These instructions assume that you want to host the UI in a folder off your website's root directory. If that's not whaat you want then adapt as necessary.

The assumption is also made that you have the CakePHP framework installed at /opt/frameworks/cakephp. Again, you will have to adapt as needed but I can offer one or two tips that might help below.

1. Create a directory in your webroot directory called pdnsedit and clone the repo into it:

```git clone https://github.com/dermotw/pdnsedit```

2. Create database.php:

```cd app/Config
cp database.php.default database.php```

3. Make whatever changes are necessary in database.php (i.e., edit the $default array that starts at line 62 so that it points at your PowerDNS MySQL database.
4. At the time of writing I haven't implemented a proper auth system so you'll need to make use of .htaccess and Apache's built-in basic authentication stuff. We also need to add some rewrite stuff to the .htaccess file to make the app work. Assuming your htpasswd file is /etc/apache2/pdnsedit.htpass, edit your .htaccess file so that it looks like this:

```<IfModule mod_rewrite.c>
       RewriteEngine on
       RewriteRule    ^$ app/webroot/    [L]
       RewriteRule    (.*) app/webroot/$1 [L]
    </IfModule>
    AuthType Basic
    AuthName "PDNS Editor"
    AuthUserFile /etc/apache2/pdnsedit.htpass
    Require valid-user```
