<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Media;
use App\Models\Institute;
use Illuminate\Support\Facades\App;
use View;

class AppServiceProvider extends ServiceProvider
{

    private $footerMenu = array(
        'javascript:void(0)' => 'Events',
        '/blog/' => 'Blogs',
        'javascript:void(0)' => "Awards & Recognitions",
        '/about-us' => 'About Us',
        '/contact-us' => "Contact Us",
    );

    private $courses;
    private $primaryMenu;

    public function register(): void
    {
        $this->courses = DB::table('courses')->where("status","1")->get();
        
        $this->primaryMenu = array(
            array(
                'url'=>'/about-us',
                'name' => "About Us",
            ),
            array(
                'url'=>'/blog',
                'name' => "Read & Learn",
            ),
            array(
                'url'=>'/contact-us',
                'name' => "Contact Us",
            ),
        );

        App::singleton('primaryMenu', function () {
            return $this->primaryMenu;
        });

        App::singleton('footerMenu', function () {
            return $this->footerMenu;
        });

        App::singleton('courses', function () {
            return $this->courses;
        });

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
        View::composer('*', function($view)
        {
            // Header Menu
            
            $view->with('primaryMenu', $this->primaryMenu);
            $view->with('footerMenu', $this->footerMenu);
            $view->with('courses', $this->courses);
            $media = Media::orderBy('created_at', 'desc')->get();
            $view->with('media', $media);

            $loggedInUser = Auth::user();
            $view->with('loggedInUser', $loggedInUser);

            if($loggedInUser){
                $roles = $loggedInUser
                ->roles
                ->pluck('name');
                $roles = implode(",",json_decode($roles));
                $view->with('roles', ucfirst($roles));
            }
        });
    }
}
