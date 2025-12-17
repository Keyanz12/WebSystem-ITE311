<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title' => 'About LMS System'
        ];

        return view('about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact LMS System'
        ];

        return view('contact', $data);
    }
}
