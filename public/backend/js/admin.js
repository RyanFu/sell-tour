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
      language: 'vi',
      height: 300,

      // Configure your file manager integration. This example uses CKFinder 3 for PHP.
      filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
      filebrowserImageBrowseUrl: '/ckfinder/ckfinder.html?type=Images',
      filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
      filebrowserImageUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images'
    });

});