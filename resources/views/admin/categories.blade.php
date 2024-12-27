@extends('admin.layoutdash')
@section('title','Categories')
@section('dash')
<div class="card-content">
    <table>
      <thead>
      <tr>
        <th></th>
        <th>category_id</th>
        <th>name</th>
        <th>description</th>
        <th>created_at</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
        @foreach ($cates as $cat)
      <tr>
        <td class="image-cell">
         
        </td>
        <td data-label="category_id">{{$cat->catid}}</td>
        <td data-label="name">{{$cat->name}}</td>
        <td data-label="description">{{$cat->description}}</td>
        <td data-label="Created">
          <small class="text-gray-500" title="Oct 25, 2021">{{$cat->created_at}}</small>
        </td>
        <td>
          <form action="{{ route('categories.destroy', $cat->catid) }}" method="POST">
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