<div class="modal-header">
	<h5 class="modal-title">@yield('modal-title')</h5>
	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
		<span aria-hidden="true">&times;</span>
	</button>
</div>
<form method="post" action="@yield('modal-url')">
	<div class="modal-body">
@yield('modal-body')
	</div>
	<div class="modal-footer">
		@yield('modal-footer')
	</div>
@yield('modal-hidden')
@csrf
</form>
@yield('after-modal')