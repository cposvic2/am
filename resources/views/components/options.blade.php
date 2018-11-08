<option value="">Select</option>
@foreach ($things as $thing)
	<option value="{{ $thing->id }}"{{ isset($default) && $default === $thing->id ? ' selected="selected"' : '' }}>{{ $thing->name }}</option>
@endforeach