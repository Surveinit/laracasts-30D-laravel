<?php

use Illuminate\Support\Facades\Route;
use App\Models\JobListing;

Route::get('/', function () {
    return view('home');
});

// Index
Route::get('/jobs', function () {
    // $job = JobListing::with('employer')->paginate(3);
    $job = JobListing::with('employer')->latest()->simplePaginate(4);
    // $job = JobListing::with('employer')->cursorPaginate(3);
    return view('jobs.index', ['jobs' => $job]);
});

// Create
Route::get('/jobs/create', function () {
    return view('jobs.create');
});

// Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    JobListing::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1,
    ]);

    return redirect('/jobs');
});

// Edit
Route::get('/jobs/{id}/edit', function ($id) {
    $job = JobListing::find($id);
    return view('jobs.edit', ['job' => $job]);
});

// Update
Route::patch('/jobs/{id}', function ($id) {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

    // authorize (on hold...)
    $job = JobListing::findOrFail($id);
    $job->update([
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/' . $job->id);
});

// Destroy
Route::delete('/jobs/{id}', function ($id) {
    $job = JobListing::findOrFail($id);
    $job->delete();
    return redirect('/jobs');
});

// Show
Route::get('/jobs/{id}', function ($id) {
    $job = JobListing::find($id);
    return view('jobs.show', ['job' => $job]);
});

Route::get('/contact', function () {
    return view('contact');
});
