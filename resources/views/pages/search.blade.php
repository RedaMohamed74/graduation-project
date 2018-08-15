@extends('layouts.mastersite')


{{-- @section('title')
    ♔  Agzkhanaa   ♔
@endsection --}}

@section('content')


       <!-- start search resault -->

        <section class="my-search">
            <div class="container">
                <div class="my-head text-center">
                    <i class="fa fa-search fa-2x"></i><h1> نتيجة البحث </h1><i class="fa fa-search fa-2x"></i>
                    @if(count($Pharamcies)==0)
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"> نعتذر فهذا الدواء غير متوافر لدينا </span><i class="fa fa-gift fa-2x"></i></div>
                    @endif
                    <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef">{{count($Pharamcies)}} | <span>عنصر</span></span><i class="fa fa-gift fa-2x"></i></div>
                </div>
                @foreach($Pharamcies as $Pharamcy)
                @foreach($dds as $dd)

                <div class="my-body" style="margin-bottom:50px">
                    <div class="row text-center">
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <img src="{{URL::to('src/images/pharm1.jpg')}}" alt="pharmcy" style="width:auto;">
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <h2 class="media-heading"> {{$dd->name}} </h2>
                            <div style="display:inline-block; margin-top: 10px;">
                                <p style="font-size: 20px;font-weight: bold;"> السعر &nbsp; <i class="fa fa-arrow-left" style="color: #00ceef;font-size: 20px;"></i> &nbsp; <span>{{$dd->price}} جنيها</span></p>
                                <p style="font-size: 20px;font-weight: bold;"> النوع &nbsp; <i class="fa fa-arrow-left" style="color: #00ceef;font-size: 20px;"></i> &nbsp; <span> {{$dd->type}} </span></p>
                                <p style="font-size: 20px;font-weight: bold;"> الصيدليات &nbsp; <i class="fa fa-arrow-left" style="color: #00ceef;font-size: 20px;"></i> &nbsp; <span>{{$Pharamcy->name}} </span></p>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-4">
                            <img src="{{URL::to('src/images/pharma.jpg')}}" alt="pharmcy" style="width:auto;">
                        </div>
                    </div>
                </div>
                @endforeach
@endforeach
            </div>
        </section>
@endsection
