@extends('templates.outs.home')

@section('content')
    {{-- HEADER--}}
	<div class="hug hug-header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <a href="{{ route('home') }}" class="pull-left"><img src="{{ \App\Helpers\Helpers::logoUrl() }}" alt="PSI"></a>
                    <a href="{{ route('login') }}" class="btn btn-primary btn-line pull-right login">Login</a>
                    <a href="{{ route('register') }}" class="btn btn-primary btn-line pull-right register">Register</a>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
	</div>
    
    {{-- HEREO SECTION --}}
    <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Welcome to <span>PSI</span></h1>
      <h2>The Project Management System</h2>
      <div class="d-flex">
        <a href="{{ route('register') }}" class="btn-get-started scrollto">Sign Up Now</a>
      </div>
    </div>
  </section>


    {{-- FEATURES --}}
  <main id="main">

    <!-- ======= Featured Services Section ======= -->
    <section id="featured-services" class="featured-services">
      <div class="container" data-aos="fade-up">

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="ion-ios-people-outline"></i></div>
              <h4 class="title"><a href="">Members</a></h4>
              <p class="description">Manage projects including several members using PSI. Add information about each member 
                        such as name, surname , email , position , phone number.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="ion-ios-albums-outline"></i></div>
              <h4 class="title"><a href="">Projects</a></h4>
              <p class="description">PSI allows you to create projects, manage and store project information, 
                        as it allows easy management and tracking of several projects.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="ion-ios-list-outline"></i></div>
              <h4 class="title"><a href="">Tasks</a></h4>
              <p class="description">After creating a project , the project leader will assign tasks to members. 
                        The leader can also see the status of the task, updated by the member.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="ion-ios-chatboxes-outline"></i></div>
              <h4 class="title"><a href="">Announcements</a></h4>
              <p class="description">Announcements about different issues are post by project leaders only. Every team member is 
                able to comment on the announcement.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Featured Services Section -->



  </main><!-- End #main -->


    {{-- UI --}}
    
    


    {{-- footer --}}
    <div class="hug hug-footer">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3>Current Version <span class="color-primary">0.1</span> | <a class="color-primary" href="https://github.com/KevinHoxhalli/Group4" target="_blank">Go To Project</a></h3>
                    <hr class="special">
                    <p class="text-center last-line">Copyright {{ date("Y") }} &copy;  <a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ" target="_blank">PSI</a></p>
                </div>
            </div>
        </div>
    </div>
@stop