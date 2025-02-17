@extends('frontend.layout.main')

@section('title', 'Page Title')

@section('content')


<section>
		<div class="container">
			<div class="heading-text heading-section text-center">
				<h4 class="text-blue">Application Status / Eligibility</h4>
			</div>
			<form method="post" id="filter-form" style="margin-top: 10px;">
				<div class="row">
					<h5>Enter the CNIC (Without dashes) & Select Project then click on Search Button</h5>
                    <div class="col-md-3 col-12 mb-2 position-relative">
						<label for="cnic">CNIC*</label>
						<input type="text" class="form-control" min="0" max="11" id="cnic-no" name="cnic"
						       placeholder="Enter CNIC without -" required>
					</div>
                    <div class="col-md-3 col-12 mb-2 position-relative">
                        <label class="form-label" for="project">Project</label>
                        <select name="project" id="project" data-placeholder="Select Project"
                                class="form-control select2 " required></select>

                    </div>
                    <div class="col-md-3 col-12 mb-2 position-relative">
                        <label class="form-label" for="post">Posts</label>
                        <select name="post" id="post" data-placeholder="Select Post"
                                class="form-control select2 " required></select>

                    </div>

                    <div class="col-md-3 col-12 mb-2 position-relative">
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
