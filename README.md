# UMD Schoolwide Header

## Introduction

Provides a simple interface for adding the [UMD Schoolwide Header](https://github.com/UMD-Digital/elements-utility-header/tree/master) to Drupal sites
in the University of Maryland system.

This module was created by [idfive](http://idfive.com) for the University of Maryland.

## Version

Please use the latest release for your version of drupal from the [releases page](https://github.com/UMD-Digital/umd_schoolwide_header/releases).

## Installation

Install as usual, see [installing modules](https://www.drupal.org/docs/8/extending-drupal-8/installing-modules) for further
information.

This module can also be added to projects via composer, with something similar to the following (adjust release version as necessary):

- `composer require umd_digital/umd_schoolwide_header`
- `drush en umd_schoolwide_header` or enable via admin UI

## Configuration

- Make any desired adjustments on [the config page](/admin/config/umd_schoolwide_header/config).

### Possible Adjustments

- Hide Events link
- Hide News link
- Hide Colleges & Schools link
- Hide Admissions link
- Hide Make a Gift link
- Override Make a gift link URL (Advanced)
- Override default wrapper width (Advanced)
- Override default padding (Advanced)

## Troubleshooting

- Check for JS errors in console, and be sure to clear site caches.
- Check for CSS conflicts with your theme.
