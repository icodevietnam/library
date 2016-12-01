<?php

namespace App;

use Helpers\Session;

/**
 * Configuration constants and options.
 */
class Config
{
    /**
     * Executed as soon as the framework runs.
     */
    public function __construct()
    {
        /**
         * Turn on output buffering.
         */
        ob_start();

        //name
        define('NAME', 'library');

        /**
         * Define the complete site URL.
         */
        define('SITEURL', 'http://localhost/'.NAME.'/');

        /**
         * Define relative base path.
         */
        define('DIR', '/'.NAME.'/');

        /**
         * Define Dashboard path.
         */
        define('ADMIN_DIR', '/'.NAME.'/admin/');

        /**
         * Set the Application Router.
         */
        // Default Routing
        define('APPROUTER', '\Core\Router');
        // Classic Routing
        // define('APPROUTER', '\Core\ClassicRouter');

        /**
         * Set default controller and method for legacy calls.
         */
        define('DEFAULT_CONTROLLER', 'Welcome');
        define('DEFAULT_METHOD', 'index');

        /**
         * Set the default template.
         */
        define('TEMPLATE', 'Default');

        /**
         * Set the default template.
         */
        define('LOGIN', 'Login');

        /**
         * Set the home template.
         */
        define('HOME', 'Home');

        /**
         * Set the default template.
         */
        define('SIGNUP', 'Signup');

        /**
         * Set the site title.
         */
        define('SITETITLE', 'Contribution System');


        /**
         * Set a default language.
         */
        define('LANGUAGE_CODE', 'En');

        //database details ONLY NEEDED IF USING A DATABASE

        /**
         * Database engine default is mysql.
         */
        define('DB_TYPE', 'mysql');

        /**
         * Database host default is localhost.
         */
        define('DB_HOST', '127.0.0.1');

        /**
         * Database name.
         */
        define('DB_NAME', 'librarian');

        /**
         * Database username.
         */
        define('DB_USER', 'root');

        /**
         * Database password.
         */
        define('DB_PASS', '');

        /**
         * PREFER to be used in database calls default is smvc_
         */
        define('PREFIX', '');

        /**
         * PREFER to be used in database calls default is smvc_
         */
        define('HOMENAME', 'Contributor');

        /**
         * Set prefix for sessions.
         */
        define('SESSION_PREFIX', 'ewsd_');


        /**
         * Avatar.
         */
        define('AVATAR_FOLDER', 'avatar');

        /**
         * Avatar.
         */
        define('BOOK_FOLDER', 'book');


        /**
         * Avatar.
         */
        define('IMG_FOLDER', 'imgs');

        /**
         * Optionall set a site email address.
         */
        // define('SITEEMAIL', 'email@domain.com');

        /**
         * Turn on custom error handling.
         */
        set_exception_handler('Core\Logger::ExceptionHandler');
        set_error_handler('Core\Logger::ErrorHandler');

        /**
         * Set timezone.
         */
        date_default_timezone_set('Asia/Ho_Chi_Minh');

        /**
         * Define upload image size   
         */
        define('SIZEIMAGE', 204800000);

        // Limit Roles
        define ("ROLES", serialize (array ("admin", "librarian","student")));
        //$my_fruits = unserialize (FRUITS);

        /**
         * Start sessions.
         */
        Session::init();
    }
}
