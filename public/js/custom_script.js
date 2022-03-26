$(document).ready(function(){
  $('#confirmDelete').on('show.bs.modal', function (e) {
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body p').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);

        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');

        //$(this).find('.modal-footer #confirm').data('form', form);
        $(this).find('.modal-footer #confirm').data('form',form);
  });
  $('#confirmReactive').on('show.bs.modal', function (e) {
        $message = $(e.relatedTarget).attr('data-message');
        $(this).find('.modal-body p').text($message);
        $title = $(e.relatedTarget).attr('data-title');
        $(this).find('.modal-title').text($title);

        // Pass form reference to modal for submission on yes/ok
        var form = $(e.relatedTarget).closest('form');

        //$(this).find('.modal-footer #confirm').data('form', form);
        $(this).find('.modal-footer #confirm').data('form',form);
  });

   $('#video-model').on('show.bs.modal', function (e) { 
       var theModal = $(e.relatedTarget).data("target"),
      videoSRC = $(e.relatedTarget).attr("data-video");  
      $(theModal + ' video').attr('src', videoSRC);
      $(theModal + ' button.close').click(function () {
        $(theModal + ' video').attr('src', '');
      });
  });

  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
        $(this).data('form').submit();
  });  
  $('#confirmReactive').find('.modal-footer #confirm').on('click', function(){
        $(this).data('form').submit();
  });   
});
