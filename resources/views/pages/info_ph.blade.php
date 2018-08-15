@extends('layouts.mastersite')


{{-- @section('title')
    ♔  Agzkhanaa   ♔
@endsection --}}

@section('content')
        <section class="own-pharm">
            <div class="container">
            @foreach($phars as $phar)
                <div class="own-body">
                    <div class="row text-center">
                        <div class="col-lg-3 col-md-4">
                            <img src="{{URL::to('src/images/pharm1.jpg')}}" alt="pharmcy">
                        </div>
                        <div class="col-lg-6 col-md-8">
                            <h4> {{ $phar->name }}</h4>
                            <p class="lead">هذه الصيدلية تعد من اكبر واكفأ الصيدليات فى مصر من حيث كقاءة الاطباء وسرعة توصيل الدواء للمريض اينما كان </p>
                            <p class="lead">العنوان : <span>{{ $phar->locaion }}</span></p>
                        </div>
                        <div class="col-lg-3 col-md-12">
                            <button class="open-popup-link" href="#show"> عرض الادوية </button>
                        </div>
                    </div>
                </div>
            @endforeach
            </div>
        </section>

        @endsection