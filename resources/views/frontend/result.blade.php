@extends('frontend.layout.main')

@section('title', 'Page Title')

@section('content')

<section>
		<div class="container">
			<div class="heading-text heading-section text-center">
				<h4 class="text-blue">Candidates Results</h4>
			</div>
			<form method="post" id="filter-form" style="margin-top: 10px;"  >
				<div class="row">
					<h5>Enter the CNIC (Without dashes) then click on Search Button</h5>
					<div class="form-group col-6">
						<label for="exampleInputEmail1">CNIC*</label>
						<input type="text" class="form-control" min="0" max="11" id="cnic-no" name="cnic"
						       placeholder="Enter CNIC without -" required>
					</div>
					<div class="form-group col-2">
						<label for="search-label">Click to Search</label>
						<button type="submit" id="get-applicant-list" class="btn btn-info">Search</button>
					</div>
				</div>
			</form>

			<div id="app-data">
				<span id="no-data-found"></span>
			</div>
			<div class="card-body">

			</div>
		</div>
	</section>
@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
