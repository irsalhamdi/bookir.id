@extends('admin.admin_master')

@section('admin')

	<div class="container-full">

        <div class="content-header">
			<div class="d-flex align-items-center">
				<div class="mr-auto">
					<h3 class="page-title">Order Details</h3>
					<div class="d-inline-block align-items-center">
						<nav>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#"><i class="mdi mdi-home-outline"></i></a></li>
								<li class="breadcrumb-item" aria-current="page">Order Details</li>
							</ol>
						</nav>
					</div>
				</div>
			</div>
		</div>

		<section class="content">
		    <div class="row">

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">

                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Shipping Details</strong> </h4>
                        </div>

                        <table class="table">
                            <tr>
                                <th> Shipping Name : </th>
                                <th> {{ $order->name }} </th>
                            </tr>

                            <tr>
                                <th> Shipping Phone : </th>
                                <th> {{ $order->phone }} </th>
                            </tr>

                            <tr>
                                <th> Shipping Email : </th>
                                <th> {{ $order->email }} </th>
                            </tr>

                            <tr>
                                <th> Province : </th>
                                <th> {{ $order->province->name }} </th>
                            </tr>

                            <tr>
                                <th> Regency : </th>
                                <th> {{ $order->regency->name }} </th>
                            </tr>

                            <tr>
                                <th> District : </th>
                                <th>{{ $order->district->name }} </th>
                            </tr>

                            <tr>
                                <th> Village : </th>
                                <th>{{ $order->village->name }} </th>
                            </tr>

                            <tr>
                                <th> Post Code : </th>
                                <th> {{ $order->post_code }} </th>
                            </tr>

                            <tr>
                                <th> Order Date : </th>
                                <th> {{ $order->order_date }} </th>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="col-md-6 col-12">
                    <div class="box box-bordered border-primary">

                        <div class="box-header with-border">
                            <h4 class="box-title"><strong>Order Details</strong><span class="text-danger"> Invoice : {{ $order->invoice_no }}</span></h4>
                        </div>

                        <table class="table">
                            <tr>
                                <th>  Name : </th>
                                <th> {{ $order->user->name }} </th>
                            </tr>

                            <tr>
                                <th>  Phone : </th>
                                <th> {{ $order->user->phone }} </th>
                            </tr>
                                
                            <tr>
                                <th> Payment Type : </th>
                                <th> {{ $order->payment_method }} </th>
                            </tr>

                            <tr>
                                <th> Tranx ID : </th>
                                <th> {{ $order->transaction_id }} </th>
                            </tr>

                            <tr>
                                <th> Invoice  : </th>
                                <th class="text-danger"> {{ $order->invoice_no }} </th>
                            </tr>

                            <tr>
                                <th> Order Total : </th>
                                <th>${{ $order->amount }} </th>
                            </tr>

                            <tr>
                                <th> Order </th>
                                <th> 
                                   <span class="badge badge-pill badge-warning" style="background: #418DB9;">{{ $order->status }} </span> 
                                </th>
                            </tr>

                            <tr>
                                <th> </th>
                                <th> 
               	                  	@if($order->status == 'Pending')
                                        <a href="{{ route('pending.to.confirm',$order->id) }}" class="btn btn-block btn-success" id="confirm">Confirm Order</a>

                                    @elseif($order->status == 'confirm')
                                        <a href="{{ route('confirm.to.processing',$order->id) }}" class="btn btn-block btn-success" id="processing">Processing Order</a>

                                    @elseif($order->status == 'processing')
                                        <a href="{{ route('processing.to.picked',$order->id) }}" class="btn btn-block btn-success" id="picked">Picked Order</a>

                                    @elseif($order->status == 'picked')
                                        <a href="{{ route('picked.to.shipped',$order->id) }}" class="btn btn-block btn-success" id="shipped">Shipped Order</a>

                                    @elseif($order->status == 'shipped')
                                        <a href="{{ route('shipped.to.delivered',$order->id) }}" class="btn btn-block btn-success" id="delivered">Delivered Order</a>

                                    @endif
                                </th>
                            </tr>
                        </table>

                    </div>
                </div>

                <div class="col-md-12 col-12">
                    <div class="box box-bordered border-primary">
                        <div class="box-header with-border">
                        </div>

                        <table class="table">
                            <tbody>

                                <tr>
                                    <td width="10%">
                                        <label for=""> Image</label>
                                    </td>

                                    <td width="20%">
                                        <label for=""> Product Name </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Product Code</label>
                                    </td>

                                    <td width="10%">
                                    <label for=""> Color </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Size </label>
                                    </td>

                                    <td width="10%">  
                                        <label for=""> Quantity </label>
                                    </td>

                                    <td width="10%">
                                        <label for=""> Price </label>
                                    </td>
                                </tr>

                                @foreach($orderItem as $item)
                                    <tr>
                                        <td width="10%">
                                            <label for=""><img src="{{ asset($item->product->thumbnail) }}" height="50px;" width="50px;"> </label>
                                        </td>

                                        <td width="20%">
                                            <label for=""> {{ $item->product->name }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->product->code }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->color }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->size }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> {{ $item->qty }}</label>
                                        </td>

                                        <td width="10%">
                                            <label for=""> ${{ $item->price }}  ( $ {{ $item->price * $item->qty}} ) </label>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>

                    </div>
                </div

            </div>
		</section>

	</div>

@endsection 