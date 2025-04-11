# UMD Schoolwide Header

## Introduction

Provides a simple interface for adding the [UMD Schoolwide Header](https://brand.umd.edu/website-guidelines/university-header-guidelines) to Drupal sites in the University of Maryland system.

This module was created by [idfive](http://idfive.com) for the University of Maryland.

## Version

Please use the latest release for your version of drupal from the [releases page](https://packagist.org/packages/umd_digital/umd_schoolwide_header), or simply use composer to manage.

## Installation

Install as usual, see [installing modules](https://www.drupal.org/docs/8/extending-drupal-8/installing-modules) for further
information.

This module can also be added to projects via composer, then enabled via drush, with something similar to the following:

- `composer require umd_digital/umd_schoolwide_header`
- `drush en umd_schoolwide_header` or enable via admin UI

## Configuration

- Make any desired adjustments on [the config page](/admin/config/umd_schoolwide_header/config).

### Possible Adjustments

- Hide the Events link
- Hide the News link
- Hide the Colleges & Schools link
- Hide the Admissions link
- Hide the Make a Gift link
- Override Make a gift link URL (Advanced)
- Override default wrapper width (Advanced)
- Override default padding (Advanced)

## Troubleshooting

- Legacy embed script has been kept, under "Depreciated", to assist in troubleshooting or checking previous settings.
- Check for JS errors in console, and be sure to clear site caches.
- Check for CSS conflicts with your theme.

## Development

### Update JS Header

- `nvm use`, to standardize NPM in use.
- `npm update`, to get a newer version of the UMD Header JS package.