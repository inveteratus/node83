<x-layout.app>
    <main class="auth">
        <div>
            <x-form>
                @if (session('status'))
                    <p class="status">{{ session('status') }}</p>
                @endif
                <x-input.email value="{{ old('email') }}" autofocus required />
                <x-input.password required />
                <footer>
                    <div>
                        <button type="submit">Login</button>
                        <a class="cancel" href="{{ route('index') }}">Cancel</a>
                    </div>
                    @if (Route::has('password.recovery'))
                        <a class="link" href="{{ route('password.recovery') }}">Forgot your password?</a>
                    @endif
                </footer>
            </x-form>
            @if (Route::has('register'))
                <p>
                    <a href="{{ route('register') }}">Don&rsquo;t have an account yet?</a>
                </p>
            @endif
        </div>
    </main>
</x-layout.app>
