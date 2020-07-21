


@if(session()->has('success'))
    {{-- <p class="alert alert-success">{{session('success')}}</p> --}}
    	<script type="text/javascript">
			$.notify("BOOM!", "success");
		</script>
@endif


@if(session()->has('error'))
    <p class="alert alert-danger">{{session('error')}}</p>
@endif

