@extends('layouts.public.app')

@section('title', 'Home - Finco')

@section('content')

    <main>

        <!-- search-popup -->
        <section class="modal fade bs-example-modal-lg search-bg popup1" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content search-popup">
                    <div class="text-center">
                        <a href="#" class="close2" data-dismiss="modal" aria-label="Close">× close</a>
                    </div>
                    <div class="row search-outer">
                        <div class="col-md-11"><input type="text" placeholder="Search for products..." /></div>
                        <div class="col-md-1 text-right"><a href="#"><i class="fa fa-search"
                                    aria-hidden="true"></i></a></div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /search-popup -->
        <!-- slider-area -->
        <section id="home" class="slider-area fix p-relative">

            <div class="">
                <div class="single-slider slider-bg d-flex" style="background-image:url(img/slider/slider_img01.png)">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="slider-content s-slider-content text-center mt-170">
                                    <h2 data-animation="fadeInUp" data-delay=".4s">Building a <span>Brighter
                                            Financial</span> Future For Your Business</h2>
                                    <p data-animation="fadeInUp" data-delay=".6s">Nullam rutrum vel massa vitae luctus.
                                        Nullam lacinia diam in velit ullamcorper,<br> eget pharetra neque pulvinar.</p>
                                    <div class="slider-btn mt-40">
                                        <a href="#" class="btn ss-btn" data-animation="fadeInRight"
                                            data-delay=".8s">Read More</a>
                                        <div class="btn-after" data-animation="fadeInRight" data-delay=".8s"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </section>
        <!-- slider-area-end -->
        <!-- services-area -->
        <section id="feature-top" class="services-area services-bg services-two">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="s-single-services active ">
                            <div class="services-icon">
                                <div class="glyph-icon flaticon-document"></div>
                            </div>
                            <div class="services-icon2">
                                <div class="glyph-icon flaticon-document"></div>
                            </div>
                            <div class="second-services-content">
                                <h5><a href="services-detail.html">Business banking</a></h5>
                                <p>Praesent accumsan velit non magna gravida lacinia. Pellentesque vitae finibus quam ullam
                                    nec sollicitudin nisi.</p>
                                <a href="#" class="btn2 mt-20">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon icon-f2">
                                <div class="glyph-icon flaticon-agreement"></div>
                            </div>
                            <div class="services-icon2">
                                <div class="glyph-icon flaticon-agreement"></div>
                            </div>
                            <div class="second-services-content">
                                <h5><a href="services-detail.html">Customer Insights</a></h5>
                                <p>Praesent accumsan velit non magna gravida lacinia. Pellentesque vitae finibus quam ullam
                                    nec sollicitudin nisi.</p>
                                <a href="#" class="btn2 mt-20">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="s-single-services ">
                            <div class="services-icon">
                                <div class="glyph-icon flaticon-edition"></div>
                            </div>
                            <div class="services-icon2">
                                <div class="glyph-icon flaticon-edition"></div>
                            </div>
                            <div class="second-services-content">
                                <h5><a href="services-detail.html">Advanced Analytics</a></h5>
                                <p>Praesent accumsan velit non magna gravida lacinia. Pellentesque vitae finibus quam ullam
                                    nec sollicitudin nisi.</p>
                                <a href="#" class="btn2 mt-20">Read More <i class="fas fa-chevron-right"></i></a>
                            </div>

                        </div>
                    </div>


                </div>

            </div>
        </section>
        <!-- services-area-end -->
        <!-- about-area -->
        <section id="about" class="about-area about-p pt-55 pb-170 p-relative">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="about-content s-about-content">
                            <div class="about-title second-atitle">
                                <h2>We Are Always Ready To Assist Our Clients</h2>
                            </div>
                            <p>Nunc tristique eros vitae nulla molestie dapibus. Etiam eu hendrerit turpis, a rutrum augue.
                                Donec quis vestibulum tellus, ut dignissim diam.</p>
                            <P>Donec porta velit tellus, vitae euismod diam tincidunt nec. Ut suscipit, eros vel eleifend
                                dapibus, velit eros auctor justo, non bibendum erat quam nec neque. Morbi egestas sed eros
                                sit amet vestibulum. Pellentesque consectetur, turpis a lacinia ornare.</P>
                            <p>Donec mollis malesuada quam vel gravida. Pellentesque vestibulum, neque elementum iaculis
                                porta, ante mi bibendum orci, et eleifend nulla est nec dolor. Aliquam mollis ante et lorem
                                mattis, ut venenatis odio aliquet. </p>
                            <ul class="ab-coutner">
                                <li>
                                    <div class="single-counter ">
                                        <div class="counter p-relative">
                                            <span class="count">879</span><small>+</small>
                                        </div>
                                        <p>Project Done</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-counter ">
                                        <div class="counter p-relative">
                                            <span class="count">9874</span><small>+</small>
                                        </div>
                                        <p>Satisfied Clients</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="single-counter ">
                                        <div class="counter p-relative">
                                            <span class="count">50</span><small>+</small>
                                        </div>
                                        <p>Years Experience</p>
                                    </div>
                                </li>
                            </ul>
                            <div class="slider-btn mt-30">
                                <a href="#" class="btn ss-btn" data-animation="fadeInRight" data-delay=".8s">Read
                                    More</a>
                                <div class="btn-after" data-animation="fadeInRight" data-delay=".8s"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 pl-70">
                        <div class="s-about-img p-relative">
                            <img src="{{ asset('assets/public/img/features/about_img.png') }}" alt="img">
                        </div>
                        <div class="sinature-box">
                            <div class="c-icon mb-30"><img src="{{ asset('assets/public/img/features/c-Icon.png') }}"
                                    alt="c-Icon.png') }}"></div>
                            <h2>Suspendisse ringilla mi sit amet leo.</h2>
                            <h3>CEO: Cerry Monroye</h3>
                            <img src="{{ asset('assets/public/img/features/signature.png') }}" alt="img">
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- about-area-end -->
        <!-- newslater-area -->
        <section class="newslater-area pt-95 pb-100"
            style="background-image: url(img/bg/subscibe-bg.png);background-size: cover;">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6">
                        <div class="section-title">
                            <h2>Subscribe To Our Newsletter For Latest Update</h2>
                            <p class="mt-20">Quisque posuere mollis ipsum et molestie. Fusce cursus, risus vel scelerisque
                                porttitor, leo quam vulputate nibh, sit amet blandit erat magna.</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <form name="ajax-form" id="contact-form4" action="#" method="post"
                            class="contact-form newslater pl-60">
                            <div class="form-group">
                                <input class="form-control" id="email2" name="email" type="email"
                                    placeholder="Email Address..." value="" required="">
                                <button type="submit" class="btn btn-custom" id="send2"><i
                                        class="fab fa-telegram-plane"></i></button>
                            </div>
                            <!-- /Form-email -->
                        </form>
                    </div>
                </div>

            </div>
        </section>
        <!-- newslater-aread-end -->

        <!-- services-area -->
        <section id="services" class="services-area testimonial-p pt-95 pb-70 fix">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section-title center-align mb-40 text-center">
                            <h2>
                                Our Specialized Financial Services
                            </h2>
                            <img src="{{ asset('assets/public/img/bg/t-c-line.png') }}" />
                        </div>
                        <div class="services-active2">

                            <div class="slider slider-for">
                                <div class="single-testimonial">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('assets/public/img/features/services-img.png') }}"
                                                alt="services" />
                                        </div>
                                        <div class="col-lg-6">
                                            <h2>All-in-One Business Strategy Solution For Your Business</h2>
                                            <p>Pellentesque consectetur, turpis a lacinia ornare, leo metus euismod ipsum,
                                                sed semper purus magna vel tortor. Donec mollis malesuada quam vel gravida.
                                                Pellentesque vestibulum, neque elementum iaculis porta, ante mi bibendum
                                                orci, et eleifend nulla est nec dolor.</p>
                                            <ul>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimonial">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('assets/public/img/features/services-img.png') }}"
                                                alt="services" />
                                        </div>
                                        <div class="col-lg-6">
                                            <h2>All-in-One Finanical Solution For Your Business</h2>
                                            <p>Pellentesque consectetur, turpis a lacinia ornare, leo metus euismod ipsum,
                                                sed semper purus magna vel tortor. Donec mollis malesuada quam vel gravida.
                                                Pellentesque vestibulum, neque elementum iaculis porta, ante mi bibendum
                                                orci, et eleifend nulla est nec dolor.</p>
                                            <ul>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimonial">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('assets/public/img/features/services-img.png') }}"
                                                alt="services" />
                                        </div>
                                        <div class="col-lg-6">
                                            <h2>All-in-One Life & Pension Solution For Your Business</h2>
                                            <p>Pellentesque consectetur, turpis a lacinia ornare, leo metus euismod ipsum,
                                                sed semper purus magna vel tortor. Donec mollis malesuada quam vel gravida.
                                                Pellentesque vestibulum, neque elementum iaculis porta, ante mi bibendum
                                                orci, et eleifend nulla est nec dolor.</p>
                                            <ul>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimonial">
                                    <div class="row align-items-center">
                                        <div class="col-lg-6">
                                            <img src="{{ asset('assets/public/img/features/services-img.png') }}"
                                                alt="services" />
                                        </div>
                                        <div class="col-lg-6">
                                            <h2>All-in-One Money Investment Solution For Your Business</h2>
                                            <p>Pellentesque consectetur, turpis a lacinia ornare, leo metus euismod ipsum,
                                                sed semper purus magna vel tortor. Donec mollis malesuada quam vel gravida.
                                                Pellentesque vestibulum, neque elementum iaculis porta, ante mi bibendum
                                                orci, et eleifend nulla est nec dolor.</p>
                                            <ul>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                                <li>
                                                    <span class="icon"><img
                                                            src="{{ asset('assets/public/img/icon/s-check.png') }}"
                                                            alt="check"></span>
                                                    <span class="text">Fusce et blandit lorem, a blandit libero. Mauris
                                                        eu consectetur dui. Aliquam nec nisi eros.</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="slider slider-nav">
                                <div class="services-item">
                                    <div class="glyph-icon flaticon-dashboard"></div>
                                    <h3>Business Strategy</h3>
                                </div>
                                <div class="services-item">
                                    <div class="glyph-icon flaticon-graphic"></div>
                                    <h3>Finanical Planning</h3>
                                </div>
                                <div class="services-item">
                                    <div class="glyph-icon flaticon-hand"></div>
                                    <h3>Life & Pension</h3>
                                </div>
                                <div class="services-item">
                                    <div class="glyph-icon flaticon-index"></div>
                                    <h3>Money Investment</h3>
                                </div>
                            </div>


                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- services-area-end -->
        <!-- cta-area -->
        <section class="cta-area cta-bg">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="section-title cta-title ">
                            <div class="mb-40">
                                <h2>We Are The Best Consult Company Ever!!</h2>
                            </div>
                            <p>Praesent accumsan velit non magna gravida lacinia. Pellentesque vitae finibus quam. Nullam
                                nec sollicitudin nisi. Mauris tincidunt convallis tempus. Phasellus gravida pretium felis
                                vel fringilla. Nunc eleifend ante at orci tempor eleifend.</p>
                            <p>Sed eget est est. Donec at interdum enim, et eleifend eros. Vestibulum at euismod risus,
                                fringilla tempus nibh. Praesent eros eros, malesuada convallis ligula ac, dictum gravida
                                ante. </p>
                        </div>

                    </div>
                    <div class="col-lg-6">
                        <div class="video-img"
                            style="background-image:url(img/video/how-img.png); background-size: cover;">
                            <a href="https://www.youtube.com/watch?v=7e90gBu4pas" class="popup-video"> <img
                                    src="img/video/play.svg" alt="img" class="active-icon"></a>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- cta-area-end -->
        <!-- gallery-area -->
        <section id="work" class="pt-70 pb-70">
            <div class="container">
                <div class="portfolio ">
                    <div class="row align-items-center mb-70">
                        <div class="col-lg-5">
                            <div class="section-title cta-title  pl-15">
                                <h2>Our Latest Cases</h2>
                                <img src="{{ asset('assets/public/img/bg/t-r-line.png') }}" />
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="my-masonry">
                                <div class="button-group filter-button-group ">
                                    <button class="active" data-filter="*">All</button>
                                    <button data-filter=".financial">Financial</button>
                                    <button data-filter=".banking">Banking</button>
                                    <button data-filter=".insurance">Insurance</button>
                                    <button data-filter=".family">Family</button>
                                    <button data-filter=".business">Business</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="grid col3">
                        <div class="grid-item financial">
                            <a href="projects-detail.html">
                                <figure class="gallery-image">
                                    <img src="{{ asset('assets/public/img/gallery/protfolio-img01.png') }}"
                                        alt="img" class="img">
                                    <figcaption>
                                        <div class="icon">+</div>
                                        <span>Finance</span>
                                        <h4>Miranda Hilix Bar</h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="grid-item financial banking">
                            <a href="projects-detail.html">
                                <figure class="gallery-image">
                                    <img src="{{ asset('assets/public/img/gallery/protfolio-img02.png') }}"
                                        alt="img" class="img">
                                    <figcaption>
                                        <div class="icon">+</div>
                                        <span>Banking</span>
                                        <h4>Miranda Hilix Bar</h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="grid-item insurance">
                            <a href="projects-detail.html">
                                <figure class="gallery-image">
                                    <img src="{{ asset('assets/public/img/gallery/protfolio-img03.png') }}"
                                        alt="img" class="img">
                                    <figcaption>
                                        <div class="icon">+</div>
                                        <span>Insurance</span>
                                        <h4>Miranda Hilix Bar</h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="grid-item family">
                            <a href="projects-detail.html">
                                <figure class="gallery-image">
                                    <img src="{{ asset('assets/public/img/gallery/protfolio-img04.png') }}"
                                        alt="img" class="img">
                                    <figcaption>
                                        <div class="icon">+</div>
                                        <span>Family</span>
                                        <h4>Miranda Hilix Bar</h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="grid-item business">
                            <a href="projects-detail.html">
                                <figure class="gallery-image">
                                    <img src="{{ asset('assets/public/img/gallery/protfolio-img05.png') }}"
                                        alt="img" class="img">
                                    <figcaption>
                                        <div class="icon">+</div>
                                        <span>Business</span>
                                        <h4>Miranda Hilix Bar</h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                        <div class="grid-item financial">
                            <a href="projects-detail.html">
                                <figure class="gallery-image">
                                    <img src="{{ asset('assets/public/img/gallery/protfolio-img06.png') }}"
                                        alt="img" class="img">
                                    <figcaption>
                                        <div class="icon">+</div>
                                        <span>Financial</span>
                                        <h4>Miranda Hilix Bar</h4>
                                    </figcaption>
                                </figure>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- gallery-area-end -->

        <!-- graph-area -->
        <section id="graph" class="graph-area pt-90 pb-70"
            style="background-image:url(img/bg/graph-bg.png); background-size: cover; background-repeat: no-repeat;background-position: center center;">
            <div class="container">

                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="section-title cta-title  mb-20">
                            <h2>Services we serve to all over the world</h2>
                        </div>
                        <p>Nullam quis aliquet elit. Cras augue tortor, lacinia et fermentum eget, suscipit id ligula. Donec
                            id mollis sem, nec tincidunt neque. Pellentesque habitant morbi tristique senectus et netus.</p>
                        <ul>
                            <li>
                                <div class="icon"><img src="{{ asset('assets/public/img/icon/sw-Icon.png') }}"
                                        alt="sw"></div>
                                <div class="text">
                                    <h4>Security</h4>
                                    <p>Proin neque est, sollicitudin vitae scelerisque eu, pharetra sit amet nisi urabitur
                                        elementum commodo</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="{{ asset('assets/public/img/icon/sw-Icon2.png') }}"
                                        alt="sw"></div>
                                <div class="text">
                                    <h4>Flexibility</h4>
                                    <p>Proin neque est, sollicitudin vitae scelerisque eu, pharetra sit amet nisi urabitur
                                        elementum commodo</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon"><img src="{{ asset('assets/public/img/icon/sw-Icon3.png') }}"
                                        alt="sw"></div>
                                <div class="text">
                                    <h4>Support</h4>
                                    <p>Proin neque est, sollicitudin vitae scelerisque eu, pharetra sit amet nisi urabitur
                                        elementum commodo</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <img src="{{ asset('assets/public/img/bg/graph.png') }}" alt="graph">
                    </div>



                </div>

            </div>
        </section>
        <!-- graph-area-end -->

        <!-- team-area-->
        <section id="team" class="pt-100 pb-40">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center pl-40 pr-40 mb-80">
                            <h2>Our Best Financial Advisor</h2>
                            <img src="{{ asset('assets/public/img/bg/t-c-line.png') }}">
                        </div>
                    </div>
                </div>
                <div class="row team-active">
                    <div class="col-xl-4">
                        <div class="single-team text-center mb-30 ">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('assets/public/img/team/team_img01.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Nashid Martines</h4>
                                <span>DIRECTOR</span>

                                <div class="team-social mt-15">
                                    <p>Nullam rutrum vel massa vitae luctus ullam lacinia diam in velit ullamcorper.</p>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="single-team text-center mb-30 ">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('assets/public/img/team/team_img02.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Konne Backfield</h4>
                                <span>MARKETING</span>
                                <div class="team-social mt-15">
                                    <p>Nullam rutrum vel massa vitae luctus ullam lacinia diam in velit ullamcorper.</p>
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="single-team text-center mb-30 ">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('assets/public/img/team/team_img03.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Hackson Willingham</h4>
                                <span>SALES MANAGER</span>
                                <div class="team-social mt-15">
                                    <p>Nullam rutrum vel massa vitae luctus ullam lacinia diam in velit ullamcorper.</p>

                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="single-team text-center mb-30 ">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('assets/public/img/team/team_img04.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Nashid Martines</h4>
                                <span>DIRECTOR</span>
                                <div class="team-social mt-15">
                                    <p>Nullam rutrum vel massa vitae luctus ullam lacinia diam in velit ullamcorper.</p>

                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="single-team text-center mb-30 ">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('assets/public/img/team/team_img01.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Konne Backfield</h4>
                                <span>MARKETING</span>
                                <div class="team-social mt-15">
                                    <p>Nullam rutrum vel massa vitae luctus ullam lacinia diam in velit ullamcorper.</p>

                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="single-team text-center mb-30 ">
                            <div class="team-thumb">
                                <div class="brd">
                                    <img src="{{ asset('assets/public/img/team/team_img02.jpg') }}" alt="img">
                                </div>
                            </div>
                            <div class="team-info">
                                <h4>Hackson Willingham</h4>
                                <span>SALES MANAGER</span>
                                <div class="team-social mt-15">
                                    <p>Nullam rutrum vel massa vitae luctus ullam lacinia diam in velit ullamcorper.</p>

                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- team-area-end -->
        <!-- pricing-area -->
        <section id="pricing" class="pricing-area pb-40">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center pl-40 pr-40 mb-80">
                            <h2>Best Value At Your Service</h2>
                            <img src="{{ asset('assets/public/img/bg/t-c-line.png') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="pricing-box text-center mb-60 ">
                            <div class="pricing-head">
                                <div class="glyph-icon flaticon-pie-chart"></div>
                                <h4>Basic Plan</h4>
                            </div>
                            <div class="pricing-body mb-30 text-center">
                                <p>Morbi sollicitudin eros urna, eu posuere est pulvinar nec.</p>
                                <p>Sed pharetra ligula et tempus tincidunt.</p>
                                <p>Proin sed rhoncus neque.</p>
                            </div>
                            <div class="price-count mb-30">
                                <h2>$49 <span>/ Monthly</span></h2>
                            </div>
                            <div class="pricing-btn">
                                <a href="#" class="btn">Join Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="pricing-box active text-center mb-60 ">
                            <div class="pricing-head">
                                <div class="glyph-icon flaticon-graphic"></div>
                                <h4>Standard Plan</h4>
                            </div>
                            <div class="pricing-body mb-30 text-center">
                                <p>Morbi sollicitudin eros urna, eu posuere est pulvinar nec.</p>
                                <p>Sed pharetra ligula et tempus tincidunt.</p>
                                <p>Proin sed rhoncus neque.</p>

                            </div>
                            <div class="price-count mb-30">
                                <h2>$99 <span>/ Monthly</span></h2>
                            </div>
                            <div class="pricing-btn">
                                <a href="#" class="btn">Join Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="pricing-box text-center mb-60 ">
                            <div class="pricing-head">
                                <div class="glyph-icon flaticon-research"></div>
                                <h4>Premium Plan</h4>
                            </div>
                            <div class="pricing-body mb-30 text-center">
                                <p>Morbi sollicitudin eros urna, eu posuere est pulvinar nec.</p>
                                <p>Sed pharetra ligula et tempus tincidunt.</p>
                                <p>Proin sed rhoncus neque.</p>
                            </div>
                            <div class="price-count mb-30">
                                <h2>$149 <span>/ Monthly</span></h2>
                            </div>
                            <div class="pricing-btn">
                                <a href="#" class="btn">Join Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- pricing-area-end -->


        <!-- testimonial-area -->
        <section id="testimonios" class="testimonial-area testimonial-p pt-90 pb-85 fix" style="background: #f1f4ff;">
            <div class="container">
                <div class="row justify-content-center">

                    <div class="col-lg-10">
                        <div class="section-title center-align mb-60 text-center">
                            <h2>What Our Client’s Say’s</h2>
                            <img src="{{ asset('assets/public/img/bg/t-c-line.png') }}">
                        </div>
                        <div class="testimonial-active">


                            <div class="single-testimonial">
                                <div class="testi-img">
                                    <img src="{{ asset('assets/public/img/testimonial/test_img01.png') }}"
                                        alt="img">
                                </div>
                                <div class="single-testimonial-bg">
                                    <div class="com-icon"><img src="{{ asset('assets/public/img/bg/Icon_comment.png') }}"
                                            alt="img"></div>
                                    <div class="testi-author">
                                        <div class="ta-info">
                                            <h6>Jone Dose</h6>
                                            <span>CEO & Founder</span>

                                        </div>
                                    </div>
                                    <p>Nullam metus mi, sollicitudin eu elit non, laoreet consectetur urna. Nullam quis
                                        aliquet elit. Cras augue tortor, lacinia et fermentum eget, suscipit id ligula.
                                        Donec id mollis sem, nec tincidunt neque. Pellentesque habitant morbi tristique
                                        senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>

                            </div>
                            <div class="single-testimonial">
                                <div class="testi-img">
                                    <img src="{{ asset('assets/public/img/testimonial/test_img01.png') }}"
                                        alt="img">
                                </div>
                                <div class="single-testimonial-bg">
                                    <div class="com-icon"><img src="{{ asset('assets/public/img/bg/Icon_comment.png') }}"
                                            alt="img"></div>
                                    <div class="testi-author">
                                        <div class="ta-info">
                                            <h6>Margie R. Robinson</h6>
                                            <span>Web Developer</span>

                                        </div>
                                    </div>
                                    <p>Nullam metus mi, sollicitudin eu elit non, laoreet consectetur urna. Nullam quis
                                        aliquet elit. Cras augue tortor, lacinia et fermentum eget, suscipit id ligula.
                                        Donec id mollis sem, nec tincidunt neque. Pellentesque habitant morbi tristique
                                        senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>

                            </div>
                            <div class="single-testimonial">
                                <div class="testi-img">
                                    <img src="{{ asset('assets/public/img/testimonial/test_img01.png') }}"
                                        alt="img">
                                </div>
                                <div class="single-testimonial-bg">
                                    <div class="com-icon"><img src="{{ asset('assets/public/img/bg/Icon_comment.png') }}"
                                            alt="img"></div>
                                    <div class="testi-author">
                                        <div class="ta-info">
                                            <h6>Rose Dose</h6>
                                            <span>Sale Executive</span>

                                        </div>
                                    </div>
                                    <p>Nullam metus mi, sollicitudin eu elit non, laoreet consectetur urna. Nullam quis
                                        aliquet elit. Cras augue tortor, lacinia et fermentum eget, suscipit id ligula.
                                        Donec id mollis sem, nec tincidunt neque. Pellentesque habitant morbi tristique
                                        senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>

                            </div>
                            <div class="single-testimonial">
                                <div class="testi-img">
                                    <img src="{{ asset('assets/public/img/testimonial/test_img01.png') }}"
                                        alt="img">
                                </div>
                                <div class="single-testimonial-bg">
                                    <div class="com-icon"><img src="{{ asset('assets/public/img/bg/Icon_comment.png') }}"
                                            alt="img"></div>
                                    <div class="testi-author">
                                        <div class="ta-info">
                                            <h6>Jone Dose</h6>
                                            <span>SALES EXECUTIVE</span>

                                        </div>
                                    </div>
                                    <p>Nullam metus mi, sollicitudin eu elit non, laoreet consectetur urna. Nullam quis
                                        aliquet elit. Cras augue tortor, lacinia et fermentum eget, suscipit id ligula.
                                        Donec id mollis sem, nec tincidunt neque. Pellentesque habitant morbi tristique
                                        senectus et netus et malesuada fames ac turpis egestas.</p>
                                </div>

                            </div>



                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- testimonial-area-end -->
        <!-- faq-area -->
        <section class="faq-area pt-90 pb-100"
            style="background-image: url(img/shape/header-sape6.png); background-position: right center; background-size: auto;background-repeat: no-repeat;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center pl-40 pr-40 mb-80">
                            <h2>Frequently Asked Question</h2>
                            <img src="{{ asset('assets/public/img/bg/t-c-line.png') }}">
                        </div>
                    </div>
                </div>
                <div class="row align-items-end">
                    <div class="col-lg-6">
                        <div class="faq-img text-right">
                            <img src="{{ asset('assets/public/img/bg/faq-img.png') }}" alt="img" class="img">
                        </div>
                    </div>
                    <div class="col-lg-6">

                        <div class="faq-wrap">
                            <div class="accordion" id="accordionExample">
                                <div class="card">
                                    <div class="card-header" id="headingThree">
                                        <h2 class="mb-0">
                                            <button class="faq-btn" type="button" data-toggle="collapse"
                                                data-target="#collapseThree" aria-expanded="true"
                                                aria-controls="collapseThree">
                                                Aliquam varius ligula nec leo tempus porta.
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseThree" class="collapse show" aria-labelledby="headingThree"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut aliquip
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="faq-btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseOne" aria-expanded="false"
                                                aria-controls="collapseOne">
                                                Suspendisse vitae varius diam, a vulputate urna.
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut aliquip
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="faq-btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseTwo" aria-expanded="false"
                                                aria-controls="collapseTwo">
                                                Aliquam aliquet purus eget lacus pretium.
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut aliquip
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingOne">
                                        <h2 class="mb-0">
                                            <button class="faq-btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#headingFour" aria-expanded="false"
                                                aria-controls="headingFour">
                                                Suspendisse vitae varius diam, a vulputate urna.
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="headingFour" class="collapse" aria-labelledby="headingFour"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut aliquip
                                        </div>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-header" id="headingTwo">
                                        <h2 class="mb-0">
                                            <button class="faq-btn collapsed" type="button" data-toggle="collapse"
                                                data-target="#collapseFive" aria-expanded="false"
                                                aria-controls="collapseFive">
                                                Aliquam aliquet purus eget lacus pretium.
                                            </button>
                                        </h2>
                                    </div>
                                    <div id="collapseFive" class="collapse" aria-labelledby="headingFive"
                                        data-parent="#accordionExample">
                                        <div class="card-body">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                            incididunt ut labore et dolore magna
                                            aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                            ut aliquip
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- faq-aread-end -->

        <!-- counter-area -->
        <div class="call-area pt-95 pb-85"
            style="background-image:url(img/call/call-bg.png); background-repeat: no-repeat; background-position: bottom; background-size: cover;">
            <div class="container">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8 col-md-8 col-sm-8">
                        <h2>Perfect Solutions <span>For Any Industrials</span></h2>
                        <p>Donec at nunc laoreet, aliquet mi non, scelerisque diam. Mauris pulvinar nisl eget dui luctus, eu
                            vehicula odio tempus. Nulla maximus molestie ante eget sollicitudin.</p>
                        <div class="number">+91 555 234-8765</div>
                    </div>

                </div>
            </div>
        </div>
        <!-- counter-area-end -->

        <!-- blog-area -->
        <section id="blog" class="blog-area  p-relative pt-95 pb-90 fix">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-10">
                        <div class="section-title text-center mb-80">
                            <h2>Stay Updated To Our Blog & News</h2>
                            <img src="{{ asset('assets/public/img/bg/t-c-line.png') }}">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 col-md-12">
                        <div class="single-post mb-30 ">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img src="{{ asset('assets/public/img/blog/inner_b1.jpg') }}"
                                        alt="img"></a>
                                <div class="b-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <i class="far fa-calendar-alt"></i> 7 March, 2019
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <i class="fas fa-user"></i> By Jhone Doe
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-center">
                                <h4><a href="blog-details.html">Praesent justo mauris, tincidunt vitae nisi ultricies.</a>
                                </h4>
                                <p>Aenean sed velit nulla. Etiam viverra scelerisque porta. Quisque ut dolor aliquam,
                                    gravida lacus.</p>

                                <div class="blog-btn"><a href="#">Read More<i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="single-post active mb-30 ">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img src="{{ asset('assets/public/img/blog/inner_b2.jpg') }}"
                                        alt="img"></a>
                                <div class="b-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <i class="far fa-calendar-alt"></i> 7 March, 2019
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <i class="fas fa-user"></i> By Jhone Doe
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-center">

                                <h4><a href="blog-details.html">Monthly eraesent justo mauris, vitae nisi ultricies.</a>
                                </h4>
                                <p>Aenean sed velit nulla. Etiam viverra scelerisque porta. Quisque ut dolor aliquam,
                                    gravida lacus.</p>
                                <div class="blog-btn"><a href="#">Read More<i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12">
                        <div class="single-post mb-30 ">
                            <div class="blog-thumb">
                                <a href="blog-details.html"><img src="{{ asset('assets/public/img/blog/inner_b3.jpg') }}"
                                        alt="img"></a>
                                <div class="b-meta">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6">
                                            <i class="far fa-calendar-alt"></i> 7 March, 2019
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <i class="fas fa-user"></i> By Jhone Doe
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-content text-center">

                                <h4><a href="blog-details.html">User Experience Psychology And Performance Smashing</a>
                                </h4>
                                <p>Aenean sed velit nulla. Etiam viverra scelerisque porta. Quisque ut dolor aliquam,
                                    gravida lacus.</p>

                                <div class="blog-btn"><a href="#">Read More <i
                                            class="fas fa-chevron-right"></i></a></div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!-- blog-area-end -->

        <!-- contact-area -->
        <section id="contact" class="contact-area contact-bg pt-95 pb-95 p-relative fix"
            style="background-image:url(img/bg/contact_bg.png); background-size: cover;background-repeat: no-repeat;">
            <div class="map"><img src="{{ asset('assets/public/img/bg/map.png') }}" alt="map"></div>
            <div class="container">

                <div class="row">
                    <div class="col-lg-5">
                        <div class="section-title mb-60">
                            <h2>Get In Touch With Us</h2>
                            <img src="{{ asset('assets/public/img/bg/t-r-line.png') }}">
                        </div>
                        <form action="#" class="contact-form ">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-name mb-20">
                                        <input type="text" placeholder="Write here  Jhonathan Doe">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-email mb-20">
                                        <input type="text" placeholder="Write here youremail">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-subject mb-20">
                                        <input type="text" placeholder="I would like to discuss">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="contact-field p-relative c-message mb-45">
                                        <textarea name="message" id="message" cols="30" rows="10" placeholder="Write comments"></textarea>
                                    </div>
                                    <div class="slider-btn">
                                        <a href="#" class="btn ss-btn" data-animation="fadeInRight"
                                            data-delay=".8s">Send Message</a>
                                        <div class="btn-after" data-animation="fadeInRight" data-delay=".8s"></div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>

        </section>
        <!-- contact-area-end -->
        <!-- brand-area -->
        <div class="brand-area pt-100 pb-100" style="background-color:#fff">
            <div class="container">
                <div class="row brand-active">
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="{{ asset('assets/public/img/brand/c-logo1.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="{{ asset('assets/public/img/brand/c-logo2.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="{{ asset('assets/public/img/brand/c-logo3.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="{{ asset('assets/public/img/brand/c-logo4.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="{{ asset('assets/public/img/brand/c-logo5.png') }}" alt="img">
                        </div>
                    </div>
                    <div class="col-xl-2">
                        <div class="single-brand">
                            <img src="{{ asset('assets/public/img/brand/c-logo6.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- brand-area-end -->
    </main>

@endsection
