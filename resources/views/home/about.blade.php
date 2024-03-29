@extends('layouts.master')

@section('title')
    About us
@endsection
@section('content')
    <section class="image3 cid-sdQvU0wvwB" id="image3-21">




        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-lg-7">
                    <div class="image-wrapper">
                        
                        @if (Config::get('languages')[App::getLocale()]['display'] == 'English')
                                    <img src="{{asset('master/assets/images/en.png')}}" alt="">

                                @elseif (Config::get('languages')[App::getLocale()]['display'] == 'Kinya')
                                   <img src="{{asset('master/assets/images/brand-mark-color1-1056x523.png')}}" alt="">
                                @elseif (Config::get('languages')[App::getLocale()]['display'] == 'Français')
                                   <img src="{{asset('master/assets/images/fra.png')}}" alt="">
                                @else
                                @endif
                       

                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team1 cid-sdLf1Bbj5Q" id="team1-l">



        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h3 class="mbr-section-title mbr-fonts-style align-center mb-4 display-2">
                        <strong>{{ __('app.Ourteam') }}</strong></h3>

                </div>
                <div class="col-sm-6 col-lg-4">
                    <div class="card-wrap">
                        <div class="image-wrap">
                            <img src="{{ asset('master/assets/images/imageedit-1-3628526416-576x384.jpeg') }}"
                                alt="">
                        </div>
                        <div class="content-wrap">
                            <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                                <strong>Cliff Ingabo</strong></h5>
                            <h6 style="font-size:15px" class="mbr-role mbr-fonts-style align-center mb-3 display-7">
                                <strong>{{ __('app.FounderCEO') }}</strong></h6>

                            <div class="social-row display-7">
                                <div class="soc-item">
                                    <a href="https://www.linkedin.com/in/cliff-richard-ingabo-876a4b162/" target="_blank">
                                        <span class="mbr-iconfont socicon-linkedin socicon"></span>
                                    </a>
                                </div>
                                <div class="soc-item">
                                    <a href="https://twitter.com/cliff_bmind" target="_blank">
                                        <span class="mbr-iconfont socicon-twitter socicon"></span>
                                    </a>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card-wrap">
                        <div class="image-wrap">
                            <img src="{{ asset('master/assets/images/imageonline-co-blackandwhiteimage-1-576x407.png') }}"
                                alt="">
                        </div>
                        <div class="content-wrap">
                            <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5">
                                <strong>Daisy Kabarebe</strong></h5>
                            <h6 style="font-size:15px" class="mbr-role mbr-fonts-style align-center mb-3 display-7">
                                <strong>{{ __('app.Operations') }}</strong></h6>

                            <div class="social-row display-7">
                                <div class="soc-item">
                                    <a href="#" target="_blank">
                                        <span class="mbr-iconfont socicon-linkedin socicon"></span>
                                    </a>
                                </div>
                                <div class="soc-item">
                                    <a href="https://twitter.com/Kabarebe_daisy" target="_blank">
                                        <span class="mbr-iconfont socicon socicon-twitter"></span>
                                    </a>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-4">
                    <div class="card-wrap">
                        <div class="image-wrap">
                            <img src="{{ asset('master/assets/images/whatsapp-image-2020-10-08-at-23.25.14-576x864.jpeg') }}"
                                alt="">
                        </div>
                        <div class="content-wrap">
                            <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5"><strong>Yves
                                    Himbaza</strong></h5>
                            <h6 style="font-size:15px" class="mbr-role mbr-fonts-style align-center mb-3 display-7">
                                <strong>{{ __('app.Technology') }}</strong></h6>

                            <div class="social-row display-7">
                                <div class="soc-item">
                                    <a href="https://www.linkedin.com/in/mugiraneza-himbaza-yves-240957154/"
                                        target="_blank">
                                        <span class="mbr-iconfont socicon-linkedin socicon"></span>
                                    </a>
                                </div>
                                <div class="soc-item">
                                    <a href="#" target="_blank">
                                        <span class="mbr-iconfont socicon socicon-twitter"></span>
                                    </a>
                                </div>



                            </div>

                        </div>
                    </div>
                </div>

                <!--  <div class="col-sm-6 col-lg-3">
                  <div class="card-wrap">
                      <div class="image-wrap">
                          <img src="{{ asset('master/assets/images/whatsapp-image-2020-10-09-at-12.39.26-416x62.jpeg') }}" alt="">
                      </div>
                      <div class="content-wrap">
                          <h5 class="mbr-section-title card-title mbr-fonts-style align-center m-0 display-5"><strong>Prince Niyonshuti</strong></h5>
                          <h6 style="font-size:15px" class="mbr-role mbr-fonts-style align-center mb-3 display-7"><strong>Umuhuzabikorwa</strong></h6>
                          
                          <div class="social-row display-7">
                              <div class="soc-item">
                                  <a href="https://www.linkedin.com/in/niyonshuti-prince-3a510b159/" target="_blank">
                                      <span class="mbr-iconfont socicon-linkedin socicon"></span>
                                  </a>
                              </div>
                              <div class="soc-item">
                                  <a href="https://twitter.com/npprince47?s=08" target="_blank">
                                      <span class="mbr-iconfont socicon socicon-twitter"></span>
                                  </a>
                              </div>
                              
                              
                              
                          </div>
                          
                      </div>
                  </div>
              </div>-->
            </div>
        </div>
    </section>
@endsection
