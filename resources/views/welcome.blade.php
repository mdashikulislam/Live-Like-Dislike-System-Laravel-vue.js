@include('layouts.head')
    <body>
        <div class="flex-center position-ref ">
           <div class="row">
               <div class="col-md-12">
                   @if (Route::has('login'))
                       <div class="top-right links float-right">
                           @auth
                               <a href="{{ url('/home') }}">Home</a>
                           @else
                               <a href="{{ route('login') }}">Login</a>

                               @if (Route::has('register'))
                                   <a href="{{ route('register') }}">Register</a>
                               @endif
                           @endauth
                       </div>
                   @endif
               </div>
           </div>

            <div class="content">
                <div class="row post">
                    <div class="col-md-8 offset-2" id="app">
                        <post
                            v-for="value in blog"
                            :title="value.title"
                            :subtitle="value.subtitle"
                            :body="value.body"
                            :posted_by="value.posted_by"
                            :created_at="value.created_at"
                            :key="value.index"
                            :postid="value.id"
                            :likes="value.likes.length"
                            login="{{Auth::check()}}"
                        ></post>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('js/app.js')}}"></script>
    </body>

</html>
