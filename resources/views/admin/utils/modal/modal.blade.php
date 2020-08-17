<!-- Trigger the modal with a button -->
<div class="form-group col-sm-6 col-sm-offset-3"">
	<button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#utils_modal">{{ $utils_modal_title }}</button>
</div>

<!-- Modal -->
<div id="utils_modal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<b><h3 class="modal-title">{{ $utils_modal_title }}</h3></b>
			</div>

			<div class="modal-body">
				@include($template, ['prefix' => $prefix])
				<div class="clearfix"></div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-primary" data-dismiss="modal">{{$tags['back_general_continue']}}</button>
				<button type="button" class="btn btn-default" data-dismiss="modal">{{$tags['back_general_close']}}</button>
			</div>
		</div>
	</div>
</div>