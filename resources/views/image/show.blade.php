<x-layout.app>

    <main class="imagebin-view">
        <img src="/storage/{{ $image->filename }}" />
    </main>

    <footer class="imagebin-footer">
        <div>
            <a href="{{ route('imagebin') }}">New Image</a>
            <a href="{{ route('index') }}">Close</a>
        </div>
        <div>
            <a href="#" @click.prevent.stop="navigator.clipboard.writeText('{{ url()->full() }}')">Copy link</a>
            <a href="/storage/{{ $image->filename }}">View full-sized</a>
        </div>
    </footer>

</x-layout.app>
