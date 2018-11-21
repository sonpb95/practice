@extends('layouts.master')
@section('content')

    <!-- content -->

    <div class="wrapper wrapper-content  animated fadeInRight blog">
        <form class="form-horizontal" method="GET" action="{{route('blog.search')}}" role="form"
              enctype="multipart/form-data">
            <div class="row">
                <div class="col-lg-2">
                    Tiêu Đề <input type="text" class="form-control" id="title" name="title">
                </div>
                <div class="col-lg-2">
                    Nội Dung <input type="text" class="form-control" id="content" name="content">
                </div>
                <div class="col-lg-2">
                    Người Đăng <input type="text" class="form-control" id="author" name="author">
                </div>
                <div class="col-lg-2">
                    Độ Tuổi
                    <select class="form-control m-b" id="age" name="age">
                        <option value="0">Mọi lứa tuổi</option>
                        <option value="8">8+</option>
                        <option value="13">13+</option>
                        <option value="18">18+</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    Giới Tính Tác Giả
                    <select class="form-control m-b" id="gender" name="gender">
                        <option value="0">All</option>
                        <option value="1">Nam</option>
                        <option value="2">Nữ</option>
                    </select>
                </div>
                <div class="col-lg-2">
                    <br>
                    <button type="submit" class="btn btn btn-primary"><i class="fa fa-search"></i> Search</button>
                </div>
            </div>
        </form>
        <div class="col-lg-16">
            @foreach ($results as $result)
                <div class="ibox">
                    <div class="ibox-content">
                        <a href="{{url('blog/edit/'.$result->id)}}" class="btn-link">
                            <h2>
                                {{$result->title}}
                            </h2>
                        </a>
                        <div class="small m-b-xs">
                            <strong>{{$result->user->name}}</strong> <span class="text-muted"><i
                                        class="fa fa-clock-o"></i> {{$result->created_at}}</span>
                        </div>
                        <p>
                            {{$result->content}}
                        </p>
                        <div class="row">
                            <div class="col-md-16">
                                <h5>Tuổi:</h5>
                                <button class="btn btn-primary btn-xs" type="button">{{$result->age_limit}}</button>
                                <button class="btn btn-white btn-xs" type="button">Publishing</button>
                            </div>
                            <div class="col-md-16">
                                <div class="small text-right">
                                    <h5>Stats:</h5>
                                    <div><i class="fa fa-comments-o"> </i> 56 comments</div>
                                    <i class="fa fa-eye"> </i> 144 views
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <a href="{{ $results->links() }}" >Next</a>
        </div>
    </div>
    </div>

@endsection