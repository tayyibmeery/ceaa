@extends('frontend.layout.main')

@section('title',  $page->name)

@section('content')

	<section>
		<div class="container">
			<div class="heading-text heading-section text-center">
				<h2>{{$page->heading}}</h2>
			</div>
			<div class="row">
				{!!$page->description!!}
			</div>
		</div>
        <div class="m-t-30">

        </div>
	</section>
	


@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
