@extends('frontend.layouts.layout')
@section('content')


<section id="user-profile">
  <div class="row">
    <div class="col-12">
      <div class="card profile-with-cover">
      	@foreach($index as $q)
        <div class="card-img-top img-fluid bg-cover height-300" style="background: url('{{asset('/')}}{{$q->image}}') 50%;"></div>
        <div class="media profil-cover-details row">
          <div class="col-5">
            <div class="align-self-start halfway-fab pl-3 pt-2">
              <div class="text-left">
                <h3 class="card-title white">{{ $q->name }}</h3>
              </div>
            </div>
          </div>
          <div class="col-2">
            <div class="align-self-center halfway-fab text-center">
              <a class="profile-image">
                <img src="app-assets/img/portrait/avatars/avatar-08.png" class="rounded-circle img-border gradient-summer width-100" alt="Card image">
              </a>
            </div>
          </div>
          <div class="col-5">
          </div>
        </div>
        <div class="profile-section">
          <div class="row">
            <div class="col-lg-5 col-md-5 ">
              <ul class="profile-menu no-list-style">
                <li>
                  <a href="#about" class="primary font-medium-2 font-weight-600"></a>
                </li>
                <li>
                  <a href="#user" class="primary font-medium-2 font-weight-600"></a>
                </li>
              </ul>
            </div>
            <div class="col-lg-2 col-md-2 text-center">
              <span class="font-medium-2 text-uppercase">{{ $q->name }}</span>
            </div>
            <div class="col-lg-5 col-md-5">
              <ul class="profile-menu no-list-style">
                <li>
                  <a href="#friends" class="primary font-medium-2 font-weight-600"></a>
                </li>
                <li>
                  <a href="#photos" class="primary font-medium-2 font-weight-600"></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
</section>


<section id="about">
  <div class="row">
    <div class="col-12">
      <div class="content-header">Information</div>
    </div>
  </div>
  <div class="row">
  	@foreach($index as $q)
    <div class="col-sm-12">
      <div class="card">
        <div class="card-content">
          <div class="card-body">
            <div class="mb-3">
              <span class="text-bold-500 primary">Description:</span>
              <span class="d-block overflow-hidden">{{ $q->description}}
              </span>
            </div>
            <hr>
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-map-pin font-small-3"></i> Location:</a></span>
                    <span class="d-block overflow-hidden">New Jersey, USA</span>
                  </li>
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-monitor font-small-3"></i> Website:</a></span>
                    <a class="d-block overflow-hidden">pixinvent.com</a>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
                <ul class="no-list-style">
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-smartphone font-small-3"></i> Phone Number:</a></span>
                    <span class="d-block overflow-hidden">(012) 345 - 678 - 9910</span>
                  </li>
                  <li class="mb-2">
                    <span class="text-bold-500 primary"><a><i class="ft-mail font-small-3"></i> Email:</a></span>
                    <a class="d-block overflow-hidden">jose@yourmail.com</a>
                  </li>
                  
                </ul>
              </div>
            </div>
            <hr>
            <div class="mt-3">
              <span class="text-bold-500 primary">Places:</span>
            </div>
            <div class="mt-2 overflow-hidden">
              <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-speedometer danger font-large-2"></i>
                <div class="mt-2">Gas Station</div>
              </span>
              <span class="mr-3 mt-2 text-center float-left width-100"> <i class="ft-pie-chart danger font-large-2"></i>
                <div class="mt-2">Food Court</div>
              </span>
              <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-basket-loaded danger font-large-2"></i>
                <div class="mt-2">Supermarket</div>
              </span>
              <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-game-controller danger font-large-2"></i>
                <div class="mt-2">Gaming Station</div>
              </span>
              <span class="mr-3 mt-2 text-center float-left width-100"> <i class="icon-music-tone-alt danger font-large-2"></i>
                <div class="mt-2">Entertaiment</div>
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>



<!-- Overlap Image Cards start -->
<section id="overlap-image-examples">
  <div class="row">
    <div class="col-12 mt-3 mb-3">
    </div>
  </div>
  <div class="row match-height">
  	@foreach($row as $a)
    <div class="col-lg-4 col-md-4 col-sm-12">
      <div class="card card-inverse bg-grey text-center">
        <div class="card-content">
          <div class="card-img overlap">
            <img src="{{asset('/')}}{{ $a->image }}" alt="element 06" width="190" class="mb-1">
          </div>
          <div class="card-body">
            <p class="card-text">{{ $a->name }}</p>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
</section>
<!-- // Overlap Image Cards end -->


@endsection