@extends('layouts.master')
@section('content')
<form class="form-horizontal" method="POST" action="{{route('Blog.update')}}" role="form" enctype="multipart/form-data">
    {{ csrf_field() }}
    <H2>Sửa Blog </H2>
        <div class="form-group"><label class="col-sm-2 control-label">Tiêu Đề</label>
            <input type="hidden" id="blogId" name="id" value="{{$results->id}}">
            <div class="col-sm-5"><input type="text" name="title" class="form-control" value="{{$results->title}}"></div>
        </div>
        <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Nội Dung</h5>
                    
                </div>
                <div class="ibox-content no-padding">
                    <div class="col-sm-10 " >
                    
                    <textarea name="content" class="summernote" >
                        {{$results->content}}
                    </textarea>
                    </div>
                </div>
            <div class="ibox-content">
                <div class="col-lg-2">
                        <button  class="btn btn-sm btn-primary " type="submit"><strong>LƯU</strong></button>
                    </div>
            </form>


                <div class="col-lg-2">
                    <form class="form-horizontal" method="POST" action="{{url('blog/delete/'.$results->id)}}" role="form" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <button  class="btn btn-sm btn-primary " type="submit"><strong>Xóa</strong></button>
                    </form>
                </div>
            </div>

@endsection