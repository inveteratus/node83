<nav>
    <div>
        Showing
        @if ($paginator->firstItem())
            {{ $paginator->firstItem() }} to {{ $paginator->lastItem() }}
        @else
            {{ $paginator->count() }}
        @endif
        of {{ $paginator->total() }} results
    </div>

    @if ($paginator->hasPages())
        <div>
            @if ($paginator->onFirstPage())
                <span><x-icons.chevron-left /></span>
            @else
                <a href="{{ $paginator->previousPageUrl() }}"><x-icons.chevron-left /></a>
            @endif

            @foreach ($elements as $element)
                @if (is_string($element))
                    <span>{{ $element }}</span>
                @endif
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <span>{{ $page }}</span>
                        @else
                            <a href="{{ $url }}">{{ $page }}</a>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <a href="{{ $paginator->nextPageUrl() }}"><x-icons.chevron-right /></a>
            @else
                <span><x-icons.chevron-right /></span>
            @endif
        </div>
    @endif
</nav>
