<x-layout.app>
    <main class="auth">
        <div>
            <x-form>
                <x-input.text name="name" value="{{ old('name') }}" autofocus required />
                <x-input.email value="{{ old('email') }}" required />
                <x-input.password required />
                <footer>
                    <div>
                        <button type="submit">Register</button>
                        <a class="cancel" href="{{ route('index') }}">Cancel</a>
                    </div>
                </footer>
            </x-form>
            @if (Route::has('login'))
                <p>
                    <a href="{{ route('login') }}">Already have an account?</a>
                </p>
            @endif
        </div>
    </main>
</x-layout.app>
