     <!-- start header -->
        <div class="header" style="margin-bottom: 60px">
            <nav class="navbar navbar-expand-lg">
                <div class="logo" style="margin-right:35px; padding-right:35px;">
                    <img src="{{URL::to('src/images/lo5o.png')}}" alt="اجزخانه">
                    <img src="{{URL::to('src/images/lo55o.png')}}" alt="اجزخانه">
                </div>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-info-circle" style="font-size:35px; color:#00ceef;padding-left:10px;"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item ">
                            <a class="nav-link active" href="{{ route('index') }}"> الرئيسية </a>
                        </li>

                @if(Auth::check() and Auth::user()->havePharamcy == 1)
                        <li class="nav-item ">
                            <a class="nav-link open-popup-link" href="#cashe"> الفواتير </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link open-popup-link" href="#editation"> اضافة دواء </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link open-popup-link" href="#casher"> Casher </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link open-popup-link" href="#my-treat"> صيدليتى </a>
                        </li>
                        @endif
                        @if(!Auth::check() or (Auth::check() and Auth::user()->havePharamcy == 0))
                        <li class="nav-item ">
                            <a class="nav-link" href='{{ route('index') }}#aboutus'>من نحن</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href='{{ route('index') }}#ser'>خدماتنا</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link"  href='{{ route('getinfoph') }}'>صيدلياتنا</a>
                        </li>
                        <li class="nav-item ">
                            <a class="fa show-search open-popup-link" href='#sea' method="get" data-wow-delay="2.2s"><i class="fa fa-search"></i></a>
                        </li >
                    @endif
                    @if(!Auth::check())
                         <li class="nav-item ">
                            <a class="fa fa-user-o open-popup-link" href="#test-popup"></a>
                        </li>
                    @endif
                    @if(Auth::check())
                         <li class="icon ">
                            <a class="nav-link" href="{{url('profile')}}">صفحتي</a>
                         </li>
                         <li class="icon ">
                        <a class="" href="{{route('logout')}}">تسجيل الخروج</a>
                        </li>
                    @endif
                    </ul>


                </div>
            </nav>

            <div class="carousel-caption text-center">
                <h1 class="wow bounceInRight" data-wow-duration="1.5s"> يمكنك الان معرفة اقرب صيدليه لك وطلب دوائك اونلاين</h1>

                <div class="input-group" id="sea">
                <form action="{{route('search')}}" method="get"> 
                <div class="input-group-prepend wow bounceInLeft" data-wow-duration="1.5s" >
                    <span class="input-group-text" id="basic-addon1"><i class="fa fa-search" style="background: #00A2B9; color: #fff; font-size: 20px;"></i></span>
                    <input name="name" type=search class="form-control text-center" placeholder="ابحث هنا " aria-label="Username" aria-describedby="basic-addon1">

                </div>
                </form>

                </div>
            </div>
        </div>
        <!-- end header -->


                <!-- فورم تسجيل الدخول  -->
        <div id="test-popup" class="white-popup mfp-hide">
            <div class="modal-header">
                <a href="#" class="login-toggle">تسجيل الدخول </a>
                <a href="#" class="register-toggle">تسجيل عضويه جديده </a>
            </div>
            <div class="modal-body text-center">
                <form class="form-login" id="login" action="{{ route('login')}}" method="post">
                    <div class="input-group {{$errors->has('name') ? ' has-error' : ''}}">
                        <input name="name" value="{{Request::old('name')}}" class="form-control text-center" placeholder="اسم الصيدليه  " >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control text-center" placeholder="************">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 20px;">تسجيل  </button>
                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                </form>
                <form class="form-register" id="register" action="{{ route('signup') }}" method="POST">
                    <div class="input-group {{$errors->has('name') ? ' has-error' : ''}}">
                        <input value="{{Request::old('name')}}" type=search class="form-control text-center" placeholder="اسمك" name="name">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
{{--                     
                    <div class="mapping" style="margin-bottom:10px">
                            <iframe async defer src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d22967.472785389007!2d31.466620294461435!3d31.16152168711915!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2seg!4v1530286536711"
                             width="350" height="300" frameborder="0" style="border:0" allowfullscreen></iframe>
                    </div> --}}

                    <div class="input-group {{$errors->has('email') ? ' has-error' : ''}}">
                        <input class="form-control text-center" placeholder="الايميل" type="email" name="email" id="email " value="{{Request::old('email')}}">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input name="phone" value="{{Request::old('phone')}}" type="text" class="form-control text-center" placeholder="رقم الهاتف ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control text-center" placeholder="ادخل الرقم السري">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                    <div class="input-group {{$errors->has('location') ? ' has-error' : ''}}">
                        <input name="location" value="{{Request::old('location')}}" type="text" class="form-control text-center" placeholder="أدخل اسم الحي" name="location">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
                        </div>
                    </div>
                     <div id="map" class="input-group" style="border:0; margin-bottom:10px; width:350px; height:300px; " frameborder="0"  allowfullscreen></div>
                     <input value="{{Request::old('lat')}}" type="hidden" name="lat" id="lat">
                     <input value="{{Request::old('lng')}}" type="hidden" name="lng" id="lng">
                    <p style="color:blue;">هل أنت صاحب صيدلية؟ هل تريد اضافه صيدليتك لموقع أجزخانة<p>
                    <div class="input-group">
                         <div >
                         <p>نعم</p><input type="radio" name="havepharamcy" value="1">
                         <p>لا</p><input type="radio" name="havepharamcy" value="0">
                         </div>
                     </div>
                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 20px;" >تسجيل  </button>
                </form>
            </div>
        </div>

        <!-- ____________________________________________________________________________________________ -->
        <div id="my-treat" class="white-popup mfp-hide">
            <div class="modal-header">
                <a href="#" class="login-toggle">صيدلياتي</a>
                <a href="#" class="register-toggle">تسجيل صيدلية جديده </a>
            </div>
            <div class="modal-body text-center">
                <form class="form-login" id="login" action="" method="post">
                    <div style="margin-top:15px; margin-bottom:25px">
                        <button class="btn  my-2 my-sm-0 open-popup-link" type="submit" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#showph">قائمة  صيدلياتي</button>
                    </div>
                    <div style="margin-top:15px; margin-bottom:25px">
                        <button class="btn  my-2 my-sm-0 open-popup-link" type="submit" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#cashe"> الفواتير </button>
                    </div>
                    <div style="margin-top:15px; margin-bottom:25px">
                        <button class="btn  my-2 my-sm-0 open-popup-link" type="button" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#show"> عرض الادويه  </button>
                    </div>
                    <div class=" research" style="margin-top:15px; margin-bottom:25px">
                        <button class="btn  my-2 my-sm-0 open-popup-link" type="submit" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#editation" > أضافة دواء جديد لصيدلياتي</button>
                    </div>
                    <div class=" research" style="margin-top:15px; margin-bottom:25px">
                        <button class="btn  my-2 my-sm-0 open-popup-link" type="submit" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#addquantity" > أضافة كميه جديدة من الادوية</button>
                    </div>

                </form>
                <form class="form-register" id="addph" action="{{ route('addPharamcy') }}" method="POST">
                    <div class="input-group">
                        <input value="{{Request::old('namee')}}" type=text class="form-control text-center" placeholder="اسم الصيدليه" name="namee">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input name="loccation" value="{{Request::old('loccation')}}" type="text" class="form-control text-center" placeholder="العنوان" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
                        </div>
                    </div>

                    <div class="input-group">
                        <input class="form-control text-center" placeholder="الايميل" type="email" name="email" id="email" value="{{Request::old('email')}}">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input name="phone" value="{{Request::old('phone')}}" type="text" class="form-control text-center" placeholder="رقم الهاتف ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input name="password" type="password" class="form-control text-center" placeholder="ادخل الرقم السري">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                     <div id="map" class="input-group" style="border:0; margin-bottom:10px; width:350px; height:300px; " frameborder="0"  allowfullscreen></div>
                     <input value="{{Request::old('lat')}}" type="hidden" name="lat" id="lat">
                     <input value="{{Request::old('lng')}}" type="hidden" name="lng" id="lng">
                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 20px;" >تسجيل  </button>
                </form>
            </div>

        </div>


        <!-- ____________________________________________________________________________________________ -->


 
        <!-- فورم الكاشير -->
        <div id="casher" class="white-popup mfp-hide">
            <div class="modal-header" style="height:70px;">
                <p>Casher</p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login" action="{{ route('addBill') }}" method="post">
                    <div class="input-group">
                        <input type=text name="namedrugs" class="form-control text-center" value="{{Request::old('name')}}" placeholder="اسم الدواء   " >
                    </div>
                        <div class="input-group {{$errors->has('pharamcy_id') ? ' has-error' : ''}}">
                            <select name="pharamcy_id" class="form-control" id="city">
                                @foreach($phars as $phar)
                                    <option value="{{$phar->id}}">{{$phar->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="input-group">
                        <input type=number name="value" class="form-control text-center" value="{{Request::old('value')}}" placeholder=" الكميه " >
                    </div>
                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 20px;" > اضافة الفاتوره </button>
                </form>
            </div>
        </div>
        <!-- فورم صيدليتى  -->
        <div id="my-treat" class="white-popup mfp-hide">
            <div class="modal-header" style="height:70px;">
                <p>بيانات الصيدليه </p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login">
                    <div class="input-group">
                        <input type=text class="form-control text-center" placeholder="صيدلية سيف " >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user"></i></span>   
                        </div>
                    </div>
                    <div class="input-group">
                        <input type=text class="form-control text-center" placeholder=" شارع الجمهوريه " >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-location-arrow"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type=text class="form-control text-center" placeholder=" من 9 صباحا الى 12 مساءا " >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-clock-o"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="text" class="form-control text-center" placeholder="01111558592 ">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone"></i></span>
                        </div>
                    </div>
                    <div class="input-group">
                        <input type="password" class="form-control text-center" placeholder="************">
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-lock"></i></span>
                        </div>
                    </div>
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 22px;" > احفظ </button>
                </form>
            </div>
            <div style="margin-top:15px; margin-bottom:25px">
                <button class="btn  my-2 my-sm-0 open-popup-link" type="submit" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#cashe"> الفواتير </button>
            </div>
            <div style="margin-top:15px; margin-bottom:25px">
                <button class="btn  my-2 my-sm-0 open-popup-link" type="button" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#show"> عرض الادويه  </button>
            </div>
            <div class=" research" style="margin-top:15px; margin-bottom:25px">
                <button class="btn  my-2 my-sm-0 open-popup-link" type="submit" style="width:450px ; height:55px; background:#00ceef; color:#fff; font-size:25px;" href="#editation" > الادويه  </button>
                <div class="input-group" style="width:450px; height:50px;">
                    <div class="input-group-prepend">
                        <span class="input-group-text" style="background:#00ceef; color:#fff"><i class="fa fa-search"></i></span>
                        <input type=search class="form-control text-center" placeholder="بحث عن منتج ">
                    </div>   
                </div>
            </div>
        </div>
        <!-- فورم عرض الادويه   -->
        <div class="white-popup mfp-hide" id="show">
            <div class="modal-header" style="height:70px">
                <p> عرض الادويه </p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login">
                    @foreach($drugs as $drug)
                    <div class="input-group">
                        <input type=text class="form-control text-center" disabled placeholder="{{ $drug->name }}" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-md"></i></span>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>

        <!-- ________________________________form to pharamcy___________________________________________-->
                <!-- -->
{{--         <div class="white-popup mfp-hide" id="showph">
            <div class="modal-header" style="height:70px">
                <p>صيدلياتي</p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login">
                    @foreach($phars as $phar)
                    <div class="input-group">
                        <input style="background-color:#00CEEF; color: #FFFFFF!important;" type=text class="form-control text-center" disabled="" placeholder="{{ $phar->name }}" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-md"></i></span>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div> --}}
        <!-- ________________________________end form to pharamcy___________________________________________-->   
         <!-- ________________________________form to pharamcy___________________________________________-->
                <!-- -->
        <div class="white-popup mfp-hide" id="showallph">
            <div class="modal-header" style="height:70px">
                <p>صيدلياتي</p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login">
                    @foreach($phars as $phar)
                    <div class="input-group">
                        <input style="background-color:#00CEEF; color: #FFFFFF;" type=text class="form-control text-center" disabled="" value="{{ $phar->name }}" >
                        <div class="input-group-prepend">
                            <span class="input-group-text" id="basic-addon1"><i class="fa fa-user-md"></i></span>
                        </div>
                    </div>
                    @endforeach
                </form>
            </div>
        </div>
        <!-- ________________________________end form to pharamcy___________________________________________-->
        {{-- _________________________  form add drugs_________________________________ --}}

        <div class="white-popup mfp-hide" id="editation">
            <div class="modal-header" style="height:70px">
                <p> أضافة دواء</p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login" action="{{ route('addDrugs')}}" method="POST">
                    <div class="input-group {{$errors->has('name') ? ' has-error' : ''}}">
                        <input name="name" type=text class="form-control text-center" placeholder=" كونجستال  " >
                    </div>
                    <div class="input-group {{$errors->has('type') ? ' has-error' : ''}}">
                        <input name="type" type=text class="form-control text-center"  placeholder=" دواء حبوب   ">
                    </div>
                    <div class="input-group {{$errors->has('price') ? ' has-error' : ''}}">
                        <input name="price" type=text class="form-control text-center" placeholder="السعر" >
                    </div>
                        <div class="input-group">
                            <select name="attribute_id" class="form-control" id="city1">
                                <option value="" selected="" disabled="">المواد الفعالة المتاحه بصيدلياتك</option>
                                @foreach($attributes as $attribute)
                                    <option value="{{$attribute->id}}">{{$attribute->name}}</n> _ تركيز   : {{$attribute->value}} </option>
                                @endforeach
                            </select>
                        </div>
                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 22px;" > احفظ </button>
                </form>
            </div>
        </div>

        {{-- _________________________ end of form add drugs_________________________________ --}}
        <!-- _____________________________ form to add quantity _________________________________-->
                <div class="white-popup mfp-hide" id="addquantity">
            <div class="modal-header" style="height:70px">
                <p>أضافة كمية</p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login" action="{{ route('addQuantity')}}" method="POST">
                    <div class="input-group {{$errors->has('quantity') ? ' has-error' : ''}}">
                        <input name="quantity" type=text class="form-control text-center" placeholder=" كونجستال  " >
                    </div>
                        <div class="input-group">
                            <select name="pharamcy_id" class="form-control" id="city2">
                                @foreach($phars as $phar)
                                    <option value="{{$phar->id}}">{{$phar->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="input-group {{$errors->has('drugs_id') ? ' has-error' : ''}}">
                            <select name="drugs_id" class="form-control" id="city3">
                                @foreach($drugs as $drug)
                                    <option value="{{$drug->id}}">{{$drug->name}}</option>
                                @endforeach
                            </select>
                        </div>

                    <div class="input-group {{$errors->has('expire_date') ? ' has-error' : ''}}">
                        <input name="expire_date" type="text" id="datepicker1" placeholder="تاريخ الانتهاء">

                    </div>

                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 22px;" > احفظ </button>
                </form>
            </div>
        </div>
  <!-- _____________________________end form to add quantity _________________________________-->
  
        <!-- فورم الفواتير  -->
        <div class="white-popup mfp-hide" id="cashe">
            <div class="modal-header" style="height:70px">
                <p> الفواتير </p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login" action="{{ route('getBills') }}" method="get">
                    <p style="margin-bottom: 30px; font-size: 22px;"><input name="name" type="text" id="datepicker2" style="width:280px; height: 45px;" placeholder="04/04/2018"> : اليوم</p>
                    <input type="hidden" name="_token" value="{{ Session::token()}}">
                    <button class="btn  my-2 my-sm-0" type="submit" style="width:150px; font-size: 22px;" > احفظ </button>
                </form>
            </div>
        </div>
        <!-- فورم عرض الفاتوره -->

                <!-- فورم عرض الفاتوره -->
        <div class="white-popup mfp-hide" id="fatora" style="height:585px;">
            <div class="modal-header" style="height:70px">
                <p> فاتورة <span>03/13/2018</span></p>
            </div>
            <div class="modal-body text-center">
                <form class="form-login" style="direction:rtl;">
                    <div class="row" style="margin-bottom:35px; margin-top:15px;">
                        <div class="col col-tan">اسم الدواء</div>
                        <div class="col col-tan">النوع</div>
                        <div class="col col-tan">الكميه</div>
                    </div>
                    <div class="row row-tan">
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" بنادول " >
                        </div>
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" شريط " >
                        </div>
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" 6 " >
                        </div>
                    </div>
                    <div class="row row-tan">
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" اسبرين " >
                        </div>
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" حبوب " >
                        </div>
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" 23 " >
                        </div>
                    </div>
                    <div class="row row-tan">
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" فوار فروتى " >
                        </div>
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" علبه " >
                        </div>
                        <div class="col">
                            <input type=text class="form-control text-center" placeholder=" 5 " >
                        </div>
                    </div> 
                    <div class="row" style="float:left;">
                        <p style="padding-top: 20px;padding-left: 15px;font-size: 25px;">اجمالى </p>
                        <span class="span-tan">160 <br>جنيها </span>
                    </div>                              
                </form>
            </div>
        </div>  