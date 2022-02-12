# 😍 Laravox Documentor

## Steps to install

1. You need to install phive (https://github.com/phar-io/phive)
1. phive install --force-accept-unsigned phpDocumentor
1. install the package: `composer require laravox/documentor`
1. add the next attribute in your app/Console/Kernel.php file:

`
protected $commands = [
    \Laravox\Documentor\Console\Commands\DocumentorBuildCommand::class,
];
`

## How to use it?

`php artisan documentor:build {source?} {destiny?}`

The `{source?}` variable allows you to specify the folder which will be documented

The `{destiny?}` variable allows you to specify the folder where the documentation will be stored.

Both variables are optional.

The default value for `{source}` is the `app/` folder.

The default value for `{destiny}` is the `docs/` folder.

Any issue or suggestion is welcomedto improve this repository.