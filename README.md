# Technical Test

## _Question 1_

location: question-1\laravel-test-1-ans.blade.php

line 15: @extend should be extends
````
@extends('layouts.default')
````
line 18: missing double quote "Loading blog posts...>
````
<div id="blog-wrapper" class="blog__wrapper" data-load-msg="Loading blog posts...">
````
line 26&35: should be foreach and exclude paginate
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
line 45: $posts->append(request()->except('page'))->links() should be appends
````
$posts->appends(request()->except('page'))->links()
````
line 50: ['type' = 'blogs'] should be =>
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
line 60: @end should be endsection
````
@endsection
````

