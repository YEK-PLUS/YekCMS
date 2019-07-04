# YekCMS | PHP Web Application Framework 
[![Build Status](https://travis-ci.org/YEK-PLUS/YekCMS.png?branch=master)](https://travis-ci.org/YEK-PLUS/php-cms-script-template) [![LICENCE](https://img.shields.io/github/license/YEK-PLUS/YekCMS.svg)](https://github.com/YEK-PLUS/YekCMS/blob/master/LICENSE) [![Downloads](https://img.shields.io/github/downloads/YEK-PLUS/YekCMS/total.svg)](https://github.com/YEK-PLUS/YekCMS/releases)

YekCMS is an open source CMS system for your web applications and has included frontend and backed packages for convenience.
>YekCMS bir open source CMS sistemidir.Size yardımcı olmak için frontend ve backend paketleri içerir.

|Frontend|Backend|
|--------|-------|
|[Jquery]|[AltoRouter]|
|[Bootstrap]|[Medoo]|
|[Materializecss]||


## Methods
Create new method and call this method in your page file

#### Normal Method

```php
$this->addMethod("HelloWord",function(){
  echo 'Hello Word';
});
```

#### With Param

If you want the call function with params ,just type `$params = null` in function construction

```php
$this->addMethod("HelloWord",function($params = null){
    $param1 = setParams($params,0);
    echo $param1;
});
```





File Structure
```bash
.
├── LICENSE
├── README.md
├── asset
│   ├── css
│   │   └── CSS Files Here
│   ├── js
│   │   └── JS Files Here
│   └── svg
|       └── JS Files Here
├── lib
│   ├── AltoRouter
│   ├── Bootstrap
│   ├── Jquery
│   ├── Medoo
│   └─ materialize
└── src
    ├── methods
    │   └── Methods Files Here
    ├── pages
    │   └── Pages Here
    └── core files here
```



   [Jquery]: <https://github.com/jquery/jquery>
   [Bootstrap]: <https://github.com/twbs/bootstrap>
   [Materializecss]: <https://github.com/Dogfalo/materialize>
   [AltoRouter]: <https://github.com/dannyvankooten/AltoRouter>
   [Medoo]: <https://github.com/catfan/Medoo>
