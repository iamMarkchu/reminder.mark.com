@extends('layouts')
@section('content')
<div class="row">
	<div class="col-md-6">
		<div class="box">
			<div class="box-header with-border">
				<h3 class="box-title">
					提醒事项
				</h3>
			</div>
			<div class="box-body">
				<div class="row">
					<div class="col-md-4">
						<select class="form-control">
                    		<option>serving</option>
                    		<option>all</option>                   
                  		</select>
					</div>
					<div class="col-md-2 pull-right">
						<a href="{{route('reminder-add')}}" class="btn btn-block btn-success">添加事项</a>
					</div>
				</div>
			</div>
			<div class="box-body">
				@if (session('status'))
				<div class="alert alert-success alert-dismissible">
	                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
	                <h4><i class="icon fa fa-check"></i> Alert!</h4>
	                {{ session('status') }}
	            </div>
				@endif
				<div class="row">
					<div class="col-md-12">
						@if(count($reminderList) > 0)
							<ul class="timeline" data-key="{{$colornum=0}}"> 
							    @foreach($reminderList as $key => $v)
							    	<li class="time-label">
								        <span class="{{config('site.color.'.$colornum++)}}">
								            {{date('F.d Y', strtotime($key))}}
								        </span>
								        @foreach($v as $reminder)
								        <div class="timeline-item">
								            <span class="time">
								            	状态：@if ($reminder->status == 'serving')
								            			<a href="javascript:void(0)" class="btn btn-success btn-flat btn-xs">
								            				{{$reminder->status}}
								            			</a>
								            		  @elseif ($reminder->status == 'expired')
								            		  	<a href="javascript:void(0)" class="btn btn-default btn-flat btn-xs">
								            				{{$reminder->status}}
								            			</a>
								            		  @else
														<a href="javascript:void(0)" class="btn btn-success btn-flat btn-xs">
								            				{{$reminder->status}}
								            			</a>
								            		  @endif
								            	重复：{{$reminder->loopLevel}}
								            	<i class="fa fa-clock-o"></i> {{date('H:i:s', strtotime($reminder->enddate))}}
								            </span>
								            <h3 class="timeline-header"><a href="#">{{$reminder->personsend}}&nbsp&nbsp</a>的提醒</h3>
								            <div class="timeline-body">
								                {{$reminder->content}}
								            </div>
								            <div class="timeline-footer">
                  								<a href="{{route('reminder-edit', ['id' => $reminder->id])}}" class="btn bg-purple btn-flat btn-xs">修改</a>
                  								<a href="{{route('reminder-delete', ['id' => $reminder->id])}}" class="btn btn-danger btn-flat btn-xs">删除</a>
                							</div>
								        </div>
								        @endforeach
								    </li>
							    @endforeach
							    <li>
              						<i class="fa fa-clock-o bg-gray"></i>
            					</li>
							</ul>
						@else
							暂无提醒事项
						@endif
					</div>
				</div>
			</div>
			<div class="box-footer">
				<a href="javascript:void(0)" class="btn btn-block btn-info">加载更多</a>
			</div>
		</div>
	</div>
</div>
@endsection