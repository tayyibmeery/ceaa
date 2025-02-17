@extends('frontend.layout.main')

@section('title', 'Page Title')

@section('content')
@foreach ($ourservise as $servise )


<section>
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>{{$servise->heading}}</h2>
        </div>
        <div class="row">
            <p>{!!$servise->description!!}</p>
        </div>

    </div>
</section>
@endforeach
{{--
<section>
    <div class="container m-t-30">
        <div class="heading-text heading-section text-center">
            <h2>Consulting Services</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <strong style="font-size: 17px;">CEAA professionals offers consulting services, teachers’ training, capacity
                    building, technical assistance and
                    other solutions to institutions, private and corporate business and government organizations throughout Pakistan.
                    CEAA can meet partners’
                    needs in the following ways:</strong>
                <div class="m-t-20" style="font-size: 16px;">
                    <ul>
                        <li>Measure knowledge base and skill levels</li>
                        <li>Test preparation i.e. a complete guideline for test preparation</li>
                        <li>Establishing performance ranking</li>
                        <li>Score reporting</li>
                        <li>Capacity building In addition, following specialized services are provided:</li>
                        <li>Action-oriented research, analysis and training</li>
                        <li>Teachers’ training and professional development</li>
                        <li>Strategic planning</li>
                        <li>Project Identification, design, monitoring and evaluation</li>
                        <li>Baseline surveys</li>
                        <li>Impact assessment studies</li>
                        <li>Documentation / Reporting</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>



<section>
    <div class="container m-t-30">
        <div class="heading-text heading-section text-center">
            <h2>Data Processing Services</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <strong style="font-size: 17px;">Data Processing Services is a cohesive team dedicated to partnering with our
                    clients to provide:</strong>
                <div class="m-t-20" style="font-size: 16px;">
                    <ul>
                        <li>Extraordinary data entry support services</li>
                        <li>Consistent quality</li>
                        <li>Timely delivery</li>
                        <li>Cost effectiveness. It adapts to the challenges of continuous evolution in order to meet the ever-changing
                            needs of your business through:
                        </li>
                        <li>Dependable staff</li>
                        <li>Personal services delivered with integrity</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>


<section>
    <div class="container m-t-30">
        <div class="heading-text heading-section text-center">
            <h2>Monitoring Services</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="m-t-20" style="font-size: 16px;">
                    <ul>
                        <li>Communicating tests progress to the client.</li>
                        <li>Ensuring SOPs are consistent with the real time test environment.</li>
                        <li>Ensuring fool proof methods have been adopted to make the tests transparent.</li>
                        <li>Reporting any inconsistency to the client related to tests.</li>
                        <li>Monitoring the invigilation staff and premises for any inconsistency with the SOPs.</li>
                        <li>Submitting a monitoring report to the client.</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>
<section>
    <div class="container">
        <div class="heading-text heading-section text-center text-primary">
            <strong class="text-primary" style="font-size: 22px;">University Entrance Test (UET)</strong>
        </div>
        <div class="row">
            <div class="col-md-12">
                <ul>
                    <li>UET is an aptitude test administered by CTSP. UET scores are used by many of Pakistani institutions as an
                        evaluation criteria factor for admission in Bachelor and Master level admissions.
                    </li>
                    <li>University Entrance Test (UET) is for admissions in CTSP Associated Universities/ DAIs. The candidates will
                        appear in a single test only and will stand eligible for admission to all universities in the respective subject
                        group.
                    </li>
                    <li>The candidates will be required to apply for admission in the universities as per their respective
                        announcement of CTSP along with a copy of the CTSP Result Card.
                    </li>
                </ul>

                <div class="heading-text heading-section text-center">
                    <strong style="font-size: 20px;">The Result of the UET will be valid for ONE YEAR.</strong>
                </div>

                <div class="heading-text heading-section text-center">
                    <strong style="font-size: 20px;">Graduate Evaluation Test (GET) General </strong>
                </div>

                <div class="heading-text heading-section text-center">
                    <strong style="font-size: 20px;">What is GET General?</strong>
                </div>

                <div class="heading-text heading-section text-center">
                    <p style="font-size: 20px;">Graduate Evaluation Test GET General is designed for Admissions in MS/M.Phil.
                        Programs.</p>
                </div>

                <ul>
                    <li>Candidates with a minimum of sixteen (16) years of education are eligible to appear in the test.</li>
                    <li>Candidates intending to improve their previous GET score can also apply.</li>
                    <li>The Test result will remain valid for (Two Years) for Admissions.</li>
                    <li> In test center premises mobile phones are not allowed.</li>
                </ul>

                <div class="heading-text heading-section text-center">
                    <strong style="font-size: 20px;">The Result of the UAT will be valid for TWO YEAR.</strong>
                </div>

                <div class="heading-text heading-section text-center">
                    <strong style="font-size: 20px;">Graduate Evaluation Test (GET) Subject.</strong>
                </div>

                <div class="heading-text heading-section text-center">
                    <strong style="font-size: 20px;">What is GET Subject?</strong>
                </div>

                <div class="heading-text heading-section text-center">
                    <p style="font-size: 20px;">The Graduate Evaluation Test GET Subject is designed for Admissions in Ph.D.
                        Programs.</p>
                </div>

                <ul>
                    <li>Candidates with a minimum of Eighteen (18) years of education are eligible to appear in the test.</li>
                    <li>Candidates intending to improve their previous GET score can also apply.</li>
                    <li>The Test result will remain valid for (Two Years) for Admissions.</li>
                    <li>In test center premises mobile phones are not allowed.</li>
                </ul>
            </div>
        </div>
    </div>
</section>




<section>
    <div class="container">
        <div class="heading-text heading-section text-center">
            <h2>Professional Test</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2 style="font-size: 27px;" class="text-primary">What Is EET?</h2>
                <p class="m-t-15" style="font-size: 20px;">EET is designed to assess the Entry-Level Job seeker’s skill set to
                    ensure that the
                    candidate is the best applicant for hiring. EET Score Card is the Standard for
                    Employers to filter the candidates for their recruitments. Based on the Employer’s
                    criteria and Candidate’s EET Score Card , Job Selection Procedure will be performed.
                    CEAA offers prospective candidates a pathway into engineering by sitting the
                    Engineering Assessment Test (EET). Successful students will receive guaranteed
                    jobs into the local and international market.</p>
            </div>

            <h2 style="font-size: 27px;" class="text-primary m-t-15">Eligibility Criteria</h2>
            <p style="font-size: 20px;">Bachelors in Civil Engineering, Electrical and Electronic Engineering, Biomedical
                Engineering, Mechanical Engineering, Mechatronics, Computer Engineering,
                Environmental Engineering and Software Engineering etc</p>

            <h2 style="font-size: 27px;" class="text-primary m-t-15">How to apply for MET?</h2>
            <p style="font-size: 20px;">Candidate can apply via website online or App. Once registered, candidate can pay
                the fees online via debit or credit card.</p>

        </div>
    </div>
</section> --}}
@endsection

@push('scripts')

@endpush

@push('styles')

@endpush
