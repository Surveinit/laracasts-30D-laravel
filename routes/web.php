<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('home');
});

Route::get('/jobs', function () {
    // $job = JobListing::with('employer')->paginate(3);
    $job = JobListing::with('employer')->simplePaginate(3);
    // $job = JobListing::with('employer')->cursorPaginate(3);
    return view('jobs', ['jobs' => $job]);
});

Route::get('/jobs/{id}', function ($id) {
    $job = JobListing::find($id);
    return view('job', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
