/*
 $( document ).ready(function() {
 // activate jquery isotope
 var $container = $('#gallery').isotope({
 itemSelector : '.item',
 isFitWidth: false
 });

 $container.isotope({
 columnWidth: '.col-sm-3'
 });


 $container.isotope({ filter: '*' });

 // filter items on button click
 $('#gallery-filters').on( 'click', 'button', function() {

 $('#gallery-filters button').removeClass("font-bold");
 $(this).addClass('font-bold');
 var filterValue = $(this).attr('data-filter');
 $container.isotope({ filter: filterValue });
 });
 });
 */