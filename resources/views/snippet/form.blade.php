<x-layout.app>

    <main class="flex flex-grow p-4">
        <x-form class="flex flex-col flex-grow space-y-2">

            <div class="grid grid-cols-6">
                <label for="name" class="font-medium pt-1.5">Name</label>
                <div class="col-span-4">
                    <input type="text" id="name" name="name" value="{{ old('name', $snippet->name ?? '') }}" autofocus required class="w-full block shadow-sm border-gray-700 text-sm rounded bg-neutral-900 text-gray-400 focus:ring-indigo-500" />
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-6 flex flex-grow">
                <label for="content" class="font-medium pt-1.5">Content</label>
                <div class="col-span-5 flex flex-grow">
                    <textarea id="content" name="content" required class="w-full block shadow-sm border-gray-700 text-sm rounded bg-neutral-900 text-gray-400 resize-none flex flex-grow focus:ring-indigo-500 font-mono">{{ old('content', $snippet->content ?? '') }}</textarea>
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-6">
                <label for="tags" class="font-medium pt-1.5">Tags</label>
                <div class="col-span-3">
                    <div x-data="{
                        tags: [],
                        init(value) {
                            if ((value === undefined) || (value === null)) {
                                return
                            }
                            this.tags = Array.from(new Set(value.toLowerCase().split(',').filter((el) => {
                                return el !== ''
                            })))
                        },
                        add(event, value) {
                            value = value.toLowerCase().replace(/\s+/, ' ').trim()
                            if (value) {
                                if (this.tags.indexOf(value) === -1) {
                                    this.tags.push(value)
                                }
                                this.$refs.input.value = ''
                                event.preventDefault()
                            }
                        },
                        backspace(value) {
                            value = value.replace(/\s+/, ' ').trim()
                            if (!value && this.tags.length) {
                                this.tags.pop()
                            }
                        },
                        remove(index) {
                            this.tags.splice(index, 1)
                            this.$refs.input.focus()
                        }
                    }" x-init="init('{{ old('tags', $snippet->tags ?? '') }}')" class="w-full block shadow-sm border border-gray-700 text-sm rounded bg-neutral-900 text-gray-400 focus-within:ring-2 focus-within:ring-indigo-500">
                        <template x-for="(tag,index) in tags" :key="index">
                            <span class="bg-indigo-600 rounded ml-2 hover:bg-indigo-700 hover:text-gray-300 pl-1">
                                <span x-text="tag"></span>
                                <button type="button" tabindex="-1" @click.prevent.stop="remove(index)">&times;</button>
                            </span>
                        </template>
                        <input type="text" x-ref="input" id="tags" @keydown.backspace="backspace($el.value)" @keydown.enter="add($event, $el.value)" @keydown.tab="add($event, $el.value)" class="bg-transparent border-0 focus:outline-none focus:ring-0">
                        <input type="hidden" name="tags" x-model="tags.join(',')">
                    </div>
                    @error('tags')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-6">
                <label for="public" class="font-medium pt-1.5">Public</label>
                <div  class="col-span-3">
                    <div class="toggle" x-data="{state:{{ old('public', $snippet->public ?? 0) ? '1' : '0' }}}">
                        <button id="public" type="button" :class="state?'checked':'unchecked'" @click.prevent="state=1-state">
                            <span aria-hidden="true"></span>
                        </button>
                        <input name="public" type="hidden" x-model="state" />
                    </div>
                    @error('public')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <div class="grid grid-cols-6">
                <div class="col-span-5 col-start-2 flex space-x-2">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-gray-50 bg-indigo-500 hover:bg-indigo-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 focus:ring-offset-gray-800">Submit</button>
                    <a href="{{ route('index') }}" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded text-gray-50 bg-gray-600 hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 focus:ring-offset-gray-800">Cancel</a>
                </div>
            </div>

        </x-form>
    </main>

</x-layout.app>
