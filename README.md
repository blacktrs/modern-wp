# Overview
ModernWP is an enhanced WordPress boilerplate based on the pure [Symfony Framework](https://github.com/symfony) and [Roots Bedrock](https://github.com/roots/bedrock).

ModernWP is created for WordPress-based projects that need better structure and tooling. You can use almost everything from Symfony and WordPress at the same time.

This boilerplate could be used for migrating big codebase from classic heavy WordPress-style projects to modern approaches without significant breaking loss of backward compatibility.

## Features
* Symfony-driven structure project
* Easier configuration
* All benefits from the modern framework-based solution
* Roots Bedrock inside

## Requirements
 * PHP >= 8.1
 * MySQL/MariaDB (due WordPress dependency)

## Installation
* `composer create-project blacktrs/modern-wp ./project`
* `cd ./project`
* `composer install`
* `yarn install`
* Configure `DATABASE_URL` in `.env`
* Configure other needed env variables or yaml configs 

### Docker

* Copy `docker-compose.dist.yml` to `docker-compose.yml`
* Edit `docker-compose.yml` if needed
* Run `docker-compose up -d --build`


### Potential docker issues

* If causes HTTP Error `500` after `bin/console cache:clear` remove `var` directory and recreate it with `chmod 0777`

## Local environment

* Open `https://localhost`

### Custom hostname

* Change `NGINX_HOST` with yours in `docker-compose.yml`
* Add entry `127.0.0.1 your_host.local` to `/etc/hosts`

### Local HTTPS

* Install [mkcert](https://github.com/FiloSottile/mkcert)
* Run `mkcert -install`

By default, https works for `localhost`

If needed to generate specific SSL certificate for your custom hostname run following command
```
mkcert \
  -cert-file docker/cert/main.crt \
  -key-file docker/cert/main.key \
  your-host.local
```
* Change `your_host.local` with desired hostname
* Update `docker-compose.yml`

# Documentation

## Configuration

By default, configuration should be considered in `confing/**.yaml` files.

The all configuration parameters in `SCREAMING_SNAKE_CASE` will be converted to php const, so WordPress can read it as configuration constant. 

For example, following parameters will be converted to PHP constant `WP_DEBUG` with `true` value. 
More examples could be found in `config/packages/app.yaml` 

```yaml
parameters:
  WP_DEBUG: true
```

## Controller types
You can use 2 types of controllers:
* Rest API
* Template pages

## Rest API Controllers
* Every Rest API Controller will be available by the address `https://your-site.com/api/controller/path`
* `api` prefix can be changed in `/config/packages/app.yml` in parameter `app.apiPrefix`

Basically any non-template controller will be interpreted as Rest API controller. Examples could be found in `src/Controller/Rest` directory

## Template Controllers

* Every template controller will refer to the WordPress page address. 
* To declare template controller, the `path` parameter of `Route()` attribute should contain specific template name

For example, if needed controller for any page with a post-type page then declaring the route will look:

```php 
#[Route(path: 'page.php', name: 'some_page')]
public function page(): Response
{
    return new Response('my page');
}
```

It is possible to declare a route for any WordPress template

More examples could be found in `src/Controller/Frontent` directory

More documentation about controllers in [symfony documentation](https://symfony.com/doc/current/routing.html)

## Templating 

By default, templates should be in `twig` format and stored int `templates` directory. More details in [symfony documentation](https://symfony.com/doc/current/templates.html)

## Hooks

Declarations of the new handlers for WordPress actions and filters are recommended to add in `Kernel::registerHooks()` method

It is also recommended to use as a handler for every hook separate invokable service classes. 
To prevent Kernel class bloating it is better to store hook declarations as groups in the different classes.

## Plugins

Plugins can be added from the WordPress admin dashboard or as [Composer packages](https://wpackagist.org)

## Working with database

For convenient work with the database it is better to use [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html)

Out-of-the-box in `src/Entity` are generated set of entities for default WP tables.

## Boilerplate extending

To achieve deeper configuration please edit following files:
* `config/bootstrap.php` - bootstrap configuration
* `public/app/mu-plugins/register-application-config.php` - boilerplate WordPress loader
* `public/app/themes/site-default/*`- default WP theme

## Frontend assets

It is recommended to use `Symfony Encore` and `Symfony Asset` bundles to build and use frontend assets. 

Compiled assets better to store in `public` directory (e.g. `public/build`)

# Links
* [Symfony Framework](https://symfony.com/doc/current/index.html)
* [Doctrine ORM](https://www.doctrine-project.org/projects/orm.html)
* [Roots Bedrock](https://roots.io/bedrock)