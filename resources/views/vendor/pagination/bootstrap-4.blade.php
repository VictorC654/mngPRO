@if ($paginator->hasPages())
    <style>
        .page-link
        {
            transition:.5s all ease !important;
        }
        .page-link:hover
        {
            background-color:white !important;
            color:black !important;
            transition:.5s all ease !important;
        }
    </style>
    <nav>
        <ul class="pagination">
            @if ($paginator->onFirstPage())
                <li class="page-item" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true"
                          style="border:none;background-color: rgb(34, 40, 49);
                            padding:.8em !important;
                            color:lightgray;
                            text-decoration: none;
                            outline:none;
                            box-shadow:none;"><i class="fa-solid fa-arrow-left"></i></span>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"
                       style="border:none;background-color: rgb(34, 40, 49);
                            padding:.8em !important;
                            color:lightgray;
                            text-decoration: none;
                            outline:none;
                            box-shadow:none;"
                       class="page-link"><i class="fa-solid fa-arrow-left"></i></a>
                </li>
            @endif

            @foreach ($elements as $element)
                    @if (is_string($element))
                    <li class="page-item disabled" aria-disabled="true"><span style="padding:1em !important;">{{ $element }}</span></li>
                @endif

                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="" ><span
                                    style="background-color: white;
                                    color:black;
                                    padding:.8em !important;
                                    border:none;
                                    text-decoration: none;
                                    outline:none;"
                                    class="page-link">{{ $page }}</span></li>
                        @else
                            <li class=""><a style="border:none;background-color: rgb(34, 40, 49);
                            padding:.8em !important;
                            color:lightgray;
                            text-decoration: none;
                            outline:none;
                            box-shadow:none;"
                            class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                       style="border:none;background-color: rgb(34, 40, 49);
                            padding:.8em !important;
                            color:lightgray;
                            text-decoration: none;
                            outline:none;
                            box-shadow:none;"
                       class="page-link"><i class="fa-solid fa-arrow-right"></i></a>
                </li>
            @else
                <li class="page-item disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true"
                          style="border:none;background-color: rgb(34, 40, 49);
                            padding:.8em !important;
                            color:lightgray;
                            text-decoration: none;
                            outline:none;
                            box-shadow:none;"><i class="fa-solid fa-arrow-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
