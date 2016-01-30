@extends('manage.wrap')

@section('main')
    <div class="wrapper wrapper-content animated fadeInUp">
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>所有密钥</h5>
                        
                        <div class="ibox-tools">
                            <a href="{{ url('/manage/token/create') }}" class="btn btn-primary btn-xs">添加密钥</a>

                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="project-list">
                            <table class="table table-hover">
                                <tbody>
                                @foreach($tokens as $key => $token)
                                    <tr>
                                        <td class="col-sm-2">
                                            {{ $key+1 }}
                                        </td>
                                        <td class="project-completion">
                                            {{ $token->value }}
                                        </td>
                                        <td>
                                            {{ $token->getKind() }}
                                        </td>
                                        <td class="project-actions">
                                            {!! Form::open(['url' => '/manage/token/'.$token->id, 'method' => 'DELETE', 'class' => 'inline']) !!}
                                            {!! Form::hidden('para_string', http_build_query($paras)) !!}
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i>删除
                                            </button>
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection