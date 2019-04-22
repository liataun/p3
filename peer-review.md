## P3 Peer Review

+ Reviewer's name: Brian Twitchell
+ Reviwee's name: Gerry W.
+ URL to Reviewe's P3 Github Repo URL: *<https://github.com/bibliodrone/p3>*

## 1. Interface
+ My initial impressions are that the form and instructions are easy to understand.
+ Clean use of space.
+ No obvious problems like spelling or missing elements when first viewing the page.
+ Interface was logically arranged. I liked that the number of zeros in the provided number was preserved to the right of the decimal. Might have been interesting to see the significant digits used in the result too.
+ Looking over on another day: I notice that the Copyright line at the bottom of the page does not have any left padding like the rest of th epage does. Might have been intentional?
+ Looking over on another day: The the extra care taken is evident. Consistent use of capital letters on unites, abbreviation (or not), and the visual degree symbol gives that polish that distinguishes between a well composed project and, if lacking, would have made it seem like a project that was done in a hurry.

## 2. Functional testing
+ No data - produces expected validation errors
+ Only some data - produces expected validation errors
+ Decimal, negative sign, positive sign, and zero - all seem to work in value field.
+ Numbers with commas - get rejected. Kind of makes sense, but would be nice if they were parsed.
+ Letters and symbols  - are rejected from value field as expected.
+ Invalid page URL - gives basic 404 error.
+ If I skip the Convert and navigate directly to the `showResults` page, the site shows the blue results bar, just empty. If I then enter data, it works.
+ If I manually edit the HTML of the page and change the Conversion `select`'s value property from 'tometric' to 'slim', I get a 500 Server Error page when I click the Convert button. This could be validated in a way that recovers nicely for the user by using Laravel's ability to specify an exact set of [allowed values](https://laravel.com/docs/5.8/validation#rule-in). Similar with the Unit Type `radio` input value from 'temperature' to 'volume'.
+ Below absolute value temperatures get converted to minimum in result. Displaying based on minimum reasonable values makes sense. Could also have given a valdation error, though might need to use the [Custom Rules](https://laravel.com/docs/5.8/validation#custom-validation-rules) to do so. As a design choice either way works, though it would have been nice for the user to get a message to remind them, when they ignore the text on the page like I did.
+ Scientific notation number input appears to work, which was a nice surprise. At least for `5.5E+5`.

## 3. Code: Routes
+ `routes/web.php` looks fine, simple and makes sense for the flow of the application.

## 4. Code: Views
+ Use of template inheritance is present, but I am confused as to why the title property is set in the master layout, yet there is an `h1` tag named `title` that is not provided/used.
+ Views look like they stick to display code, use Blade, and even do some nice Includes for generated messages/errors. Got a little confused about the commented out section that used the same naming as the included blade files, but it was commented with an explanation, so figured it out quickly.

## 5. Code: General
+ Code style seems consistent and nothing that I can easily spot that breaks with the style guides.
+ There are a few places where code is commented out or old/unused files are still present. Even a method in `ConvertController.php` that doesn't appear to have a route that connects to it. Makes sense with the learning process, but made it a littler harder to quickly find the active code.
+ Use of the word "system" line 19 and 41 in `ConvertController.php` makes me wary, as it would be easy to confuse the meaning as referring to an Operating System or similar.
+ The method `convertUnits` in`ConvertController.php` took me a little while to parse. The value assignments at the top, then the use of variables unitA and unitB,... I had to sit and think for a few minutes about what I had seen on the page before I could understand how the variables were being used. I could see having three comments, one for the string variable assignments, one for the if-else logic tree, and a third for the final message concatenation. It would help highlight the logic flow in case a developer was reviewing the code without understanding what the rest of the application does.
+ Once I figured out how they were being used, I really liked the way variables were assigned and then concatenated for the final successful `returnMessage`. It was a clean way to build a standard result off of variable inputs, which I could envision expanding for more complex conversions.

## 6. Misc
+ I like the use of the border to group the form elements. It does a good job of calling out the UI elements.
+ Site has a clear purpose and executes on that smoothly. Could handle misbehaving users a bit more.