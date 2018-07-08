<!-- Modal Support-->
<div class="modal fade slide-up disable-scroll" id="topmenu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content-wrapper">
            <div class="modal-content">
                <div class="modal-header clearfix text-left">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    @php 
                        $menus = ['shop-header','modal-menu'];
                    @endphp
                    @widget('menuWidget',$menus)
                </div>
            </div>
        </div>

    </div>
</div>
<!-- Modal Support-->