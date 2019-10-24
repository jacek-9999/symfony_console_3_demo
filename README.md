Simple app demo with symfony console 3.

App need web directory access by HTTP.
Http access can be configured by vagrant:
```vagrant up``` in directory with Vagrantfile.
Next you need ssh to machine: ```vagrant ssh```
and run bootstrap.sh. This command will setup web directory with apache server.

Instalation:

```cd htdocs```

```composer install```

Tests:
```php vendor/bin/phpunit tests/```

Testing supplier data download:

```php bin/divante.php divante:supplier:sync supplier1```

```php bin/divante.php divante:supplier:sync supplier2```

```php bin/divante.php divante:supplier:sync supplier3```

run commands in htdocs directory.

Suppliers data should be write to log file:

```htdocs/log/supplier.log```

Tested with PHP 5.5.9.
