<div>
    <div class="col-lg-8 mx-auto mbr-form" >
        <form wire:submit.prevent="submit" class="mbr-form form-with-styler" >
          
            @if (session()->has('message'))
    
       
            
                <div  class="alert alert-success col-12">
                    {{ session('message') }}
                </div>
                
            
            @endif
            <div class="dragArea row">
                <div class="col-md col-sm-12 form-group" data-for="name">
                    <input type="text" name="name" placeholder="Izina"  wire:model="name" class="form-control"  id="name-form5-23">
                    @error('name') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md col-sm-12 form-group" data-for="email">
                    <input type="email" name="email" placeholder="Imeli" wire:model="email" class="form-control" id="email-form5-23">
                    @error('email') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>

                <div class="col-12 form-group" data-for="tel">
                  <input type="text" name="name" placeholder="Telefone"  wire:model="tel" class="form-control"  id="name-form5-23">
                  @error('tel') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                
                <div class="col-12 form-group" data-for="textarea">
                    <textarea name="textarea" placeholder="Ubutumwa"  wire:model="interest" class="form-control" id="textarea-form5-23"></textarea>
                    @error('interest') <span class="error text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12 align-center mbr-section-btn"><button type="submit" class="btn btn-danger-outline display-4">Ohereza</button></div>
            </div>
        </form>
    </div>
</div>
