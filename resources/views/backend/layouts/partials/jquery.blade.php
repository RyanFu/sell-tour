<script src="{{ url('bower/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="{{ url('backend/js/vendor.js') }}"></script>
<script type="text/javascript">
	var timeout = {!! json_encode(config('define.timeout')) !!};

	var filebrowserBrowseUrl = "{!! url(config('define.filebrowserBrowseUrl')) !!}";
	  var filebrowserImageBrowseUrl = "{!! url(config('define.filebrowserImageBrowseUrl')) !!}";
	  var filebrowserFlashBrowseUrl = "{!! url(config('define.filebrowserFlashBrowseUrl')) !!}";
	  var filebrowserUploadUrl = "{!! url(config('define.filebrowserUploadUrl')) !!}";
	  var filebrowserImageUploadUrl = "{!! url(config('define.filebrowserImageUploadUrl')) !!}";
	  var filebrowserFlashUploadUrl = "{!! url(config('define.filebrowserFlashUploadUrl')) !!}";
</script>
<script type="text/javascript" src="{{ url('bower/ckeditor/ckeditor.js') }}"></script>
<script type="text/javascript" src="{{ url('backend/js/admin.js') }}"></script>    


@yield('script')