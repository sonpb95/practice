@extends('layouts.master')
@section('content')

                <!-- content -->

    <div class="wrapper wrapper-content  animated fadeInRight blog">
            <div class="row">
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
                                <strong>{{$result->user->name}}</strong> <span class="text-muted"><i class="fa fa-clock-o"></i> {{$result->created_at}}</span>
                            </div>
                            <p>
                                {{!! $result->content !!}}
                            </p>
                            <div class="row">
                                <div class="col-md-16">
                                        <h5>Tags:</h5>
                                        <button class="btn btn-primary btn-xs" type="button">Model</button>
                                        <button class="btn btn-white btn-xs" type="button">Publishing</button>
                                </div>
                                <div class="col-md-16">
                                    <div class="small text-right">
                                        <h5>Stats:</h5>
                                        <div> <i class="fa fa-comments-o"> </i> 56 comments </div>
                                        <i class="fa fa-eye"> </i> 144 views
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <a href="{{ $results->links() }}" aria-controls="DataTables_Table_0" data-dt-idx="4" tabindex="0">Next</a>
                </div>
            </div>
        </div>
                       
@endsection