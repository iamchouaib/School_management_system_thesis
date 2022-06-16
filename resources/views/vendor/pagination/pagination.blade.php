@if ($paginator->hasPages())
    <nav class="w-full sm:w-auto sm:mr-auto">
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item">
                    <a class="page-link" href="#">
                        <i class="w-4 h-4" data-lucide="chevron-left"></i>
                    </a>
                </li>
            @else
                <li class="page-item active">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}">
                        <i class="w-4 h-4" data-lucide="chevron-left"></i>
                    </a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                                <span
                                    class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 cursor-default leading-5">{{ $element }} ele</span>
                            </span>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active">
                                <a class="page-link">{{$page}}</a>
                            </li>
                        @else
                            <li class="page-item">
                                <a class="page-link" href="{{$url}}">{{$page}}</a>
                            </li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item active">
                    <a class="page-link " href="{{ $paginator->nextPageUrl() }}">
                        <i class="w-4 h-4" data-lucide="chevron-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link ">
                        <i class="w-4 h-4" data-lucide="chevron-right"></i>
                    </a>
                </li>
            @endif

        </ul>
    </nav>
@endif
