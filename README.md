After Install Laravel
Step 1 : php artisan migrate
Step 2 : composer require laravel/ui
        php artisan ui bootstrap --auth
        npm install
Step 3 : composer require spatie/laravel-permission
        **For Laravel 11 : 
        write this script
                bootstrap/app.php
                ->withMiddleware(function (Middleware $middleware) {
                        $middleware->alias([
                        ...
                        'role' => \Spatie\Permission\Middleware\RoleMiddleware::class,
                        'permission' => \Spatie\Permission\Middleware\PermissionMiddleware::class,
                        'role_or_permission' => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
                        ]);
                })

                bootstrap/providers.php
                return [
                        ...
                        Spatie\Permission\PermissionServiceProvider::class,
                ];

Step 4 : composer require jenssegers/agent
Step 5 : composer require intervention/image
Step 6 : "autoload": {
          "psr-4": {
            ...
           },
           "files": ["app/Helpers/Helper.php"]
        },

        Run composer dump-autoload
Step 7 : php artisan install:api

Final Step :
After Copying All Fine
    php artisan migrate:fresh --seed