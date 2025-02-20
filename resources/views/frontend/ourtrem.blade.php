@extends('frontend.layout.main')

@section('title',  $trem->name)

@section('content')

	<section>
		<div class="container">
			<div class="heading-text heading-section text-center">
				<h2>{{$trem->heading}}</h2>
			</div>
			<div class="row">
				{!!$trem->description!!}
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
