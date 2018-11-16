@extends('layouts.master')
@section('content')
<form class="form-horizontal" method="POST" action="{{route('Blog.store')}}" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <H2>Tạo Blog </H2>
        <div class="form-group"><label class="col-sm-2 control-label">Tiêu Đề</label>

            <div class="col-sm-5"><input type="text" name="title" class="form-control"></div>
        </div>
        <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Nội Dung</h5>
                    
                </div>
                <div class="ibox-content no-padding">
                    <div class="col-sm-10 " >
                    
                    <textarea name="content" class="summernote" >
                        
                    </textarea>
                    </div>
                </div>
                <div class="ibox-content">
                        <button  class="btn btn-sm btn-primary " type="submit"><strong>LƯU</strong></button>
                    </div>
</form>

@endsection