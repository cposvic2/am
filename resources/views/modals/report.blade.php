<div id="problemReport">
    <form method="post" class="reportForm" action="{{ url("ajax/report/{$hotel->id}/submit") }}">
        <h2>Suggest changes for {{ $hotel->name }}</h2>
        <p>Is something not right? Please give us as much information you can on what's wrong.</p>
@foreach ($issue->types as $type)
        <div class="comment-checkbox-container">
            <label><input type="checkbox" name="{{ $type }}-check" class="comment-checkbox" data-target="#expand-{{ $type }}" value="1">{{ $issue->descriptions[$type] }}</label>
            <div class="comment-box-container" id="expand-{{ $type }}">
                <textarea class="comment-box" name="{{ $type }}-text" placeholder="{{ $issue->placeholders[$type] }}" rows="3"></textarea>
            </div>
        </div>
@endforeach
        <div id="newMarkerLocation">
            Is the property not located correctly on the map? Grab the marker and move it to its correct location.
            <div id="problemReport-marker-map"></div>
        </div>
        <div class="property-container" data-target="#expand-name">
            <div class="property-header">Name</div>
            <div class="">{{ $hotel->name }}</div>
        </div>
        <div class="property-expand hidden" id="expand-name">
        	<div class="property-header">Name</div>
    		<label for="name">Property Name</label>
    		<input type="text" class="full-width-input" name="name" value="{{ $hotel->name }}" />
        </div>
        <div class="property-container" data-target="#expand-address">
            <div class="property-header">Address</div>
            <div class="">{{ $hotel->address }}</div>
        </div>
        <div class="property-expand hidden" id="expand-address">
      		<div class="property-header">Address</div>
    		<label for="address">Full Address</label>
    		<input type="text" class="full-width-input" name="address" value="{{ $hotel->address }}" />
        </div>
        <div class="property-container" data-target="#expand-link">
            <div class="property-header">Website</div>
            <div class="">{{ $hotel->link }}</div>
        </div>
        <div class="property-expand hidden" id="expand-link">
        	<div class="property-header">Website</div>
    		<label for="link">URL</label>
    		<input type="text" class="full-width-input" name="link" value="{{ $hotel->link }}" />
        </div>
        <div class="property-container" data-target="#expand-brand">
            <div class="property-header">Brand</div>
            <div class="">{{ $hotel->subbrand->name }}, part of {{ $hotel->brand->name }}</div>
        </div>
        <div class="property-expand hidden" id="expand-brand">
            <div class="property-header">Brand</div>
            <label for="brand">Brand</label>
            <select name="brand">
    @foreach ($brands as $brand)
                <option value="{{ $brand->id }}"{{ $brand->id == $hotel->brand_id ? 'selected="selected"' : '' }}>{{ $brand->name }}</option>
    @endforeach
            </select>
            <label for="subbrand">Sub-brand</label>
            <select name="subbrand">
    @foreach ($hotel->brand->subbrands as $subbrand)
                <option value="{{ $subbrand->id }}"{{ $subbrand->id == $hotel->subbrand_id ? 'selected="selected"' : '' }}>{{ $subbrand->name }}</option>
    @endforeach
            </select>
        </div>
        <div class="property-container" data-target="#expand-category">
            <div class="property-header">Category &amp; Points</div>
            <div class="">{{ $hotel->category->name }}, {{ $hotel->category->points }} points</div>
        </div>
        <div class="property-expand hidden" id="expand-category">
       		<div class="property-header">Category &amp; Points</div>
    		<select name="category">
    @foreach ($hotel->brand->categories as $category)
    			<option value="{{ $category->id }}"{{ $category->id == $hotel->category_id ? 'selected="selected"' : '' }}>{{ $category->name }}</option>
    @endforeach
    		</select>
            <label for="points">Points</label>
    		<input type="text" class="small-input" name="points" value="{{ $hotel->category->points }}" />
        </div>
        
        <div class="submit-container">
            <div id="submit-status"></div>
        	<button class="btn-submit btn" id="submit">Submit</buttom>
            <button type="button" class="btn-cancel btn" id="cancel">Cancel</buttom>
        </div>
        <input type="hidden" id="latitude" value="" />
        <input type="hidden" id="longitude" value="" />
        @csrf
        @method('POST')
    </form>  
</div>
<script>
    var hotel = {
        lat: {{ $hotel->latitude }},
        lng: {{ $hotel->longitude }},
    };
</script>