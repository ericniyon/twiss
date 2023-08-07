@extends('layouts.master')
@section('title')
{{ __('app.Partners') }}
@endsection

@section('content')
  

<section class="form5 cid-sdRp5wzlks" id="form5-23">
    
  <div class="mbr-overlay"></div>
  <div class="container">
      <div class="mbr-section-head">
          <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2"><strong>{{ __('app.Partnerwithus') }}!</strong></h3>
          
      </div>
      <div class="row justify-content-center mt-4">
        

        <livewire:partner />
      </div>
  </div>
</section>


@if($partners->count()>0)
<section class="clients1 cid-sdLbivjOXP" id="clients1-g">
  
  <div class="images-container container">
      <div class="mbr-section-head">
          <h3 class="mbr-section-title mbr-fonts-style align-center mb-0 display-2">
              <strong>{{ __('app.Theytrust') }}</strong></h3>
          
          
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