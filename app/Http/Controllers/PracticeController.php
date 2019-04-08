<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PracticeController extends Controller
{
    /**
     * Demo custom 404 page on Production or list out my nav config value in Development
     */
    public function practice3()
    {
        if (!config('app.debug')) {
            return abort(404);
        } else {
            return config('app.nav');
        }
    }

    /**
     * Pull configuration values
     */
    public function practice2()
    {
        return 'Config values- debug: ' . config('app.debug') . ' env: ' . config('app.env');
    }

    /**
     * Demonstrating the first practice example
     */
    public function practice1()
    {
        dump('This is the first example.');
    }

    /**
     * ANY (GET/POST/PUT/DELETE)
     * /practice/{n?}
     * This method accepts all requests to /practice/ and
     * invokes the appropriate method.
     */
    public function index($n = null)
    {
        $methods = [];
        // Load the requested `practiceN` method
        if (!is_null($n)) {
            $method = 'practice' . $n; # practice1
            // Invoke the requested method if it exists; if not, throw a 404 error
            return (method_exists($this, $method)) ? $this->$method() : abort(404);
        } // If no `n` is specified, show index of all available methods
        else {
            // Build an array of all methods in this class that start with `practice`
            foreach (get_class_methods($this) as $method) {
                if (strstr($method, 'practice')) {
                    $methods[] = $method;
                }
            }

            // Load the view and pass it the array of methods
            return view('practice')->with(['methods' => $methods]);
        }
    }
}
