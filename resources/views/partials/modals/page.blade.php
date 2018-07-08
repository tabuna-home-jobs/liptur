<!-- Modal Support-->
<div class="modal fade slide-up" id="modalpage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i
                                class="fa fa-times"></i>
                    </button>
                    <h1>{{$page->getContent('name')}}</h1>
                </div>
                <div class="modal-body">
                    {!! $page->getContent('body') !!}
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Modal Support-->