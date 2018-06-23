@extends('layouts.app')

@section('content')

<section id="global-map-user-wrapper" route_id="{{$id}}" class="maps-style">
    <div id="global-map" class="global-maps"></div>
    <button type="button" id="delete_route" class="btn btn-danger">Удалить маршрут</button>
</section>

@endsection

@push('scripts')
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB_9M5O7t88YovZa2mePQ9VX4f79c86cqg"
        type="text/javascript"></script>


<script type="text/javascript">

    $(document).ready(function () {
        $.ajaxSetup({
            headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
        });

        $("#footer").show();

       var id = $('#global-map-user-wrapper').attr('route_id');

        window.globalMaps2.route(id);

        $('#delete_route').click(function () {
           $.post('delete', {id:id}, function (data) {
               if (data = 'Deleted') {
                    window.location.href = '/profile/route';
               } else {
                   alert('Не удалось выполнить запрос. Попробуйте еще.');
               }
           });
        });

        //$("#global-map").css('height','100vh!important');
    });

</script>
@endpush
