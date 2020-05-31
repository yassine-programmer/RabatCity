@extends("layouts.app")
@section('css')
    <link href="/css/add.css" rel="stylesheet">
@endsection
@section("content")
    <section class="fplus-about-us-area bg-gray section-padding-120" id="about">
    <div class="container-fluid" id="999">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center mt-3">
                    <h4>Arrondissement</h4>
                    <div class="section-heading-line"></div>
                </div>
            </div>
        </div>
        <div class="row pt-5 pb-5">
            <div class="col-md-6 mx-auto accordion-image" >
            </div>
            <div class="col-md-6 mx-auto">
                <!-- Accordion -->
                <div id="accordionExample" class="accordion shadow">

                    <!-- Accordion item 1 -->
                    <div class="card">
                        <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="d-block position-relative text-dark text-uppercase collapsible-link py-2">Arrondissement Hay Riad</a></h6>
                        </div>
                        <div id="collapseOne" aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse show">
                            <div class="card-body p-2 text-center" >
                                <iframe src="https://www.google.com/maps/d/embed?mid=1N-02HuwFxEqa2F6pJqzaQmFlzHbKY2Of" width="700" height="340"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion item 2 -->
                    <div class="card">
                        <div id="headingTwo" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" class="d-block position-relative collapsed text-dark text-uppercase collapsible-link py-2">Arrondissement Souissi</a></h6>
                        </div>
                        <div id="collapseTwo" aria-labelledby="headingTwo" data-parent="#accordionExample" class="collapse">
                            <div class="card-body p-2 text-center">
                                <iframe src="https://www.google.com/maps/d/embed?mid=1T5ZgP2Osz2Mso866BTOf3eYEi92mstrn" width="700" height="340"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion item 3 -->
                    <div class="card">
                        <div id="headingThree" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" class="d-block position-relative collapsed text-dark text-uppercase collapsible-link py-2">Arrondissement Yacoub El Mansour</a></h6>
                        </div>
                        <div id="collapseThree" aria-labelledby="headingThree" data-parent="#accordionExample" class="collapse">
                            <div class="card-body p-2 text-center">
                                <iframe src="https://www.google.com/maps/d/embed?mid=1x6mg2OxUEklR4jpVS_6gTLMt6XBXI6Hx" width="700" height="340"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion item 4 -->
                    <div class="card">
                        <div id="headingFour" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" class="d-block position-relative collapsed text-dark text-uppercase collapsible-link py-2">Arrondissement Hassan</a></h6>
                        </div>
                        <div id="collapseFour" aria-labelledby="headingFour" data-parent="#accordionExample" class="collapse">
                            <div class="card-body p-2 text-center">
                                <iframe src="https://www.google.com/maps/d/embed?mid=169_5EE8HwqtcYd7B4VhqLE0abjJdy3ny" width="700" height="340"></iframe>
                            </div>
                        </div>
                    </div>

                    <!-- Accordion item 5 -->
                    <div class="card">
                        <div id="headingFive" class="card-header bg-white shadow-sm border-0">
                            <h6 class="mb-0 font-weight-bold"><a href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive" class="d-block position-relative collapsed text-dark text-uppercase collapsible-link py-2">Arrondissement Youssoufia</a></h6>
                        </div>
                        <div id="collapseFive" aria-labelledby="headingFive" data-parent="#accordionExample" class="collapse">
                            <div class="card-body p-2 text-center">
                                <iframe src="https://www.google.com/maps/d/embed?mid=1sZWqo7QcJLL_47p3bvAoI7zqLNYZN1VS" width="700" height="340"></iframe>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </section>


@endsection
