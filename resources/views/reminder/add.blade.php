@extends('layouts')
@section('content')
<div class="row">
	<div class="col-md-4">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">
					添加提醒事项
				</h3>
			</div>
			@if (count($errors) > 0)
				<div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <ul>
              @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
              @endforeach
            </ul>
        </div>
			@endif
			<form class="form-horizontal" action="{{route('reminder-insert')}}" method="POST">
			  <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputContent" class="col-sm-2 control-label">提醒内容</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="提醒内容" name="content" value="{{ old('content')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3" class="col-sm-2 control-label">提醒时间</label>
                  <div class="col-sm-10">
                    <div class="input-group">
		                  <div class="input-group-addon">
		                    <i class="fa fa-clock-o"></i>
		                  </div>
		                  <input type="text" class="form-control pull-right" name="enddate" value="{{ old('enddate')}}">
		                </div>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputContent" class="col-sm-2 control-label">重复</label>
                  <div class="col-sm-10">
                    <select class="form-control" name="looplevel">
	                    <option value="0">永不</option>
	                    <option value="1">每天</option>
	                    <option value="2">每周</option>
	                    <option value="3">每月</option>
	                    <option value="4">每年</option>
	                  </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputContent" class="col-sm-2 control-label">接收人</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="接收人" name="personsend" value="{{ old('personsend')}}">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputContent" class="col-sm-2 control-label">接收邮件</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="接收邮件" name="personemail" value="{{ old('personemail')}}">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-info pull-right">提交</button>
              </div>
            </form>
		</div>
	</div>
</div>
@endsection