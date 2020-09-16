# WP Password Argon Two Env

[![Latest Stable Version](https://poser.pugx.org/typisttech/wp-password-argon-two-env/v/stable)](https://packagist.org/packages/typisttech/wp-password-argon-two-env)
[![Total Downloads](https://poser.pugx.org/typisttech/wp-password-argon-two-env/downloads)](https://packagist.org/packages/typisttech/wp-password-argon-two-env)
[![StyleCI](https://styleci.io/repos/123721315/shield?branch=master)](https://styleci.io/repos/123721315)
[![License](https://poser.pugx.org/typisttech/wp-password-argon-two-env/license)](https://packagist.org/packages/typisttech/wp-password-argon-two-env)
[![Donate via PayPal](https://img.shields.io/badge/Donate-PayPal-blue.svg)](https://typist.tech/donate/wp-password-argon-two-env/)
[![Hire Typist Tech](https://img.shields.io/badge/Hire-Typist%20Tech-ff69b4.svg)](https://typist.tech/contact/)

Convert environment variables to [WP Password Argon Two](https://github.com/TypistTech/wp-password-argon-two) required constants.

<!-- START doctoc generated TOC please keep comment here to allow auto update -->
<!-- DON'T EDIT THIS SECTION, INSTEAD RE-RUN doctoc TO UPDATE -->


- [Goal](#goal)
- [Installation](#installation)
- [Usage](#usage)
  - [Trellis](#trellis)
- [Frequently Asked Questions](#frequently-asked-questions)
  - [Why I got `InsecureConfigException` (Pepper should not be empty)?](#why-i-got-insecureconfigexception-pepper-should-not-be-empty)
  - [Does it work when WP Password Argon Two installed as a must-use plugin?](#does-it-work-when-wp-password-argon-two-installed-as-a-must-use-plugin)
  - [It looks awesome. Where can I find some more goodies like this?](#it-looks-awesome-where-can-i-find-some-more-goodies-like-this)
- [Support!](#support)
  - [Donate](#donate)
  - [Why don't you hire me?](#why-dont-you-hire-me)
  - [Want to help in other way? Want to be a sponsor?](#want-to-help-in-other-way-want-to-be-a-sponsor)
- [Developing](#developing)
- [Feedback](#feedback)
- [Change Log](#change-log)
- [Security](#security)
- [Credits](#credits)
- [License](#license)

<!-- END doctoc generated TOC please keep comment here to allow auto update -->

## Goal

Defining [WP Password Argon Two](https://github.com/TypistTech/wp-password-argon-two) required constants in application code violates [12-factor principle](https://12factor.net/).

This package allows you configure [WP Password Argon Two](https://github.com/TypistTech/wp-password-argon-two) with environment variables.

## Installation

```bash
➜ composer require typisttech/wp-password-argon-two-env
```

In `wp-config.php` or [Bedrock](https://github.com/roots/bedrock)'s `config/application.php`:
```php
TypistTech\WPPasswordArgonTwo\Env\Converter::run();
```

## Usage

On your server, define these environment variables:

* `WP_PASSWORD_ARGON_TWO_PEPPER`
* `WP_PASSWORD_ARGON_TWO_OPTION_MEMORY_COST`
* `WP_PASSWORD_ARGON_TWO_OPTION_TIME_COST`
* `WP_PASSWORD_ARGON_TWO_OPTION_THREADS`
* `WP_PASSWORD_ARGON_TWO_FALLBACK_PEPPER_<integer>`

Only `WP_PASSWORD_ARGON_TWO_PEPPER` is required. Others are optional.

Fallback peppers must start with `1` and consecutive. For example:

* `WP_PASSWORD_ARGON_TWO_FALLBACK_PEPPER_1`
* `WP_PASSWORD_ARGON_TWO_FALLBACK_PEPPER_2`
* `WP_PASSWORD_ARGON_TWO_FALLBACK_PEPPER_3`

### Trellis

[Trellis](https://github.com/roots/trellis) users could add environment variables under [`wordpress_sites`](https://roots.io/trellis/docs/wordpress-sites/#options):
```yml
# group_vars/<env>/vault.yml
vault_wordpress_sites:
  example.com:
    env:
      wp_password_argon_two_pepper: 'your_long_and_random_pepper'
      wp_password_argon_two_fallback_pepper_1: 'your_second_oldest_pepper'
      wp_password_argon_two_fallback_pepper_2: 'your_oldest_pepper'

# group_vars/<env>/wordpress_sites.yml
wordpress_sites:
  example.com:
    env:
      wp_password_argon_two_option_memory_cost: 131072 # 128 Mb
      wp_password_argon_two_option_time_cost: 4
      wp_password_argon_two_option_threads: 3
```

Encrypting `vault.yml` files is important! Learn more on [Trellis docs](https://roots.io/trellis/docs/vault/).

## Frequently Asked Questions

### Why I got `InsecureConfigException` (Pepper should not be empty)?

Because... pepper should not be empty.

`WP_PASSWORD_ARGON_TWO_PEPPER` environment variable isn't defined properly.

### Does it work when WP Password Argon Two installed as a must-use plugin?

No.

### It looks awesome. Where can I find some more goodies like this?

* Articles on Typist Tech's [blog](https://typist.tech)
* [Tang Rufus' WordPress plugins](https://profiles.wordpress.org/tangrufus#content-plugins) on wp.org
* More projects on [Typist Tech's GitHub profile](https://github.com/TypistTech)
* Stay tuned on [Typist Tech's newsletter](https://typist.tech/go/newsletter)
* Follow [Tang Rufus' Twitter account](https://twitter.com/TangRufus)

## Support!

### Donate

Love WP Password Argon Two Env? Help me maintain it, a [donation here](https://typist.tech/donation/) can help with it.

### Why don't you hire me?

Ready to take freelance WordPress jobs. Contact me via the contact form [here](https://typist.tech/contact/) or, via email [info@typist.tech](mailto:info@typist.tech)

### Want to help in other way? Want to be a sponsor?

Contact: [Tang Rufus](mailto:tangrufus@gmail.com)

## Developing

To set up a developer workable version you should run these commands:

```bash
$ composer create-project --keep-vcs --no-install typisttech/wp-password-argon-two-env:dev-master
$ cd wp-password-argon-two-env
$ composer install
```

## Feedback

**Please provide feedback!** We want to make this library useful in as many projects as possible.
Please submit an [issue](https://github.com/TypistTech/wp-password-argon-two-env/issues/new) and point out what you do and don't like, or fork the project and make suggestions.
**No issue is too small.**

## Security

If you discover any security related issues, please email [wp-password-argon-two-env@typist.tech](mailto:wp-password-argon-two-env@typist.tech) instead of using the issue tracker.

## Credits

[WP Password Argon Two Env](https://github.com/TypistTech/wp-password-argon-two-env) is a [Typist Tech](https://typist.tech) project and maintained by [Tang Rufus](https://twitter.com/TangRufus), freelance developer for [hire](https://typist.tech/contact/).

Full list of contributors can be found [here](https://github.com/TypistTech/wp-password-argon-two-env/graphs/contributors).

## License

The MIT License (MIT). Please see [License File](./LICENSE) for more information.
