@extends('layouts.mastersite')

@section('content')

    <body>
       
        <div class="container">
            <!-- start our services -->
            <section class="our-services text-right" id="ser">
                    <h1 class="wow bounceInDown" data-wow-offset="500">خدمات <span>أجزخانه</span></h1>
                    <div class="row">
                        <div class=" col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="feat wow bounceInRight" data-wow-offset="400">  
                                <p class="lead"> <i class="fa fa-check"></i> نرسل الدواء من اقرب صيدليه اليك . نرسل طلبك لجميع الصيدليات القريبه منك .ونضمن لك اسرع مدة توصيل وافضل جوده.</p>
                            </div>
                            <div class="feat wow bounceInUp" data-wow-offset="100">    
                                <p class="lead"> <i class="fa fa-check"></i> اعثر على اى دواء تريده بسهوله نوفر لك الدواء مهما كان ناقصا فى الصيدليات من خلال البحث عنه فى اكثر من 1000 صيدليه فى دقائق معدوده ثم نرسله اليك.</p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-6 col-lg-6 col-xl-6">
                            <div class="logo wow bounceInLeft" data-wow-offset="50" data-wow-delay="0.5s">
                                <img src="{{URL::to('src/images/logo.png')}}" alt="logo"  class="img-re">
                            </div>
                        </div>   
                    </div>
            </section>
            <!-- end our services -->
            <!--Start vedio-->
            <section class="our-vedio">
                <div class="vedio text-center wow bounceIn" data-wow-duration="1.5s">
                   <iframe width="1100" height="400" src="https://www.youtube.com/embed/b1zaJCpsCoo" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
            </section>
            <!--End vedio-->



        <!-- start loading screen-->
        <div class="loading-overlay">
            <h4> .... جارى تحميل الموقع .... </h4>
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
        <!-- end loading screen-->

    </body>
</html>
@endsection
