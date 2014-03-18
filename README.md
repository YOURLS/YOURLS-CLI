# YOURLS-CLI

A modest CLI (Command Line Interface) client for YOURLS. A work **very much in progress**.

## Installation

* Install required dependencies using Composer
* The script to run is `src/bin/yourls`. Symlink to it from a convenient place (eg `ln -s /path/to/yourls-cli/src/bin/yourls ~/bin/yourls`) or add it to your PATH
* Run `yourls --version` to check if everything is OK

## There's nothing much for the moment

It's merely a POC for now, pretty much inspired by the awesome [wp-cli](http://wp-cli.org).

The goal is probably to have something functional for YOURLS 2.0 --no ETA-- with an extensive set of functions to install, update or use YOURLS via the command line.

Don't you think something like the following would be neat :

```shell
$ yourls core download --latest
$ yourls core config --url=http://sho.rt --user=joe --password=MyP4ssW0rd --dbname=yourls (...)
$ yourls core install 
$ yourls shorturl add --url=http://longurl.com/ --keyword=omg --title="this is a title"
$ yourls shorturl edit --keyword=omg --new_keyword=wtf
* yourls shorturl delete --keyword=wtf
```

Stay tuned! *&#12484;*
