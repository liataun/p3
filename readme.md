# Project 3
+ By: Brian Twitchell
+ Production URL: <http://p3.twitchell.me>

## Outside resources
* [Responsive meta tag](https://getbootstrap.com/docs/4.3/getting-started/introduction/)
* [Bootstrap navigation](https://getbootstrap.com/docs/4.3/components/navbar/)
* [Bootstrap alerts](https://getbootstrap.com/docs/4.3/components/alerts/)

## 3 Unique inputs
1. Select input to indicate type of author entry
2. Text input to indicate author name
3. Checkbox to indicate desire for in-text style citation

## Packages
* [barryvdh/laravel-debugbar](https://github.com/barryvdh/laravel-debugbar)

## Code style divergences

## Notes for instructor
* Logo was created by me using Adobe Illustrator.
* On production the Practice3 navigation path will return a `404` error. I wanted built in testing of my custom error page. The navbar link is disabled, but the page should be available.
* I customized the `en` `validation.php` values array to match the `select` input's display text.
* Database connections and authentication have not been covered, so my user page generates a `Log::info` entry.
* I am still a little confused about how best to design my routes and method names. What I have works, but I suspect building out the site would result in finding a need to change something, I just don't know what that would be at this stage.