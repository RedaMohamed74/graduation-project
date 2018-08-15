  @extends('layouts.mastersite')

@section('content')
       <!-- start form -->
        <section class="new-form">
            <div class="container wid">
                    <div class="m-header">
                        <i class="fa fa-hand-paper-o fa-2x"></i><h2>بياناتي</h2><i class="fa fa-hand-paper-o fa-2x"></i>
                    </div>
                    <div class="m-body">
                        <form class="form-reg" id="register" style="display:block">
                            <div class="input-group">
                                <input type=search class="form-control text-center" placeholder="{{ Auth::user()->name }}" >
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control text-center" placeholder=" {{ Auth::user()->email }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" style="font-size:25px;"></i></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="text" class="form-control text-center" placeholder="{{ Auth::user()->phone }}">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-mobile" style="font-size:35px;"></i></span>
                                </div>
                            </div>
{{--                             <div class="input-group">
                                <input type="password" class="form-control text-center" placeholder=" كلمة المرور ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                </div>
                            </div>
                            <div class="input-group">
                                <input type="password" class="form-control text-center" placeholder="  تاكيد كلمة المرور ">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                                </div>
                            </div> --}}
                            <button class="btn  my-2 my-sm-0" type="submit"> تعديل</button>
                        </form>
                    </div>
                </div>
        </section>
        <!-- end form -->

        <section class="own-pharm">
            <div class="container">
                <div class="own-header text-center">
                    <i class="fa fa-star fa-2x"></i><h2 class="text-center"> الصيدليات </h2><i class="fa fa-star fa-2x"></i>
                </div>
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
                            <button> تعديل الصيدليه </button>
                            <button> حذف الصيدليه </button>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>


        <!-- button -->
        <section class="add text-center">
            <button class="open-popup-link" href="#my-treat"> اضافة صيدليه </button>
        </section>

        <!-- button -->

        @endsection