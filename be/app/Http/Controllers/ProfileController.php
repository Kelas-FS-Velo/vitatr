<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        return response()->json([
            'name' => 'Vita',
        'full_name' => 'Vita Tri Utami',
        'email' => 'vitatriutami@gmail.com',
        'job_title' => 'Fullstack Developer',
        'location' => 'Jakarta, Indonesia',
        'summary' => 'A fullstack developer committed to creating engaging digital experiences and building scalable, high-performance solutions.',
        'avatar' => 'https://drive.google.com/uc?export=view&id=1gtbz-iQ7rHp1PALNQ3zklY36tdbLW05d',
        ]);
    }
}