@extends('admin.layoutdash')
@section('title','add Category')
@section('dash')
<section class="is-title-bar">
  <div class="flex flex-col md:flex-row items-center justify-between space-y-6 md:space-y-0">
    <ul>
      <li>Admin</li>
      <li>Add category</li>
    </ul>
  </div>
</section>
<section class="section main-section">
  <div class="card mb-6">
    <header class="card-header">
      <p class="card-header-title">
        <span class="icon"><i class="mdi mdi-ballot"></i></span>
        category
      </p>
    </header>
    <div class="card-content">
      <form action="{{route('category.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="field">
          <div class="field-body">
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="text" placeholder="Name" name="name">
                <span class="icon left"></span>
              </div>
            </div>
            <div class="field">
              <div class="control icons-left">
                <input class="input" type="text" placeholder="description" name="description">
                <span class="icon left"></span>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="card">
          <div class="card-content">
            <div class="field">
              <label class="label">category image</label>
              <div class="field-body">
                <div class="field file">
                  <label class="upload control">
                    <a class="button blue">
                      Upload
                    </a>
                    <input type="file" name="image">
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        <hr>
        <div class="field grouped">
          <div class="control">
            <button type="submit" class="button green">
              Submit
            </button>
          </div>
          <div class="control">
            <button type="reset" class="button red">
              Reset
            </button>
          </div>
        </div>
      </form>
    </div>
  </div>
</section>
@endsection
