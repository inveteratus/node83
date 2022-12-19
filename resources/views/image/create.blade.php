<x-layout.app>

    <main class="imagebin-form">
        <x-form enctype="multipart/form-data">

            <div class="flex flex-grow" x-data="{files:null,active:false}">
                <input type="file" name="image" class="hidden" x-ref="input" accept="image/png,image/jpeg,image/gif"
                       x-on:change="files=$event.target.files">
                <template x-if="files===null">
                    <div class="text-gray-400 bg-neutral-900 border border-gray-700 rounded text-sm flex flex-col flex-grow items-center justify-center cursor-pointer" :class="active?'border-2 border-indigo-500':''" @click.prevent.stop="$refs.input.click($event)">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-12 h-12 opacity-50">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 16.5V9.75m0 0l3 3m-3-3l-3 3M6.75 19.5a4.5 4.5 0 01-1.41-8.775 5.25 5.25 0 0110.233-2.33 3 3 0 013.758 3.848A3.752 3.752 0 0118 19.5H6.75z" />
                        </svg>
                        <span>click or drop an image</span>
                    </div>
                </template>
                <template x-if="files!==null">
                    <div class="text-gray-400 bg-neutral-900 border border-gray-700 rounded text-sm flex flex-col flex-grow items-center justify-center cursor-pointer overflow-hidden" :class="active?'border-2 border-indigo-500':''" @click.prevent.stop="$refs.input.click($event)">
                        <div class="h-0 flex flex-grow justify-center px-3 py-2">
                            <img :src="URL.createObjectURL(files[0])" class="object-scale-down" />
                        </div>
                    </div>
                </template>
            </div>

            <footer>
                <div>
                    <button type="submit">Submit</button>
                    <a href="{{ route('index') }}">Cancel</a>
                </div>
                <div x-data="{value:$persist({{ old('lifetime', 3600) }})}">
                    <span>Retain for 1</span>
                    @foreach (['Hour' => 3600, 'Day' => 86400, 'Week' => 604800, 'Month' => '2629800'] as $label => $seconds)
                        <label :class="value=={{ $seconds }}?'active':''" @click.prevent.stop="value={{ $seconds }}">
                            <input type="radio" name="lifetime" value="{{ $seconds }}" :checked="value=={{ $seconds }}">
                            <span>{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </footer>
        </x-form>
    </main>

</x-layout.app>
