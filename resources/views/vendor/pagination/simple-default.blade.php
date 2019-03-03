@if ($paginator->hasPages())

    <nav aria-label="...">
        <ul class="pager">
            @if ($paginator->onFirstPage())
                <li class=" disabled">
                    <span aria-hidden="true"> {{trans('pagination.previous')}}</span>

                </li>
            @else
                <li class="">
                    <a href="{{ $paginator->previousPageUrl() }}"><span
                                aria-hidden="true"> {{trans('pagination.previous')}}</span>
                    </a>
                </li>
            @endif


            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class=""><a href="{{ $paginator->nextPageUrl() }}" rel="next">
                        <span aria-hidden="true">{{trans('pagination.next')}} </span>
                    </a>
                </li>
            @else
                <li class=" disabled">
                    <span aria-hidden="true">{{trans('pagination.next')}} </span>
                </li>
            @endif

        </ul>
    </nav>



@endif
