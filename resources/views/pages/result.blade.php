@extends('layouts.mastersite')
@section('content')

       <!-- start search resault -->

        <section class="my-search">
            <div class="container">
                <div class="my-head text-center">
                    <i class="fa fa-search fa-2x"></i><h1>تقرير العملية</h1><i class="fa fa-search fa-2x"></i>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"> {{ $msg }}</span><i class="fa fa-gift fa-2x"></i></div>
                        @if($check)
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span>الدواء المطلوب</span> | <span style="color:red;">{{$namedrugs[0]->name}}</span></span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span>الصيدلية المطلوب منها الدواء</span> | <span style="color:red;">{{$pharamcies}}</span></span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span style="color:red;">{{$value}}</span> | <span>الكمية المطلوبة</span></span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span style="color:red;">{{$price}}</span> | <span>سعر القطعة</span></span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span style="color:red;">{{$total_price}}</span> | <span>سعر الكمية</span></span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span style="color:red;">{{$resultt}}</span> | <span>الكمية المتبقية بالصيدلية</span></span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span style="color:red;">{{$created_at}}</span> | <span>أسم الفاتورة</span></span><i class="fa fa-gift fa-2x"></i></div>
                        @endif
                </div>
            </div>
        </section>

        <!-- button -->
        <section class="add text-center">
            <button class="open-popup-link" href="#casher"> طلب دواء اخر</button>
        </section>

        <!-- button -->
@endsection
