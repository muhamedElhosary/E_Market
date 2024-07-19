@extends('admin.layoutdash')
@section('title','Orders')
@section('dash')
<div class="card-content">
    <table>
      <thead>
      <tr>
        <th></th>
        <th>name</th>
        <th>address</th>
        <th>phone</th>
        <th>message</th>
        <th>productid</th>
        <th>created_at</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
        @foreach ($orders as $order)
      <tr>
        <td class="image-cell">
          <div class="image">
            <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
          </div>
        </td>
        <td data-label="name">{{$order->name}}</td>
        <td data-label="email">{{$order->address}}</td>
        <td data-label="phone">{{$order->phone}}</td>
        <td data-label="message">{{$order->message}}</td>
        <td data-label="productid">{{$order->product_ids}}</td>
        <td data-label="Created">
          <small class="text-gray-500" title="Oct 25, 2021">{{$order->created_at}}</small>
        </td>
        <td>
          <form action="{{ route('orders.destroy', $order->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="button small red --jb-modal" onsubmit="return confirm('Are you sure you want to delete this product?');">
                  <span class="icon"><i class="mdi mdi-trash-can"></i></span>
                </button>
            </form>
      </td>
      </tr>        
      @endforeach
      </tbody>
    </table>
  </div>
</div>
</section>

@endsection