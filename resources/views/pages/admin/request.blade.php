@extends('layouts.admin')

@section('title')
Request for {{ $request->hotel->name }}
@endsection

@section('head')
@endsection

@section('content')
<h1>Request for {{ $request->hotel->name }} <a href="{{ url("/admin/hotels/{$request->hotel->id}/edit") }}" class="badge badge-primary">Link</a></h1>
<div class="table-responsive">
	<table class="table">
		<thead class="thead-light">
			<tr>
				<th></th>
				<th>Reported</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<tr class="{{ $request->hotel->name != $request->name ? "table-danger" : "" }}">
				<th scope="row">Name</th>
				<td><strong>Original: </strong>{{ $request->hotel->name }}<br><strong>Suggested: </strong>{{ $request->name }}</td>
				<td><button class="btn btn-primary">Update</button>
			</tr>
			<tr class="{{ $request->hotel->address != $request->address ? "table-danger" : "" }}">
				<th scope="row">Address</th>
				<td><strong>Original: </strong>{{ $request->hotel->address }}<br><strong>Suggested: </strong>{{ $request->address }}</td>
				<td><button class="btn btn-primary">Update</button>
			</tr>
			<tr class="{{ $request->hotel->link != $request->link ? "table-danger" : "" }}">
				<th scope="row">Link</th>
				<td><strong>Original: </strong>{{ $request->hotel->link }}<br><strong>Suggested: </strong>{{ $request->link }}</td>
				<td><button class="btn btn-primary">Update</button>
			</tr>
			<tr class="{{ $request->hotel->brand->id != $request->brand->id ? "table-danger" : "" }}">
				<th scope="row">Brand</th>
				<td><strong>Original: </strong>{{ $request->hotel->brand->name }}<br><strong>Suggested: </strong>{{ $request->brand->name }}</td>
				<td><button class="btn btn-primary">Update</button>
			</tr>
			<tr class="{{ $request->hotel->subbrand->id != $request->subbrand->id ? "table-danger" : "" }}">
				<th scope="row">Subbrand</th>
				<td><strong>Original: </strong>{{ $request->hotel->subbrand->name }}<br><strong>Suggested: </strong>{{ $request->subbrand->name }}</td>
				<td><button class="btn btn-primary">Update</button>
			</tr>
			<tr class="{{ $request->hotel->category->id != $request->category->id ? "table-danger" : "" }}">
				<th scope="row">Category</th>
				<td><strong>Original: </strong>{{ $request->hotel->category->name }}<br><strong>Suggested: </strong>{{ $request->category->name }}</td>
				<td><button class="btn btn-primary">Update</button>
			</tr>
			<tr class="{{ $request->hotel->category->points != $request->points ? "table-danger" : "" }}">
				<th scope="row">Points</th>
				<td><strong>Original: </strong>{{ $request->hotel->category->points }}<br><strong>Suggested: </strong>{{ $request->points }}</td>
				<td><button class="btn btn-primary">Update</button>
			</tr>
		</tbody>
	</table>
</div>
<hr>
<h2>Issues</h2>
<div class="accordion" id="issues">
@foreach ($request->issues as $issue)
	<div class="card">
		<h5 class="card-header" id="{{ $issue->type }}-heading" data-toggle="collapse" data-target="#{{ $issue->type }}" aria-expanded="false" aria-controls="{{ $issue->type }}">{{ $issue->descriptions[$issue->type] }}</h5>
		<div id="{{ $issue->type }}" class="collapse" aria-labelledby="{{ $issue->type }}-heading" data-parent="#issues">
			<div class="card-body">{{ $issue->description ? $issue->description : "(No description given)" }}</div>
		</div>
	</div>
@endforeach
</div>
<hr>
<form method="post" action="{{ url("/admin/requests/{$request->id}") }}">
	<div class="form-group form-check">
		<input type="checkbox" class="form-check-input" name="display" id="display" {{ isset($request) && $request->completed ? 'checked="checked"' : '' }} />
		<label class="form-check-label" for="display">Mark request as reviewed</label>
	</div>
	<button type="submit" class="btn btn-primary">Update</button>
	@csrf
	@method('PUT')
</form>
@endsection

@section('afterBody')
@endsection