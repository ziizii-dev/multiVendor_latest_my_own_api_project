<style type="text/css">

	body {

	}
	.card{
		background-color:hsl(0, 0%, 100%);
		padding: 15px;
		border: none;
	}
	.input-box{
		position: relative;
	}
	.input-box i{
		position: absolute;
		right: 13px;
		top: 15px;
		color: #b9bdc2;
	}
	.form-control{
		height: 50px;
		background-color: #e7e2e269;
	}
	.form-control:focus{
		background-color: #eeeeee69;
		box-shadow: none;
		border-color: #eee;
	}
	.list{
		padding-top: 20px;
		padding-bottom: 10px;
		display: flex;
		align-items: center;
	}
	.border-bottom{
		border-bottom: 2px solid #eee;
	}
	.list i {
		font-size: 19px;
		color: red;
	}
	.list small{
		color: #dedddd;
	}
</style>


@if($products -> isEmpty())
<h4 class="text-center text-danger">Product Not Found</h4>
@else
	<div class="container mt-5">
		<div class="row d-flex justify-content-center">
			<div class="col-md-12">
	<div class="card">
		@foreach($products as $item)
		<a href="{{ url('product/details/'.$item->id.'/'.$item->product_slug)}}">
			<div class="list border-bottom">
				<img src="{{ asset($item->product_thambnail) }}" style="width:40px; height:40px">
				<div class="d-flex flex-column ml-5">
 <span>{{ $item->product_name }}</span> <small>${{number_format($item->selling_price,0,'',',') }}</small>

				</div>

			</div>
		</a>
		@endforeach
	</div>

			</div>

		</div>

	</div>

@endif
