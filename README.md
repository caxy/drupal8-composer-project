Drupal 8 Composer Project
=========================

To use this project, clone it and then run:

```bash
git submodule init
git submodule update
composer install
```

Drupal 8 git repository will be added as a git submodule at `/drupal`. The `drupal/core`
directory is a `path` type repository, which means Composer will read the `composer.json`
file there as a dependency. Then it will install just the core directory by copying it
into the `web` directory.

Due to a [bug in Composer](https://github.com/composer/composer/issues/4451), we
temporarily modify the install path of Composer packages with type `drupal-core` so that
the install destination is an absolute path. Otherwise, the PathDownloader will not
successfully install the `drupal/core` dependency.

Note that if you make changes to `web/core`, these are likely to be destroyed when you
run `composer update` again.
