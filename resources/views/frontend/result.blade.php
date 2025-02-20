@extends('frontend.layout.main')

@section('title', 'Result Details')

@section('content')

<section class="d-flex justify-content-center align-items-center py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-10">
                <div class="card shadow-lg p-4">
                    <div class="widget clearfix widget-archive notificationSection">
                        <div class="heading-text heading-section text-center mb-4">
                            <h4 class="text-blue">Result Details</h4>
                        </div>
                        <hr>

                        <!-- Display Result Details -->
                        @if(isset($result))
                        <div class="mt-4">
                            <ul class="list-group">
                                <li class="list-group-item"><strong>Marks Obtained:</strong> {{ $result->marks_obtained }}</li>
                                <li class="list-group-item"><strong>Total Marks:</strong> {{ $result->total_marks }}</li>
                                <li class="list-group-item"><strong>Percentage:</strong> {{ number_format(($result->marks_obtained / $result->total_marks) * 100, 2) }}%</li>
                                <li class="list-group-item"><strong>Remarks:</strong> {{ $result->remarks }}</li>
                            </ul>
                            <div class="text-center mt-4">
                                <a href="{{ route('candidate_result.download', $result->id) }}" class="btn btn-success w-50">Download Result</a>
                            </div>
                        </div>
                        @endif

                        <!-- Display Errors -->
                        @if(session('error'))
                        <div class="alert alert-danger mt-4 text-center">
                            {{ session('error') }}
                        </div>
                        @endif

                        <!-- No Data Found Message -->
                        <div id="no-data-found" class="text-center mt-4" style="display: none;">
                            <p>No result found for the entered CNIC.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection

@push('styles')
<style>
    .card {
        border-radius: 10px;
        background: #61d874;
    }
    .list-group-item {
        background: white;
        font-size: 16px;
    }
    .btn-success {
        display: block;
        margin: 10px auto;
    }
</style>
@endpush

@push('scripts')
<script>
    // Optional: Add any JavaScript logic if needed
</script>
@endpush
