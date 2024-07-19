@extends('admin.layoutdash')
@section('title','profile')
@section('dash')
<section class="section main-section">
    <div class="grid grid-cols-1 gap-6 lg:grid-cols-2 mb-6">
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account-circle"></i></span>
            Edit Profile
          </p>
        </header>
        <div class="card-content">
          <form action="{{route('profile.edit')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="field">
              <label class="label">Avatar</label>
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
            <hr>
            <div class="field">
              <label class="label">Name</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="text" autocomplete="on" name="name" class="input" required="">
                  </div>
                  <p class="help">Required. Your name</p>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">username</label>
              <div class="field-body">
                <div class="field">
                  <div class="control">
                    <input type="email" autocomplete="on" name="username" class="input" required="">
                  </div>
                  <p class="help">Required. Your username</p>
                </div>
              </div>
            </div>
            <div class="field">
              <label class="label">New password</label>
              <div class="control">
                <input type="password" autocomplete="new-password" name="password" class="input" required="">
              </div>
              <p class="help">Required. New password</p>
            </div>
            <hr>
            <div class="field">
              <div class="control">
                <button type="submit" class="button green">
                  Submit
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="card">
        <header class="card-header">
          <p class="card-header-title">
            <span class="icon"><i class="mdi mdi-account"></i></span>
            Profile
          </p>
        </header>
        <div class="card-content">
          <div class="image w-48 h-48 mx-auto">
            <img style=max-height:200px!important;min-height:180px!important 
            src="{{url($admin->image)}}" alt="{{$admin->name}}" class="rounded-full">
          </div>
          <hr>
          <div class="field">
            <label class="label">Name</label>
            <div class="control">
              <input type="text" readonly="" value="{{$admin->name}}" class="input is-static">
            </div>
          </div>
          <hr>
          <div class="field">
            <label class="label">user_name</label>
            <div class="control">
              <input type="text" readonly="" value="{{$admin->username}}" class="input is-static">
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection