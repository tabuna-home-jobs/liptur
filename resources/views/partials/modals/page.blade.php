@php
    $page = Cache::remember('partials-modals-page-'.$slugpage.'-'.App::getLocale(), \Carbon\Carbon::now()->addHour(), function () use ($slugpage) {
        $page=Orchid\Press\Models\Page::where('slug',$slugpage)->first();
        $page->content_name=$page->getContent('name');
        $page->content_body=$page->getContent('body');
        return $page;
    });
@endphp

@if(!is_null($page))
    <!-- Modal Support-->
    <div class="modal fade slide-up modalpage" id="modalpage-{{$slugpage}}" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="block-header clearfix">
                    {{$page->content_name}}
                </div>
                <div class="modal-body">
                    {!! $page->content_body !!}
                </div>
                <a class="top-right wrapper-md" data-dismiss="modal" aria-hidden="true"><i class="close-modal"></i></a>
            </div>
        </div>
    </div>
    <!-- Modal Support-->
@endif