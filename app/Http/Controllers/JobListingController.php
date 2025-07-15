<?php

namespace App\Http\Controllers;

use App\Models\JobListing;
use Illuminate\Http\Request;

class JobListingController extends Controller
{
    public function index()
    {
        // $job = JobListing::with('employer')->paginate(3);
        $job = JobListing::with('employer')->latest()->simplePaginate(4);
        // $job = JobListing::with('employer')->cursorPaginate(3);
        return view('jobs.index', ['jobs' => $job]);
    }

    public function create()
    {
        return view('jobs.create');
    }

    public function store()
    {
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
    }

    public function show(JobListing $job)
    {
        return view('jobs.show', ['job' => $job]);
    }

    public function edit(JobListing $job)
    {
        return view('jobs.edit', ['job' => $job]);
    }

    public function update(JobListing $job)
    {
        request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);

        // authorize (on hold...)
        $job->update([
            'title' => request('title'),
            'salary' => request('salary'),
        ]);

        return redirect('/jobs/' . $job->id);
    }

    public function destroy(JobListing $job)
    {
        $job->delete();
        return redirect('/jobs');
    }
}
