@if ($paginator->hasPages())
    <ul>
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>&lt;</span></li>
        @else
            <li><a wire:click.prevent="previousPage" href="#">&lt;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="disabled"><span>{{ $element }}</span></li>
            @endif

            {{-- Array of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><span>{{ $page }}</span></li>
                    @else
                        <li><a wire:click.prevent="gotoPage({{ $page }})" href="#">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li><a wire:click.prevent="nextPage" href="#">&gt;</a></li>
        @else
            <li class="disabled"><span>&gt;</span></li>
        @endif
    </ul>
@endif
