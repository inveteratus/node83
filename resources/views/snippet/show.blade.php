<x-layout.app>
    <main class="flex flex-grow px-4">
        <pre class="flex flex-grow shadow-sm border border-gray-700 text-sm rounded bg-neutral-900 text-gray-400 py-2 px-3">{{ $snippet->content }}</pre>
    </main>
    <footer class="flex flex-none p-4 justify-between">
        <div>
            <a href="{{ route('snippet.index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-gray-50 bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 focus:ring-offset-gray-800">Close</a>
        </div>
        <div>
            <button type="button" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-gray-50 bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 focus:ring-offset-gray-800" x-data @click.prevent.stop="navigator.clipboard.writeText(atob('{{ base64_encode($snippet->content) }}'))">Copy to clipboard</button>
        </div>
    </footer>
</x-layout.app>
