@extends('layouts.admin')

@section('title')
Requests
@endsection

@section('head')
@endsection

@section('content')
<h1>Hotel Update Requests</h1>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th>Hotel</th>
				<th>Submit Date</th>
				<th>Reviewed</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
@foreach ($requests as $request)
			<tr>
				<td>{{ $request->hotel->name }}</td>
				<td>{{ \Carbon\Carbon::parse($request->created_at)->toFormattedDateString() }}</td>
				<td>{{ $request->completed ? "Yes" : "No" }}</td>
				<td><a href="{{ url("/admin/requests/{$request->id}") }}" role="button" class="btn btn-secondary hotel-modal-btn">View</a></td>
			</tr>
@endforeach
		</tbody>
	</table>
</div>
@endsection

@section('afterBody')
@endsection