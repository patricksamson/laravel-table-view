# Laravel Table View

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Code Coverage][ico-coveralls]][link-coveralls]
[![Total Downloads][ico-downloads]][link-downloads]

## Installation

### Composer

Execute the following command to get the latest version of the package:

```terminal
composer require prettus/l5-repository
```

### Laravel

In your `config/app.php` add `Lykegenes\TableView\Providers\TableViewServiceProvider::class,` to the end of the `providers` array:

```php
'providers' => [
    ...
    Lykegenes\TableView\Providers\TableViewServiceProvider::class,
],
```

## Usage

### Create a Table View

Create a Table View class; it will allow you to configure your table.

```php
<?php

namespace App\TableViews;

use Lykegenes\TableView\AbstractTableView;

class DemoTableView extends AbstractTableView
{
    public function getApiUrl()
    {
        return '/demo-api';
    }

    public function build()
    {
        $this->addColumn('Nom', 'name', [
                'sortable',
            ])
            ->addColumn('Adresse', 'address', [
                'sortable',
            ])
            ->addColumn('Date', 'date', [
                'sortable',
            ])
            ->addTemplateColumn('Tag', 'columns.locationTags')
            ->addTemplateColumn('Operation', 'columns.operations');

        $this->setDefaultSort('date');
    }
}

```

### Displaying the table in a view

Calling the `render()` method on a TableView instance will compile it and render it.
You should call this method inside one of your app's Blade views with the `{!!  !!}`
blade statement, in order not to escape the Html.

```blade
{!! $myTableView->render() !!}
```

### Setting-up the API endpoint

A few steps are required to support the searching and sorting features.
To achieve this, we use the ["Laravel 5 Repositories" by Andersao](https://github.com/andersao/l5-repository).

```php
class ApiDemoController extends Controller
{
    protected $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
        $this->users->setPresenter(UserPresenter::class);
    }

    public function demoApi(Request $request)
    {
        $sort = $request->input('sort', 'name');
        $order = $request->input('order', 'asc');

        $this->users->orderBy($sort, $order);

        if ($request->has('search')) {
            $this->users->pushCriteria(new \Lykegenes\TableView\Criteria\SearchCriteria(['name', 'address'], $request->input('search')));
        }

        return $this->users->paginate($request->input('limit', 15));
    }
}
```

## Credits

- [Patrick Samson][link-author]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/lykegenes/laravel-table-view.svg
[ico-license]: https://img.shields.io/packagist/l/lykegenes/laravel-table-view.svg
[ico-travis]: https://img.shields.io/travis/Lykegenes/laravel-table-view/master.svg
[ico-coveralls]: https://img.shields.io/coveralls/Lykegenes/laravel-table-view.svg
[ico-downloads]: https://img.shields.io/packagist/dt/lykegenes/laravel-table-view.svg

[link-packagist]: https://packagist.org/packages/lykegenes/laravel-table-view
[link-travis]: https://travis-ci.org/Lykegenes/laravel-table-view
[link-coveralls]: https://coveralls.io/github/Lykegenes/laravel-table-view
[link-downloads]: https://packagist.org/packages/lykegenes/laravel-table-view
[link-author]: https://github.com/lykegenes
[link-contributors]: ../../contributors
