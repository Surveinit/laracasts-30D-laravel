<x-layout>
    <x-slot:heading>
        {{$job->title}}
    </x-slot:heading>
    <h3>This job will pay you {{$job->salary}} per year.</h3>

    <p class="mt-3">
        <x-button href="/jobs/{{ $job->id }}/edit">Edit Job</x-button>
    </p>
</x-layout>