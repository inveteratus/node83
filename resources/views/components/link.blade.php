@props([
    'href' => '#',
    'icon',
])

<a href="{{ $href }}">
    <x-dynamic-component :component="'icons.' . $icon" />
</a>
