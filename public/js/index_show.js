$(document).ready(function () {
   $('.js-like-index').on('click', function (e) {
       e.preventDefault();

       var $link = $(e.currentTarget);
       $link.toggleClass('fa-hear-o').toggleClass('fa-heart');

       $.ajax({
           method:'POST',
           url: $link.attr('href')
       }).done(function (data) {
           $('.js-like-index-count').html(data.hearts);
       });
   });
});