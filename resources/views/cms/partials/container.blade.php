<div class="main-container">
  <section class="main-container__navigation-container">
     <div class="main-container__navigation-container__toggle">
           <i class="fa fa-bars" id="nav-toggle"></i>
       </div>
       <div class="main-container__navigation-container__welcome">
           <div class="circle main-container__navigation-container__welcome__icon">
              <!--  Put image here -->
              {!! HTML::image('public/images/profile/' . \Auth()->user()->profile_pic, \Auth()->user()->username) !!}
           </div>
           <div class='main-container__navigation-container__welcome__name'>
               <h4>Welcome</h4>
               <span>{{ \Auth()->user()->username }}!</span>
               <div class="main-container__navigation-container__welcome__name__status">
                   <small>Status</small>
                   <i class="fa fa-circle-o"></i>
                   <span class='status'>Online</span>
               </div>
           </div>
       </div>

        @include('cms.partials.menu');

  </section>
  <main class="container-fluid main-container__content">
      <h2>Title</h2>
      <section class="main-container__content__breadcrumbs">
          <ol class="breadcrumb">
            <li><a href="#">Home</a></li>           
          </ol> 
      @yield('content')
      </section>
      
      @if(isset($data['message']))
      <!-- Flash Update Your Password Message -->
          <div class="alert alert-danger" role="alert">{{ $data['message'] }}</div>
      <!-- Flash Update Your Password Message -->
      @endif
      
  </main>
</div> 