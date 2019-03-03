$(function () {
    $('#topmenu').on('shown.bs.modal', function () {
      $('.modal-backdrop.in').addClass('hidden');
    })
});