# Aivo test    
    
  THIS PROJECT WAS CREATED USING LARAVEL 7.x
    
## Folter Structure:   
- `app/Repositories` (Repositories, by default for YoutubeAPI)    
- `app/Services` (VideoSearchService)
- `app/Http/Requests` (Request Validation)   
- `routes/api.php` (API's endpoints)   


## Important note about dependencies on controllers and services:    
    
The files `YoutubeController` , `VideoSearchServiceContract` and `VideoRepositoryContract` uses Laravel's Service Container to auto manage depencies, by default the repositories were created for `YoutubeApiRepository`, but it can be easily changed on the file `app/Providers/AppServiceProvider.php`    

 Example:    
  
    $this->app->bind('path/to/interface', 'path/to/concrete/class')

## Usage    

#### NOTE:
 this project uses Google Client SDK to communicate with Youtube search API, so in order to use it you'll need a valid API KEY, it can be found here: https://console.developers.google.com/apis

however, for testing purposes, a valid API KEY will be filled inside the .env.example file, more information below:
 
    
To start working on the project:    

     $ cp .env.local.dist .env.local

Inside the .env file you'll find the placeholders for Youtube API, you can change the default values it as you like:

    YOUTUBE_API_KEY="XXXXXXXXXXXXXX" (API KEY)
    YOUTUBE_API_MAX_RESULTS=10 (number of results per search)
    YOUTUBE_API_ORDER_BY=date (order results by)
    YOUTUBE_API_RESOURCE_TYPE=video (type of the resource, could be channels, playlists...)
   
install dependencies with composer:

    $ composer install

  if  the application asks for a encription key:    

     $ php artisan key:generate  

  
## Running the project with built-in PHP server
    $ php artisan serve
usually starts the project at `http://127.0.0.1:8000`

then you can use the youtube endpoint:

`http://127.0.0.1:8000/api/youtube?search=baby+shark`

## Running tests    
    
To run the project tests    
    
     $ composer test   

To run specific tests you can use `--filter` option:    
    
    $ vendor/bin/phpunit --filter=ClassName::MethodName
