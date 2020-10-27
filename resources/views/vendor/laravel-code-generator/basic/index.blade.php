@@extends('layouts.admin')



@@section('path')
<div class="title">
    <h4>{{CodeHelper::title($model->name)}}</h4>
</div>
<nav aria-label="breadcrumb" role="navigation">
    <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">All {{CodeHelper::title($model->name)}}</li>
    </ol>
</nav>


@@endsection



@@section('content')



@@if (session('status'))
    <div style="border-left:5px solid green" class="alert alert-success">
        <center> <i class="icon-copy text-success fa fa-check-circle" aria-hidden="true"></i>  @{{ session('status') }} .</center>
    </div>
@@endif


<a style="margin-bottom:20px" href="{{CodeHelper::doubleCurlyOpen()}}route('{{CodeHelper::slug(CodeHelper::plural($model->name))}}.create'){{CodeHelper::doubleCurlyClose()}}" class="btn btn-success"><i class="icon-copy fa fa-plus" aria-hidden="true"></i>New</a>
   <table class="data-table table stripe hover nowrap">
   
    @@if(count(${{CodeHelper::snake(CodeHelper::plural($model->name))}}))
    <thead>
        <tr>
            @foreach($model->table->columns as $column)
            @if(!CodeHelper::contains('/id$/',$column->name)&&!CodeHelper::contains('/_at$/',$column->name))
            <th>{{CodeHelper::title($column->name)}}</th>
            @endif

            @endforeach
         
          
            
           <td>Action</td>
            
            
            
        </tr>
    </thead>
    @@endif
    <tbody>

    @@forelse(${{CodeHelper::snake(CodeHelper::plural($model->name))}} as ${{CodeHelper::snake($model->name)}})
    <tr>
    @foreach($model->table->columns as $column)
    @if(!CodeHelper::contains('/id$/',$column->name)&&!CodeHelper::contains('/_at$/',$column->name))
    <td>{{CodeHelper::doubleCurlyOpen()}}${{CodeHelper::snake($model->name)}}->{{$column->name}}{{CodeHelper::doubleCurlyClose()}}</td>
    @endif
    @endforeach



    
    <td>
        <div class="dropdown">
            <a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                <i class="dw dw-more"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                
            <a class="dropdown-item" href="{{CodeHelper::doubleCurlyOpen()}}route('{{CodeHelper::slug(CodeHelper::plural($model->name))}}.edit',['{{CodeHelper::snake($model->name)}}'=>${{CodeHelper::snake($model->name)}}] ){{CodeHelper::doubleCurlyClose()}}"><i class="dw dw-edit2"></i> Edit</a>

            <a class="dropdown-item"  href="{{CodeHelper::doubleCurlyOpen()}}route('{{CodeHelper::slug(CodeHelper::plural($model->name))}}.show',['{{CodeHelper::snake($model->name)}}'=>${{CodeHelper::snake($model->name)}}] ){{CodeHelper::doubleCurlyClose()}}"><i class="dw dw-eye"></i> Show</a>
            <a class="dropdown-item"  href="javascript:void(0)" onclick="event.preventDefault();
            document.getElementById('delete-{{CodeHelper::slug($model->name)}}-{{CodeHelper::doubleCurlyOpen()}}${{CodeHelper::snake($model->name)}}->id{{CodeHelper::doubleCurlyClose()}}').submit();"> <i class="dw dw-eye"></i> Delete</a>

<form id="delete-{{CodeHelper::slug($model->name)}}-{{CodeHelper::doubleCurlyOpen()}}${{CodeHelper::snake($model->name)}}->id{{CodeHelper::doubleCurlyClose()}}" action="{{CodeHelper::doubleCurlyOpen()}}route('{{CodeHelper::slug(CodeHelper::plural($model->name))}}.destroy',['{{CodeHelper::snake($model->name)}}'=>${{CodeHelper::snake($model->name)}}]){{CodeHelper::doubleCurlyClose()}}" method="POST" style="display: none;">
@@csrf
@@method('DELETE')
</form>
               
                
            </div>
        </div>
    </td>

    
    
    @@empty
    <p>No {{CodeHelper::title(CodeHelper::plural($model->name))}}</p>
</tr>
    @@endforelse
       

    <tbody>    

    </table>     




@@endsection
