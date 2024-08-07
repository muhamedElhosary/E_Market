@extends('admin.layoutdash')
@section('title','Products')
@section('dash')
<div class="card-content">
    <table>
      
      <thead>
      <tr>
        <th></th>
        <th>product_id</th>
        <th>name</th>
        <th>price</th>
        <th>category_name</th>
        <th>created_at</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
        @foreach ($prods as $prod)
      <tr>
        <td class="image-cell">
        </td>
        <td data-label="product_id">{{$prod->pid}}</td>
        <td data-label="name">{{$prod->name}}</td>
        <td data-label="price">{{$prod->price}}</td>
        <td data-label="category_id">{{$prod->category_name}}</td>
        <td data-label="Created">
          <small class="text-gray-500" title="Oct 25, 2021">{{$prod->created_at}}</small>
        </td>
        
        <td>
          <form action="{{ route('product.destroy', $prod->pid) }}" method="POST">
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