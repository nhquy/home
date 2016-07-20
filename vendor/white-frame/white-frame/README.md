# WhiteFrame

**White Frame is a work in progress and does have not versionning for the moment**

Complete package containing several components for developing resource based applications (like admin theme, dashboards based on datas ...).

WhiteFrame allows you to upgrade your application classes like `Controllers`, `Models` and add components like `Presenters` and `Repositories`. It bring to your application powerfull functions based the `Models` configuration such as widgets for generating _ajax table_ with show/edit/delete buttons, classes for extracting statistics for a _dynamic chart_, etc ...

With the highly configurable `Model`, you can specify the `Presenter`, the `Repository`, the url endpoint and the view folder. This allow you to build automatic `Controller`, serving correct views on the correct url for the object.

# Installation

As it brings some front end logic, WhiteFrame require some bower packages in addition to the basic composer requirement.

## Laravel 5.x

### Installing laravel package

First, require the main project package for installing dependancies.

    composer require white-frame/white-frame:0.*

When installed you can add the White Frame service provider to your `config/app.php` :

    \WhiteFrame\WhiteFrame\WhiteFrameServiceProvider::class,

Publish vendor using the artisan `vendor:publish` command :

    php artisan vendor:publish --provider="WhiteFrame\WhiteFrame\WhiteFrameServiceProvider"

### Requiring bower requirements

If you are familiar with installing and including bower packages, white frame require following packages : `bootstrap components-font-awesome jquery jquery-ui dynatable restfulizer popconfirm`. If not, take a look at the Step by step below.

#### Steps by step installation (from the beginning)

First of all you should (install bower)[http://bower.io/#install-bower]

Next, create a bower configuration file `.bowerrc` with the content :

```json
{
	"directory": "public/bower_components"
}
```

Install required packages :

    bower install bootstrap components-font-awesome jquery jquery-ui dynatable restfulizer popconfirm --save

Add packages to your template using your prefered method, you can use following predefined views :

Styles :
```blade
@include("white-frame::assets.css")
```

Scripts :
```blade
@include("white-frame::assets.js")
```

**Tip** : You can remove some assets on theses views if published (with `vendor:publish`), just check the folder `resources/views/vendor/white-frame/assets`

## Boilerplate

We built a simple boilerplate with bootstrap and the opensource AdminLTE template. Take a look at : https://github.com/white-frame/white-frame-boilerplate 
