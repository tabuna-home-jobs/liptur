@php
    $page = Orchid\Platform\Core\Models\Page::where('slug',$slugpage)->first();
@endphp

@if(!is_null($page))
    <!-- Modal Support-->
    <div class="modal fade slide-up modalpage" id="modalpage-{{$slugpage}}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block-header clearfix">
                    {{$page->getContent('name')}}
                </div>
                <div class="modal-body">
                    {!! $page->getContent('body') !!}
                </div>
                <a class="top-right wrapper-md" data-dismiss="modal" aria-hidden="true"><i class="close-modal"></i></a>
            </div>
        </div>
    </div>
    <!-- Modal Support-->
@endif