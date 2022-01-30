# Technical Test

## _Question 1_

Location: question-1\laravel-test-1-ans.blade.php

line 15: @extend should be @extends
````
@extends('layouts.default')
````
line 18: missing double quote "Loading blog posts...>
````
<div id="blog-wrapper" class="blog__wrapper" data-load-msg="Loading blog posts...">
````
line 26&35: should use foreach and exclude pagination
````
@foreach($posts as $post)
    <a href="{!! route('blogs.show', $post->id) !!}" class="blogs__post">
        <div class="blogs__title">
            {{ $post->title }}
        </div>
        <div class="blogs__excerpt">
            {{ $post->excerpt }}
        </div>
    </a>
@endforeach
````
line 45: append should be appends
````
$posts->appends(request()->except('page'))->links()
````
line 50: ['type' = 'blogs'] missing >
````
['type' => 'blogs']
````
line 56: named route with prefix should use blogs.create instead of blogs/create
````
route('blogs.create')
````
line 57: translate helper function should be trans
````
trans('buttons.add_type', ['type' => 'Blog'])
````
line 60: @end should be @endsection
````
@endsection
````
---
## _Question 2_
### Project Setup
The project use laradock to setup the development enviornment.

Location: question_2

Create enviornment file 
````
cp .env.example .env
````
and fill in database information
````
DB_CONNECTION=mysql
DB_HOST=your_host
DB_PORT=3306
DB_DATABASE=your_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
````
Install modules using composer
````
composer install
````
Generate APP_KEY for security
````
php artisan key:generate
````
Recompile files for autoload
````
composer dump-autoload
````
Run migration file
````
php artisan migrate
````
Run seeder file for demo data
````
php artisan db:seed
````

Contact page URL: http://your_location/contacts

I would use React.js to create a SPA if I had enough time.
