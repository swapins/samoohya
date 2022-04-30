<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://user-images.githubusercontent.com/104678768/166114241-81952064-62a4-4539-bc10-02b01fb8a73b.png" ></a></p>

# SAMOOHYA The social media tool
<!--
[![Latest Version on Packagist](https://img.shields.io/packagist/v/venturedrake/laravel-crm.svg?style=flat-square)](https://packagist.org/packages/venturedrake/laravel-crm)
[![Build Status](https://travis-ci.com/venturedrake/laravel-crm.svg?branch=master)](https://travis-ci.com/venturedrake/laravel-crm)
[![StyleCI](https://github.styleci.io/repos/291847143/shield?branch=master)](https://github.styleci.io/repos/291847143?branch=master)
[![Codacy Badge](https://api.codacy.com/project/badge/Grade/1946e83f51de4a0eb430a8e0a1aab3cf)](https://app.codacy.com/gh/venturedrake/laravel-crm?utm_source=github.com&utm_medium=referral&utm_content=venturedrake/laravel-crm&utm_campaign=Badge_Grade_Settings)
[![Total Downloads](https://img.shields.io/packagist/dt/venturedrake/laravel-crm.svg?style=flat-square)](https://packagist.org/packages/venturedrake/laravel-crm)
-->
Manage Sechedule and Post in various social media platforms from single dashboard used Graph API of facebook(tm) Now Meta(Tm)  built with Laravel. supports facebook , Twitter, Instagram, Pinterest , LinkedIn and Many more!. 

> ⚠️ Warning: This is a pre-release version that is not recommended for production use.

## Use Cases

- Use as a complete social media dashboard
- Support post scheduling
- Run Campaign
- Analyatics
- Create trending hashtags

## Features

 - Dashboard
 - Multiple Platform support
 - Media management
 - Sheduling
 - Tracking and Anlytics
 - Cureted content
 - Throtaling to prevent blacklisting
 - Easy deployment and upgradre capabilities
 - Laravel 7

## Requirements

- **PHP**: 7.3 or higher
- **For MySQL users**: 5.7.23 or higher
- **For MariaDB users**: 10.2.7 or higher
- **Laravel** 7 or higher

## Installation (10-15mins)

#### Step 1. Clone Repo 
git clone 

#### Step 2. Make sure you have set up Laravel auth in your project

https://laravel.com/docs/6.x/authentication

#### Step 3. Require the current package using composer:

```bash
composer require venturedrake/laravel-crm:^0.10
```

#### Step 4. Publish the migrations, config & assets

```bash
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="config"
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="assets" --force
```

#### Step 5. Update the various config settings in the published config file:

After publishing the package assets a configuration file will be located at <code>config/laravel-crm.php</code>

Please read the comments in this file for each setting. Most can be left as the default, however you will need to update the "CRM Owner" setting to access the CRM initially. 
    
Please note if you set the route_prefix to blank or null you will need to update the default <code>routes/web.php</code> file. All the crm routes are managed by the package, so it should look just as per below after removing the default welcome route and redirecting the default /home route to the dashboard. 

###### Laravel 7 and below:

```php
<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/home', function (){
    return redirect('/');
});
```

###### Laravel 8+:

```php
<?php

use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
```

#### Step 6. Run migrations:

```bash
php artisan migrate
```

#### Step 7. Run database seeder:

```bash
php artisan db:seed --class="VentureDrake\LaravelCrm\Database\Seeders\LaravelCrmTablesSeeder"
```

#### Step 8. Update User Model

- Add the HasCrmAccess, HasCrmTeams, HasRoles traits.
- Add the Lab404\AuthChecker\Models\HasLoginsAndDevices trait and the Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface interface.

```php
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;
use VentureDrake\LaravelCrm\Traits\HasCrmAccess;
use VentureDrake\LaravelCrm\Traits\HasCrmTeams;
use Lab404\AuthChecker\Models\HasLoginsAndDevices;
use Lab404\AuthChecker\Interfaces\HasLoginsAndDevicesInterface;

class User extends Authenticatable implements HasLoginsAndDevicesInterface
{
    use HasRoles;
    use HasCrmAccess;
    use HasCrmTeams;
    use HasLoginsAndDevices;

    // ...
}
```
#### Step 9. Register at least one user and log in or if you already have a user login with the crm owner you set in step 5

Access the crm to register/login at http://your-project-url/crm

Note if you modified the route_prefix setting from the default the above url will change dependent on that setting.

## Upgrade

### Upgrading from >= 0.2

#### Step 1. Run the following to the update migrations and publish assets:

```bash
composer require venturedrake/laravel-crm::^0.10
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="config"
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="assets" --force
php artisan migrate
```

#### Step 2. Run the database seeder

```bash
php artisan db:seed --class="VentureDrake\LaravelCrm\Database\Seeders\LaravelCrmTablesSeeder"
```

### Upgrading from < 0.2

#### Step 1. Run the following to the update package:

```bash
composer require venturedrake/laravel-crm::^0.9
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="migrations"
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="config"
php artisan vendor:publish --provider="VentureDrake\LaravelCrm\LaravelCrmServiceProvider" --tag="assets" --force
php artisan migrate
```

#### Step 2. Delete previously published package views located in <code>resources/views/vendor/laravel-crm/*</code>

#### Step 3. Add HasCrmAccess, HasCrmTeams & HasRoles traits to App\User model, see installation Step 8.

<!--- ## Usage --->

## Testing

``` bash
composer test
```

### Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.

## Roadmap

 - Tasks
 - Files / Documents
 - Calendar (Calls, Meetings, Reminders)
 - Custom Fields
 - Activity Feed / Timelines
 - CSV Import / Export

## Feedback

Participate in the [discord community](https://discord.gg/rygVyyGSHj)

## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) for details.

### Security

If you discover any security related issues, please email andrew@venturedrake.com instead of using the issue tracker.

## Credits

- [Andrew Drake](https://github.com/venturedrake)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
