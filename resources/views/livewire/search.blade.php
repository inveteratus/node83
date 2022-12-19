<main class="snippets">

    <div>
        {{-- Search --}}
        <div>
            <x-input.search placeholder="Search" autofocus wire:model="term" />
        </div>

        {{-- Add Button --}}
        @auth
            <div>
                <a href="{{ route('snippet.create') }}" class="btn-primary">Add</a>
            </div>
        @endauth
    </div>

    {{-- Data table --}}
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Tags</th>
                @auth
                    <th class="visibility">Public</th>
                @endauth
                <th>Created</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($snippets as $snippet)
                <tr x-data @click.prevent.stop="document.location='{{ route('snippet.show',$snippet) }}'">
                    <td>{{ $snippet->name }}</td>
                    <td>{{ implode(', ', $snippet->tags) }}</td>
                    @auth
                        <td class="{{ $snippet->public ? 'public' : 'private' }}">
                            @if ($snippet->public)
                                <x-icons.check />
                            @else
                                <x-icons.x-mark />
                            @endif
                        </td>
                    @endauth
                    <td>{{ $snippet->created_at->diffForHumans() }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $snippets->links('pagination') }}

</main>
