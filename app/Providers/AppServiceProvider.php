<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Media;
use App\Models\CourseType;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Cookie;
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

    private $courseTypes;
    private $courses;
    private $primaryMenu;
    private $cartItems = [];
    private $student = [];

    public function register(): void
    {
        
        $this->courseTypes = DB::table('course_types')->whereNull("parent_id")->where("status","1")->get();
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

        App::singleton('courseTypes', function () {
            return $this->courseTypes;
        });

        App::singleton('courses', function () {
            return $this->courses;
        });

        App::singleton('cartItems', function () {
            return $this->cartItems;
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
            $view->with('courseTypes', $this->courseTypes);
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

            $this->cartItems = (Cookie::get('cartItems'))?json_decode(Cookie::get('cartItems'),true):[];
            $view->with('cartItems', $this->cartItems);

            $this->student = (Cookie::get('student'))?json_decode(Cookie::get('student'),true):[];
            $view->with('student', $this->student);

        });
    }
}
