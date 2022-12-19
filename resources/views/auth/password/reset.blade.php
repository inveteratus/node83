<x-layout.app>
    <main class="auth">
        <div>
            <x-form>
                <x-input.email value="{{ old('email', $email) }}" autofocus required />
                <x-input.password required />
                <footer>
                    <button type="submit">Reset Password</button>
                    <input type="hidden" name="token" value="{{ $token }}">
                </footer>
            </x-form>
        </div>
    </main>
</x-layout.app>
