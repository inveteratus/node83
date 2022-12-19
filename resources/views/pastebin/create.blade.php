<x-layout.app>

    <main class="pastebin-form">
        <x-form>

            <div>
                <label for="content">Content</label>
                <textarea id="content" name="content" autofocus required>{{ old('content') }}</textarea>
            </div>

            <div>
                <div>
                    <x-submit />
                </div>
                <div x-data="{value:$persist({{ old('lifetime', 3600) }})}">
                    <span>Retain for one</span>
                    @foreach (['Hour' => 3600, 'Day' => 86400, 'Week' => 604800, 'Month' => '2629800'] as $label => $seconds)
                        <label :class="value=={{ $seconds }}?'active':''" @click.prevent.stop="value={{ $seconds }}">
                            <input type="radio" name="lifetime" value="{{ $seconds }}" :checked="value=={{ $seconds }}">
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </div>
        </x-form>
    </main>

</x-layout.app>
