@push('modals-container')
    @foreach($manyForms as $key => $modal)

        <div class="modal fade in"
             id="screen-modal-{{$key}}"
             role="dialog"
             aria-labelledby="screen-modal-{{$key}}"
             data-controller="screen--modal"
             data-screen--modal-slug="{{$templateSlug}}"
             data-screen--modal-async="{{$templateAsync}}"
             data-screen--modal-method ="{{$templateAsyncMethod}}"
             data-screen--modal-url="{{$templateAsyncRoute?route($templateAsyncRoute):url()->current()}}"
        >
            <div class="modal-dialog {{$compose['class'] ?? ''}}" role="document" id="screen-modal-type-{{$key}}">
                <form class="modal-content"
                      method="post"
                      enctype="multipart/form-data"
                      data-controller="layouts--form"
                      data-action="layouts--form#submit"
                >
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <i class="icon-cross icons"></i></button>
                        <h4 class="modal-title m-b text-black font-thin" data-target="screen--modal.title"></h4>
                    </div>
                    <div class="modal-body">
                        <div data-async>
                            @foreach($modal as $item)
                                {!! $item ?? '' !!}
                            @endforeach
                        </div>

                        @csrf
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="submit-modal-{{$key}}"
                                class="btn btn-primary">{{__('Apply')}}</button>
                    </div>
                </form>
            </div>
        </div>
    @endforeach

@endpush
