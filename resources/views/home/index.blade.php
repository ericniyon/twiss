@extends('layouts.master')

@section('content')
  

<section class="header4 cid-sdL5RFtmlf mbr-fullscreen" id="header4-a">

    
  <div class="mbr-overlay"></div>
  <div class="container">
      <div class="row">
          <div class="content-wrap">
              <h1 class="mbr-section-title mbr-fonts-style mbr-white mb-3 display-2"><strong>Inkuru z'ikinyarwanda kuri buri mwana.</strong></h1>
              
              <p class="mbr-fonts-style mbr-text mbr-white mb-3 display-7">Umusomyi wa none niwe muyobozi w'ejo.</p>

              <div class="mbr-section-btn"><a class="btn btn-info display-4" href="https://mobiri.se">Soma igitabo</a> <a class="btn btn-danger display-4" href="https://mobiri.se">Umva igitabo</a></div>
          </div>
      </div>
  </div>
</section>

<section class="features18 cid-sdMUpXuyTT" id="features19-1h">

  

  <div class="mbr-overlay" style="opacity: 0.5; background-color: rgb(255, 255, 255);">
  </div>
  <div class="container">
      <div class="row justify-content-center">
          <div class="card col-12 col-lg">
              <div class="card-wrapper">
                  <h6 class="card-title mbr-fonts-style mb-4 display-2"><strong>Uko bikora</strong></h6>
                  <p class="mbr-text mbr-fonts-style display-7">Dukorana n’ibigo by’amashuri mu kugeza ikoranabuhanga ryacu ku banyeshuri ndetse tukagendana nabo mu rugendo rwo kumenya no gukunda gusoma.&nbsp;<br>.</p>
                  <div class="mbr-section-btn"><a class="btn btn-danger-outline display-4" href="{{route('partner')}}"><span class="mobi-mbri mobi-mbri-right mbr-iconfont mbr-iconfont-btn"></span>Ndifuza iri koranabuhanga</a></div>
              </div>
          </div>
          <div class="col-12 col-lg-7">
              <div class="image-wrapper">
                  <img src="{{asset('master/assets/images/testmonial-1024x576.jpg')}}" alt="Mobirise">
              </div>
          </div>
      </div>
  </div>
</section>

<section class="gallery2 cid-sdMVhqtUCf" id="gallery2-1i">
  
  
    <livewire:featured-books />
</section>

<section id="contactUS" class="form5 cid-sdQt7JBjVy" id="form5-20">
  
  <div class="mbr-overlay"></div>
  <div class="container">
      <div class="mbr-section-head">
          <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>Tuvugishe!</strong></h3>
          
      </div>
      <div class="row justify-content-center mt-4">
          <div class="col-lg-8 mx-auto mbr-form" data-form-type="formoid">
              <form action="https://mobirise.eu/" method="POST" class="mbr-form form-with-styler" data-form-title="Form Name"><input type="hidden" name="email" data-form-email="true" value="KperyplyWrqcLttfBjtxS5EbQPI6yD0D7M+UMEm9LhI9/qIF88Yj6G3emGXir1L+h+2YnhO3L49XpKB7BjnFJXrsUp9iXmEN/HChxtkggkBeL8bqKOUlnFph1boaKXbA">
                  <div class="">
                      <div hidden="hidden" data-form-alert="" class="alert alert-success col-12">Murakoze! Umwe mu bakozi bacu araza kubavugisha.</div>
                      <div hidden="hidden" data-form-alert-danger="" class="alert alert-danger col-12">Oops...! some
                          problem!</div>
                  </div>
                  <div class="dragArea row">
                      <div class="col-md col-sm-12 form-group" data-for="name">
                          <input type="text" name="name" placeholder="Izina" data-form-field="name" class="form-control" value="" id="name-form5-20">
                      </div>
                      <div class="col-md col-sm-12 form-group" data-for="email">
                          <input type="email" name="email" placeholder="Imeli" data-form-field="email" class="form-control" value="" id="email-form5-20">
                      </div>
                      
                      <div class="col-12 form-group" data-for="textarea">
                          <textarea name="textarea" placeholder="Ubutumwa" data-form-field="textarea" class="form-control" id="textarea-form5-20"></textarea>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn"><button type="submit" class="btn btn-danger-outline display-4">Ohereza</button></div>
                  </div>
              </form>
          </div>
      </div>
  </div>
</section>


@if($partners->count()>0)
<section class="clients1 cid-sdLbivjOXP" id="clients1-g">
  
  <div class="images-container container">
      <div class="mbr-section-head">
          <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
              <strong>Abafatanyabikorwa</strong></h3>
          
          
      </div>
      <div class="row justify-content-center mt-4">
          @foreach($partners as $key => $partner)
          <div class="col-md-3 card">
            <img src="{{asset('storage/partners/logos/'.$partner->logo)}}">
        </div> 
          @endforeach
          
         
      </div>
  </div>
</section>

@endif
@endsection