@extends('layouts.mastersite')
@section('content')

       <!-- start search resault -->

        <section class="my-search">
            <div class="container">

                @foreach($bills as $bill)
                <div class="my-head text-center">
                    @if($check)
                    <i class="fa fa-search fa-2x"></i><h1>بيانات الفاتورة</h1><i class="fa fa-search fa-2x"></i>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span>اسم الصيدلية</span> | <span style="font-size:25px; color:red;">{{$ph}}</span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef">أسم الدواء</span> | <span style="font-size:25px; color:red;">{{$dr}}</span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px;color:red;">{{$bill->value}}</span> | <span  style="font-size:25px; color:#00ceef">عدد القطع </span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef">الثمن الكلي</span> | <span style="font-size:25px; color:red;">{{$bill->total_price}}</span><i class="fa fa-gift fa-2x"></i></div>
                        <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"><span style="color:red;">{{$bill->created_at}}</span> | <span>أسم الفاتورة</span></span><i class="fa fa-gift fa-2x"></i></div>

                        @endif
                    
                    @endforeach
                    @if(!$check)
                    <div class="number" style="margin-bottom:40px;"><i class="fa fa-gift fa-2x"></i><span style="font-size:25px; color:#00ceef"> لا يوجد فاتورة</span><i class="fa fa-gift fa-2x"></i></div>      
                    @endif
                    </div>

            </div>
        </section>

        <!-- button -->
        <section class="add text-center">
            <button class="open-popup-link" href="#casher">عرض فاتورة اخري</button>
        </section>

        <!-- button -->
@endsection
