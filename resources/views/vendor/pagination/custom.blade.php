@if ($paginator->hasPages())
<nav class="pagination-nav">
    <ul class="pagination">
        @if ($paginator->onFirstPage())
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">Previous</a>
            </li>
        @else
            <li class="page-item"><a class="page-link" href="{{ $paginator->previousPageUrl() }}">Previous</a></li>
        @endif
      
        @foreach ($elements as $element)
            @if (is_string($element))
                <li class="page-item disabled">{{ $element }}</li>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <li class="page-item active">
                            <a class="page-link">{{ $page }}</a>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endif
                @endforeach
            @endif
        @endforeach
        
        @if ($paginator->hasMorePages())
            <li class="page-item">
                <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="#">Next</a>
            </li>
        @endif
    </ul>
@endif

<style>
    .pagination-nav{
        display: flex;
        justify-content: center;
        margin-top: 30px;
    }
    .pagination{
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    .pagination .page-item{
        padding: 5px 15px;
        border: 1px solid #ccc;
        border-right: 0;
    }
    .pagination .page-item:last-of-type{
        border: 1px solid #ccc;
    }
    .pagination .page-item a{
        color: #468ae7;
    }
    .pagination .page-item.active{
        background-color: #468ae7;
        border: none;
    }
    .pagination .page-item.active a{
        color: #fff;
    }
    .pagination .page-item:hover{
        background-color: #468ae7;
        border: none;
        cursor: pointer;
    }
    .pagination .page-item:hover a{
        color: #fff;
    }
</style>