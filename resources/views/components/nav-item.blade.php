@props(['route', 'text', 'page'])

<a href="{{ route($route) }}">
    <div class="flex gap-2">
        <div class="text-nowrap">{{ $text }}</div>
        <div class="grow border-dotted border-b-2 border-black mb-1"></div>
        <div>{{ $page }}</div>
    </div>
</a>