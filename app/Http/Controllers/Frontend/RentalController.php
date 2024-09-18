<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RentalController extends Controller
{
    public function index($language = 'en')
    {
        return Inertia::render('Rentals',[]);
    }
}
