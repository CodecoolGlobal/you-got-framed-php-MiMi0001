# You got framed

## Story

You and your teammates got framed with crimes you didn't commit. It was a lot of work but you finally found out who was responsible.
Everyone of you agreed that the best revenge would be to create your own framework...

Your task is to create an MVC (Model-View-Controller) micro-framework with PHP.

## What are you going to learn?

- `PSRs` and `Autoloading`
- handle packages and dependencies
- structure the code better
- protect sensitive data with Apache’s `.htaccess`
- use PHP’s `“dollar-dollar”` to be a magician among developers

## Tasks

1. Prepare the `composer.json` file to be ready for action.
    - The `composer.json` file contains at least a `name` and a `type` key for the name and type information of the project

2. Prepare `PSR-4` Autoloading using `Composer`.
    - The `composer.json` file contains an `autoload` key, and under that a `psr-4` one for the folder(s) and namespace(s)
    - The `vendor` folder exists and contains at least an `autoload.php` file

3. Create a configuration file using `JSON` format that can store the different kinds of parameters (e.g. for a database connection).
    - The configuration file exists
    - The file uses `JSON` format
    - The structure of the file can be carried via version control
    - The local settings don't cause any conflicts with others' settings

4. Make sure that the configuration file cannot be read from a web browser.
    - The configuration file cannot be accessed from the client (e.g. a web browser)

5. Create a centralized database connection.
    - Centralized database connection is created
    - The database connection can be accessed throughout the framework
    - The connection uses `PDO`
    - The connection uses the previously created configuration file

6. Create a class for every query result.
    - Class for query results exists
    - Every selection uses the class for fetching data

7. The class for query results must contain at least three methods for setting, getting, or checking data.
    - The class has a `set(string property, mixed value)` method for setting the value of a property
    - The class has a `get(string property)` method for getting the value of a property
    - The class has a `has(string property)` method for checking if the given property exists or not

8. Create a centralized query repository for the `SQL statements`.
    - Centralized query repository exists
    - The query repository can be accessed throughout the framework
    - The query repository uses the previously created database connection

9. Create a generic logger that logs the main events of the application that uses your framework.
    - Generic logger is created
    - The logger allows the developers to use it for creating custom log messages

10. Pre-configure `BladeOne` as the primary template engine of your framework to be `plug 'n' play`.
    - `BladeOne` is required using `Composer`
    - The template engine is available for every controller
    - The paths of `BladeOne` templates and caches are pre-configured

11. Create a class that helps you manage the different kinds of super globals you need (e.g. `$_REQUEST`, `$_SESSION`, etc).
    - Super global manager class exists
    - The class has accessors to get data from at least `$_REQUEST` and `$_SESSION` super globals

12. [OPTIONAL] Armor your framework against other kinds of attacks and specify the accepted `HTTP request methods`.
    - A route/method can be specified to be used only with the given `HTTP request methods` (e.g. a request is only accepted if it uses `POST` method)
    - A filter for `IP addresses` can be used to grant access only for some clients (e.g. a request from `135.58.24.17` is denied)
    - A filter can be set up for the allowed `web browsers` (e.g. only accessible from `Chrome` and `Firefox`)
    - All filters are easily configurable

13. [OPTIONAL] Implement a `routing system` so that you won't have to worry about the different PHP files you have.
    - A `routing system` is implemented (a page is available under `route/to/page` instead of `path/to/page.php`)

## General requirements

- The framework must use `MVC` architecture.
- Every class has a `namespace`.

## Hints

- With `Design Patterns`, try to focus on `Factory` and `Singleton` first
- You can centralize modules with `abstract classes` for the main elements of the framework's structure
- Think of the `queries.py` file from the Web module as one type of query repository
- You can add some example pages (e.g. a default landing page) to test your framework

## Background materials

- <i class="far fa-book-open"></i> [PHP Standard Recommendations (PSRs)](https://www.php-fig.org/psr/)
- <i class="far fa-exclamation"></i> [PHP namespaces](https://www.w3schools.com/php/php_namespaces.asp)
- <i class="far fa-exclamation"></i> [Basic usage of Composer](https://getcomposer.org/doc/01-basic-usage.md)
- <i class="far fa-book-open"></i> [Design Patterns in PHP](https://refactoring.guru/design-patterns/php)
- <i class="far fa-video"></i> [MVC](https://youtu.be/Fr4P6FkZUTE)
- <i class="far fa-video"></i> [Frameworks and Libraries](https://youtu.be/D_MO9vIRBcA)
- <i class="far fa-book-open"></i> [Apache's .htaccess files](https://httpd.apache.org/docs/current/howto/htaccess.html)
- <i class="far fa-book-open"></i> [Deny access with .htaccess files](https://help.dreamhost.com/hc/en-us/articles/216363167-How-do-I-deny-access-to-my-site-with-an-htaccess-file-)
- <i class="far fa-exclamation"></i> [BladeOne Template Engine](https://www.larablocks.com/package/eftec/bladeone)
- <i class="far fa-video"></i> [Hide your PHP file extension](https://youtu.be/MbqHayiZa0I)
- <i class="far fa-candy-cane"></i> [Simple and elegant URL routing with PHP](https://steampixel.de/en/simple-and-elegant-url-routing-with-php/)
- <i class="far fa-candy-cane"></i> [User-Agent](project/curriculum/materials/pages/general/user-agent.md)
