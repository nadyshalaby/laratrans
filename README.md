# Laratrans for Laravel - Laravel >= 7.0

[![Backers on Open Collective](https://opencollective.com/laravel-scout-tntsearch-driver/backers/badge.svg)](#backers) [![Sponsors on Open Collective](https://opencollective.com/laravel-scout-tntsearch-driver/sponsors/badge.svg)](#sponsors) [![Latest Version on Packagist](https://img.shields.io/packagist/v/teamtnt/laravel-scout-tntsearch-driver.svg?style=flat-square)](https://packagist.org/packages/teamtnt/laravel-scout-tntsearch-driver)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE.md)
[![Build Status](https://img.shields.io/travis/teamtnt/laravel-scout-tntsearch-driver/master.svg?style=flat-square)](https://travis-ci.org/teamtnt/laravel-scout-tntsearch-driver)
[![Quality Score](https://img.shields.io/scrutinizer/g/teamtnt/laravel-scout-tntsearch-driver.svg?style=flat-square)](https://scrutinizer-ci.com/g/teamtnt/laravel-scout-tntsearch-driver)
[![Total Downloads](https://img.shields.io/packagist/dt/teamtnt/laravel-scout-tntsearch-driver.svg?style=flat-square)](https://packagist.org/packages/teamtnt/laravel-scout-tntsearch-driver)

Laravel translation package for building database localized mutli-lang websites..

## Contents

- [Laratrans for Laravel - Laravel >= 7.0](#laratrans-for-laravel---laravel--70)
  - [Contents](#contents)
  - [Installation](#installation)
  - [Usage](#usage)
  - [Toggle your application locale.](#toggle-your-application-locale)
  - [Consider a donation](#consider-a-donation)
  - [Credits](#credits)
  - [License](#license)

## Installation

You can install the package via composer:

```bash
composer require corecave/laratrans
```

Laravel auto-discovery with load the service provicer <br>
OR
<br>
Add the service provider manually:

```php
// config/app.php
'providers' => [
    // ...
    CoreCave\Laratrans\LaratransServiceProvider::class,
],
```

Append `CoreCave\Laratrans\Middleware\Locale` to the `$routeMiddleware` array in `app\Http\Kernel.php` file.

```php
// app\Http\Kernel.php
  protected $routeMiddleware = [
        // ...

        'laratrans' => \CoreCave\Laratrans\Middleware\Locale::class,
    ];
```

Put your database credentials to your `.env` file

Then you should migrate the database

```bash
php artisan migrate
```

## Usage

After you have installed laratrans package you need to add the
`MasterTranslatable` and `DetailsTranslatable` traits to your models that you want to make localizable. Additionaly,
define the fields required by the package for localization to work properly on your migration:

```php
//app\Person.php

<?php

namespace App;

use CoreCave\Laratrans\Translation\MasterTranslatable;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use MasterTranslatable;
}
```

```php
//app\_Person.php

<?php

namespace App;

use CoreCave\Laratrans\Translation\DetailsTranslatable;
use Illuminate\Database\Eloquent\Model;

class _Person extends Model
{
    use DetailsTranslatable;
}
```

```php
//database\migrations\2020_07_06_185838_create_people_table.php

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->float('hight');
            $table->float('weight');
            $table->timestamps();
        });

        Schema::create('__people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->mediumText('bio');
            $table->integer('person_id');
            $table->integer('locale_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
        Schema::dropIfExists('__people');
    }
}

```

Then, setup some models, migrations, factories and seeders for `locales`, `people` and `__people` tables or just you can publish them for faster development:

`php artisan vendor:publish --tage="laratrans"`

If you test localization in action, just setup a dummy route in your `routes/web.php`)file.

```php
// routes/web.php

use App\Person;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return Person::first()->trans();
});

Route::get('/ar', function () {
    return Person::first()->trans('ar');
});

Route::middleware('laratrans:web')->get('/trans', function () {
    return Person::first()->trans();
});

```

## Toggle your application locale.

To toggle your application localization.
Issue a `GET` request to `http://yourdomain.com/localize/web/en`.
<br>

This route is constructed as `http://yourdomain.com/localize/{guard}/{locale-code}`

## Consider a donation

Become a patreon and encourage us to do more. [[Become a patreon](https://www.patreon.com/nadyshalaby)]

## Credits

- [Nady Shalaby](https://github.com/corecave)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
