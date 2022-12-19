<x-layout.app>
    <main class="auth">
        <div>
            <x-form>
                @if (session('status'))
                    <p class="status">{{ session('status') }}</p>
                @endif
                <p>Enter your email address, and we&rsquo;ll send out a password reset link.</p>
                <x-input.email value="{{ old('email') }}" autofocus required />
                <footer>
                    <div>
                        <button type="submit">Register</button>
                        <a href="{{ route('login') }}" class="cancel">Cancel</a>
                    </div>
                </footer>
            </x-form>
        </div>
    </main>
</x-layout.app>
