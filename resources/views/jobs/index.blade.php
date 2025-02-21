<x-layout>
    <x-slot:heading>
        Jobs Listings
    </x-slot:heading>

    <div class="space-y-4">
        @foreach ($jobs as $job)
            <a href="/jobs/{{ $job['id'] }}" class="block px-4 py-6 border border-gray-200 rounded-lg">
                <div class="font-bold text-blue-500 text-sm">{{ $job->employer->name }}</div>
                <div>
                    <strong>{{ $job['title'] }}: </strong> Pays {{ $job['salary'] }} per year.
                </div>
            </a>
        @endforeach

        <div>
            {{ $jobs->links() }}
            {{-- O código {{ $jobs->links() }} é usado no Laravel para gerar a paginação de uma coleção de resultados, como uma lista de itens em uma página. --}}
        </div>

    </div>

</x-layout>
