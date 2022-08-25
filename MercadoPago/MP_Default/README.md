# Mercado Pago -> Test implementation

## Dependences

The `Mercado Pago` librare will be instaled with **composer**, the if you don't has install it by accessing the server FTP via SSH and run:

```sh
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '55ce33d7678c5a611085589f1f3ddf8b3c52d662cd01d4ba75c0ee0459970c2200a51f492d557530c71c15d8dba01eae') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```

[The complete Composer instalation tutorial you can see on the official page](https://getcomposer.org/download/).

If you already have installed composer, navigate to the instalation dir, and run:

```sh
php composer.phar install
```