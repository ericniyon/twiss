@@extends('layouts.admin')

@@section('path')
<div class="title">
   <h4>New {{CodeHelper::title($model->name)}}</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
   <ol class="breadcrumb">
   <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">New {{CodeHelper::title($model->name)}}</li>
   </ol>
</nav>
@@endsection


@@section('content')

@@if ($errors->any())
    @@include('admin.partials.errors')
@@endif


<form action="{{CodeHelper::doubleCurlyOpen()}}route('{{CodeHelper::slug(CodeHelper::plural($model->name))}}.store'){{CodeHelper::doubleCurlyClose()}}" method="POST" novalidate>
   @@csrf
  
@foreach($model->relations as $rel)
             @if($rel->type === 'BelongsTo')
             <div class="form-group row">
                 <label class="col-sm-12 col-md-2 col-form-label" for="{{$rel->local_key}}">{{CodeHelper::title($rel->name)}}</label>
                 <div class="col-sm-12 col-md-10">
                 <select class="js-example-basic-single form-control" style="width:100%" name="{{$rel->local_key}}" id="{{$rel->local_key}}">
                     {{CodeHelper::arroba()}}foreach((\{{$rel->model->complete_name}}::all() ?? [] ) as ${{$rel->name}})
                     <option value="{{CodeHelper::doubleCurlyOpen()}}${{$rel->name}}->id{{CodeHelper::doubleCurlyClose()}}">
                         {{CodeHelper::doubleCurlyOpen()}}${{$rel->name}}->{{collect($rel->model->table->columns)->filter(function($col,$key){
                             return $col->type == 'String'; })->map(function($col) { return $col->name;})->first() }}{{CodeHelper::doubleCurlyClose()}}</option>
                     @@endforeach
                 </select>
             </div>
            </div>
             @endif
             @endforeach



             @foreach($model->table->columns as $column)
             @if(!CodeHelper::contains('/id$/',$column->name) && !CodeHelper::contains('/created_at$/',$column->name) && !CodeHelper::contains('/updated_at$/',$column->name) && !CodeHelper::contains('/deleted_at$/',$column->name))
             <div class="form-group row">

                 <label class="col-sm-12 col-md-2 col-form-label" for="{{$column->name}}">{{CodeHelper::title($column->name)}}</label>
                 <div class="col-sm-12 col-md-10">
                 @if($column->type=='Text')
                 <textarea class="form-control" name="{{$column->name}}" id="{{$column->name}}" cols="30" rows="10">{{CodeHelper::doubleCurlyOpen()}}old('{{$column->name}}'){{CodeHelper::doubleCurlyClose()}}</textarea>
                 @else
                 <input  class="form-control  @@error('{{$column->name}}') is-invalid @@enderror  {{$column->type}}" @if($column->type == 'Integer') type="number" @elseif($column->type == 'Date') type="date" @else type="text" @endif name="{{$column->name}}" id="{{$column->name}}" value="{{CodeHelper::doubleCurlyOpen()}}old('{{$column->name}}'){{CodeHelper::doubleCurlyClose()}}" @if($column->type == 'String')
                 maxlength="{{$column->length}}"
                 @endif
                 @if(!$column->nullable)
                 required="required"
                 @endif
                 >
                 @endif
                 @@if($errors->has('{{$column->name}}'))
                 <p class="text-danger">{{CodeHelper::doubleCurlyOpen()}}$errors->first('{{$column->name}}'){{CodeHelper::doubleCurlyClose()}}</p>
                 @@endif
             </div>
            </div>
             @endif
             @endforeach



      

 <div class="offset-6">
               <button type="submit" class="btn btn-primary"><i class="icon-copy fa fa-send-o" aria-hidden="true"></i>Save</button>  <a href="@{{ url()->previous() }}" class="btn btn-default"> <i class="icon-copy fa fa-th-list" aria-hidden="true"></i> Back to list</a> 
 </div>
            </form>

         </div>            
@@endsection