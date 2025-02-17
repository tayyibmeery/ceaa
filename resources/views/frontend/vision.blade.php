@extends('frontend.layout.main')

@section('title', 'Page Title')

@section('content')


<section>
    <div class="container ">
        @foreach ($cores as $index => $core)
        @if ($index % 2 == 0)
        <div class="row m-t-30">
            <div class="col-md-6">
                <div class="heading-text heading-section">
                    <h2>{{ $core->heading }}</h2>
                </div>
                <strong class="m-t-30" style="font-size: 17px;">
                    {!! $core->description !!}
                </strong>
            </div>
            <div class="col-md-1"></div>

            <div class="col-md-5 mt-3 mt-md-0">
                <img style="width: 100%;" src="{{ asset($core->image) }}">
            </div>
        </div>
       <br>
        @else

        <div class="row m-t-50">
            <div class="col-md-5 mb-3 mb-md-0">
                <img style="width: 100%;" src="{{ asset($core->image) }}">
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-6">
                <div class="heading-text heading-section">
                    <h2>{{ $core->heading }}</h2>
                </div>
                <strong class="m-t-30" style="font-size: 17px;">
                    {!! $core->description !!}
                </strong>
            </div>
        </div>
      <br>
        @endif
        @endforeach
    </div>
    <div class=" m-t-30"></div>
</section>





@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
