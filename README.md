# sylius-manufacturer-plugin
Manage and display your products manufacturers in Sylius. 

# Installation-procedure
```bash
$ composer require behappy/manufacturer-plugin
```

## Enable the plugin

```php
// in app/AppKernel.php
public function registerBundles() {
	$bundles = array(
		// ...
		new BeHappy\SyliusManufacturerPlugin\BeHappySyliusManufacturerPlugin(),
		...
	);
	// ...
}
```

```yml
#in app/config/config.yml
imports:
    ...
    - { resource: "@BeHappySyliusManufacturerPlugin/Resources/config/config.yml" }
    ...
```

```yml
# in routing.yml
...

behappy_manufacturer_admin:
    resource: '@BeHappySyliusManufacturerPlugin/Resources/config/routing/admin.yml'
    prefix: /admin
...
```

## Generate database

Simply launch

```bash
php bin/console doctrine:schema:update --dump-sql --force
``` 


# That's it !
You now have a new entry in Admin under configuration tab : Manufacturer

There you can configure your manufacturers, add a logo and description

In the product form, under 'association' tab, you can now link the product to your manufacturer.

# Feel free to contribute
You can also ask your questions at the mail address in the composer.json mentioning this package.

# Other
You can also check our other packages (including Sylius plugins) at https://github.com/BeHappyCommunication