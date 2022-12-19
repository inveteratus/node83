<x-layout.app>

    <main class="pastebin-view">
        <pre>{{ $paste->content }}</pre>
    </main>

    <footer class="pastebin-footer">
        <div>
            <a href="{{ route('pastebin') }}">New Paste</a>
            <a href="{{ route('index') }}">Close</a>
        </div>

        <div x-data>
            <a href="#" @click.prevent.stop="navigator.clipboard.writeText('{{ url()->full() }}')">Copy link</a>
            <a href="#" @click.prevent.stop="navigator.clipboard.writeText(atob('{{ base64_encode($paste->content) }}'))">Copy to clipboard</a>
        </div>
    </footer>

</x-layout.app>
