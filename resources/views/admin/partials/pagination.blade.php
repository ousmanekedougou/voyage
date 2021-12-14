<!-- <ul class="pagination pagination-rounded justify-content-end mb-2">
    <li class="page-item disabled">
        <a class="page-link" href="javascript: void(0);" aria-label="Previous">
            <i class="mdi mdi-chevron-left"></i>
        </a>
    </li>
    <li class="page-item active"><a class="page-link"
            href="javascript: void(0);">1</a></li>
    <li class="page-item"><a class="page-link" href="javascript: void(0);">2</a>
    </li>
    <li class="page-item"><a class="page-link" href="javascript: void(0);">3</a>
    </li>
    <li class="page-item"><a class="page-link" href="javascript: void(0);">4</a>
    </li>
    <li class="page-item"><a class="page-link" href="javascript: void(0);">5</a>
    </li>
    <li class="page-item">
        <a class="page-link" href="javascript: void(0);" aria-label="Next">
            <i class="mdi mdi-chevron-right"></i>
        </a>
    </li>
</ul> -->
@if ($paginator->hasPages())


    <ul class="pagination pagination-rounded justify-content-end mb-2">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="javascript: void(0);" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <i aria-hidden="true" class="mdi mdi-chevron-left"></i>
                </a>
            </li>
        @else
            <li class="page-item">
                <a href="{{ $paginator->previousPageUrl() }}" class="page-link" rel="prev" aria-label="@lang('pagination.previous')"><i class="mdi mdi-chevron-left"></i></a>
            </li>
        @endif
        
         {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="disabled page-item" aria-disabled="true"><a class="page-link" href="javascript: void(0);" >{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><a class="page-link" href="javascript: void(0);" >{{ $page }}</a></li>
                        @else
                            <li class="page-item"><a class="page-link"  href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

          {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a href="{{ $paginator->nextPageUrl() }}" class="page-link" rel="next" aria-label="@lang('pagination.next')"><i class="mdi mdi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item disabled">
                    <a class="page-link" aria-disabled="true" aria-label="@lang('pagination.next')">
                        <i aria-hidden="true" class="mdi mdi-chevron-right"></i>
                    </a>
                </li>
            @endif
        
    </ul>
@endif
