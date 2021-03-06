$(document).ready(function(){
  $('#list_tours').DataTable();
  $('#list_hotel').DataTable();
  $('#list_food').DataTable();
  //Confirm delete
  $('#confirmDelete').on('show.bs.modal', function (e) {
      // set message
      $message = $(e.relatedTarget).attr('data-message');
      $('.modal-body p').text($message);
      // set title for model
      $title = $(e.relatedTarget).attr('data-title');
      $('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $('.modal-footer #confirm').data('form', form);
  });
 
      //Form confirm (yes/ok) handler, submits form
  $('#confirmDelete .modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  }); 
  //countdown shutdown alert
  $("div.alert").delay(timeout).slideUp();
  
  //ckeditor content
  CKEDITOR.replace( 'content', {
    height: 300,

    filebrowserBrowseUrl: filebrowserBrowseUrl,
    filebrowserImageBrowseUrl : filebrowserImageBrowseUrl,
    filebrowserFlashBrowseUrl : filebrowserFlashBrowseUrl,
    filebrowserUploadUrl : filebrowserUploadUrl,
    filebrowserImageUploadUrl : filebrowserImageUploadUrl,
    filebrowserFlashUploadUrl :filebrowserFlashUploadUrl
  });

});