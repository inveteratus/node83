<x-html>

    <x-slot name="head">
        @livewireStyles
    </x-slot>

    <header>
        <nav>
            <section>
                <x-link href="{{ route('index') }}" icon="home" />
                <x-link href="{{ route('pastebin') }}" icon="clipboard" />
                <x-link href="{{ route('imagebin') }}" icon="photo" />
                <x-link href="{{ route('snippet.index') }}" icon="code-bracket" />

                @auth
                    <x-form action="{{ route('logout') }}">
                        <button type="submit">
                            <x-icons.power />
                        </button>
                    </x-form>
                @else
                    <x-link href="{{ route('login') }}" icon="lock-closed" />
                @endauth

            </section>
        </nav>
    </header>

    {{ $slot }}

    @livewireScripts

</x-html>
