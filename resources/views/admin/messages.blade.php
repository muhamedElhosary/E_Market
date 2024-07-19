@extends('admin.layoutdash')
@section('title','Messages')
@section('dash')
<div class="card-content">
    <table>
      <thead>
      <tr>
        <th></th>
        <th>name</th>
        <th>email</th>
        <th>phone</th>
        <th>message</th>
        <th>created_at</th>
        <th></th>
      </tr>
      </thead>
      <tbody>
        @foreach ($msgs as $msg)
      <tr>
        <td class="image-cell">
          <div class="image">
            <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
          </div>
        </td>
        <td data-label="name">{{$msg->name}}</td>
        <td data-label="email">{{$msg->email}}</td>
        <td data-label="phone">{{$msg->phone}}</td>
        <td data-label="message">{{$msg->message}}</td>
        <td data-label="Created">
          <small class="text-gray-500" title="Oct 25, 2021">{{$msg->created_at}}</small>
        </td>
        <td>
          <form action="{{ route('messages.destroy', $msg->id) }}" method="POST">
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