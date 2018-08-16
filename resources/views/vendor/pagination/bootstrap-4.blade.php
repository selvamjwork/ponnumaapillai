@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <li class="paginate_button page-item previous disabled"><span class="page-link">&laquo;</span></li>
        @else
            <li class="paginate_button page-item previous disabled" id="example2_previous" class="page-item"><a aria-controls="example2" data-dt-idx="0" tabindex="0" class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="paginate_button page-item"><span class="page-link">{{ $element }}</span></li>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="paginate_button page-item active"><span class="page-link">{{ $page }}</span></li>
                    @else
                        <li class="paginate_button page-item active"><a aria-controls="example2" data-dt-idx="1" tabindex="0" class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <li class="paginate_button page-item next" id="example2_next"><a aria-controls="example2" data-dt-idx="7" tabindex="0" class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
        @else
            <li class="paginate_button page-item next" id="example2_next"><span class="page-link">&raquo;</span></li>
        @endif
    </ul>
@endif
