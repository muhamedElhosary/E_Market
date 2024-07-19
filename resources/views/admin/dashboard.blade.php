
@extends('admin.layoutdash')
@section('title','dashboard')
@section('dash')
  <section class="section main-section">
    <div class="grid gap-6 grid-cols-1 md:grid-cols-3 mb-6">
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Clients
              </h3>
              <h1>
                {{count($clients)}}
              </h1>
            </div>
            <span class="icon widget-icon text-green-500"><i class="mdi mdi-account-multiple mdi-48px"></i></span>
          </div>
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <div class="flex items-center justify-between">
            <div class="widget-label">
              <h3>
                Sales
              </h3>
              <h1>
                ${{$sales}}
              </h1>
            </div>
            <span class="icon widget-icon text-blue-500"><i class="mdi mdi-cart-outline mdi-48px"></i></span>
          </div>
        </div>
      </div> 
    </div>

    <div class="card mb-6">
      <div class="card-content">
        <div class="chart-area">
          <div class="h-full">
            <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                <div></div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                <div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="notification blue">
      <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0">
        <div>
          <span class="icon"><i class="mdi mdi-buffer"></i></span>
          <b>Responsive table</b>
        </div>
        <button type="button" class="button small textual --jb-notification-dismiss">Dismiss</button>
      </div>
    </div>
    <div class="card has-table">
      <header class="card-header">
        <p class="card-header-title">
          <span class="icon"><i class="mdi mdi-account-multiple"></i></span>
          Clients
        </p>
        <a href="#" class="card-header-icon">
          <span class="icon"><i class="mdi mdi-reload"></i></span>
        </a>
      </header>
      <div class="card-content">
        <table>
          <thead>
          <tr>
            <th></th>
            <th>Name</th>
            <th>City</th>
            <th>Phone</th>
            <th>Created</th>
            <th></th>
          </tr>
          </thead>
          <tbody>
            @foreach ($clients as $one)
          <tr>
            <td class="image-cell">
              <div class="image">
                <img src="https://avatars.dicebear.com/v2/initials/rebecca-bauch.svg" class="rounded-full">
              </div>
            </td>
            <td data-label="Name">{{$one->name}}</td>
            <td data-label="City">{{$one->address}}</td>
            <td data-label="Phone">{{$one->phone}}</td>
            <td data-label="Created">
              <small class="text-gray-500" title="Oct 25, 2021">{{$one->created_at}}</small>
            </td>
          </tr>           
          @endforeach
          </tbody>
        </table>
      </div>
    </div>
    @endsection

   