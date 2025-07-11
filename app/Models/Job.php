<?php

namespace App\Models;

use Illuminate\Support\Arr;

class Job
{
    public static function all()
    {
        return[
            [
                'id' => 1,
                'title' => 'Software Engineer',
                'salary' => '$100,000'
            ],
            [
                'id' => 2,
                'title' => 'Data Engineer',
                'salary' => '$80,000'
            ],
            [
                'id' => 3,
                'title' => 'AI Engineer',
                'salary' => '$200,000'
            ],
        ];

    }

    public static function find(int $id): array
    {
        $job =  Arr::first(static::all(), fn ($job) => $job['id'] == $id);
        if (! $job) {
            abort(404);
        }
    }

}
