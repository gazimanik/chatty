<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navber-header">
        <a href="{{ route('index') }}" class="navbar-brand"><img src="{{ asset('img/wWhefBox.png') }}" alt="logo" class="logo"></a>
        </div>
        <div class="collapse navbar-collapse">
            @if (Auth::Check())
                <ul class="nav navbar-nav">
                    
                </ul>
            <form action="{{ route('search.result') }}" class="navbar-form navbar-left search-bar" role="search">
                    <div class="form-group">
                        <input type="text" name="query" class="form-control" id="" placeholder="Search">
                    </div>
                    <button type="submit" class="btn btn-search"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="17px" height="17px" viewBox="0 0 30.239 30.239" style="enable-background:new 0 0 30.239 30.239;" xml:space="preserve">
                        <g><path d="M20.194,3.46c-4.613-4.613-12.121-4.613-16.734,0c-4.612,4.614-4.612,12.121,0,16.735   c4.108,4.107,10.506,4.547,15.116,1.34c0.097,0.459,0.319,0.897,0.676,1.254l6.718,6.718c0.979,0.977,2.561,0.977,3.535,0   c0.978-0.978,0.978-2.56,0-3.535l-6.718-6.72c-0.355-0.354-0.794-0.577-1.253-0.674C24.743,13.967,24.303,7.57,20.194,3.46z    M18.073,18.074c-3.444,3.444-9.049,3.444-12.492,0c-3.442-3.444-3.442-9.048,0-12.492c3.443-3.443,9.048-3.443,12.492,0   C21.517,9.026,21.517,14.63,18.073,18.074z" fill="#000000"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                        </button>
                </form>
            @endif
           
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::Check())
                <li><a href="{{ route('profile.index', ['username' =>Auth::user()->username]) }}"><img src="{{ Auth::user()->getAvatarUrl() }}" alt="{{ Auth::user()->getFnameOrUsername() }}" class="nav-profile"> {{ Auth::user()->getFnameOrUsername() }}</a></li>
            <li><a href="{{ route('index') }}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;" xml:space="preserve" width="20px" height="20px" class="svg-hover-effect"><g><g><path d="M428.522,0H83.478C37.446,0,0,37.446,0,83.478v345.043C0,474.554,37.446,512,83.478,512h345.043    C474.554,512,512,474.554,512,428.522V83.478C512,37.446,474.554,0,428.522,0z M122.435,439.652    c-27.619,0-50.087-22.468-50.087-50.087c0-27.619,22.468-50.087,50.087-50.087c27.619,0,50.087,22.468,50.087,50.087    C172.522,417.184,150.054,439.652,122.435,439.652z M256,422.957c-18.413,0-33.391-14.978-33.391-33.391    c0-55.234-44.935-100.174-100.174-100.174c-18.413,0-33.391-14.978-33.391-33.391s14.978-33.391,33.391-33.391    c92.065,0,166.956,74.897,166.956,166.956C289.391,407.978,274.413,422.957,256,422.957z M389.565,422.957    c-18.413,0-33.391-14.978-33.391-33.391c0-128.886-104.859-233.739-233.739-233.739c-18.413,0-33.391-14.978-33.391-33.391    c0-18.413,14.978-33.391,33.391-33.391c165.707,0,300.522,134.815,300.522,300.522    C422.957,407.978,407.978,422.957,389.565,422.957z" /></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a></li>
                    <li><a href="{{ route('friend.index') }}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 25.96 25.96" style="enable-background:new 0 0 25.96 25.96;" xml:space="preserve" width="20px" height="20px" class="svg-hover-effect"><g><g><path d="M11.896,17.15c-0.131-0.043-0.953-0.887-0.439-2.474H11.45c1.34-1.401,2.487-3.655,2.487-5.876    c0-3.412-2.359-5.201-4.957-5.201c-2.6,0-4.855,1.789-4.855,5.201c0,2.229,1.051,4.492,2.398,5.892    c0.525,1.398-0.414,2.384-0.611,2.458C3.192,18.148,0,19.97,0,21.767c0,0.485,0,0.191,0,0.674c0,2.449,4.677,3.006,9.006,3.006    c4.334,0,8.953-0.557,8.953-3.006c0-0.482,0-0.188,0-0.674C17.959,19.915,14.751,18.109,11.896,17.15z" /></g><g><path d="M20.259,12.651c-0.122-0.041-0.896-0.23-0.413-1.723H19.84c1.26-1.316,2.129-3.438,2.129-5.523    c0-3.209-2.01-4.891-4.452-4.891c-1.798,0-3.347,0.918-4.042,2.678c1.459,1.205,2.463,3.081,2.463,5.607    c0,2.697-1.264,5.158-2.586,6.746c2.106,0.797,5.397,2.4,6.339,4.85c3.318-0.184,6.269-0.873,6.269-2.771c0-0.453,0-0.177,0-0.633    C25.959,15.251,22.943,13.552,20.259,12.651z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    </a></li>
            <li><a href="{{ route('profile.edit') }}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 32 32" style="enable-background:new 0 0 32 32;" xml:space="preserve" width="20px" height="20px" class="svg-hover-effect"><g><path d="M32,22c-0.002-4.973-4.029-9-9-9c-0.025,0-0.049,0.003-0.074,0.004C23.607,11.826,24,10.459,24,9   c0-4.418-3.582-8-8-8S8,4.582,8,9c0,4.26,3.332,7.732,7.531,7.977C15.112,17.6,14.778,18.281,14.523,19H4c-4,0-4,4-4,4v8h32v-8   C32,23,32,22.207,32,22z M29.883,22c-0.009,3.799-3.084,6.874-6.883,6.883c-3.801-0.009-6.876-3.084-6.885-6.883   c0.009-3.801,3.084-6.876,6.885-6.884C26.799,15.124,29.874,18.199,29.883,22z"/><path d="M22,26h-3v-3L22,26z M28,20l-5,5l-3-3.001l5-5L28,20z"/></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
            </a></li>
                    <li><a href="{{route('auth.logout')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" width="20px" height="20px" class="svg-hover-effect" viewBox="0 0 44.816 44.816" style="enable-background:new 0 0 44.816 44.816;" xml:space="preserve"><g><g><path d="M22.404,21.173c2.126,0,3.895-1.724,3.895-3.85V3.849C26.299,1.724,24.53,0,22.404,0c-2.126,0-3.895,1.724-3.895,3.849    v13.475C18.51,19.449,20.278,21.173,22.404,21.173z"/><path d="M30.727,3.33c-0.481-0.2-1.03-0.147-1.466,0.142c-0.434,0.289-0.695,0.776-0.695,1.298v5.113    c0,0.56,0.301,1.076,0.784,1.354c4.192,2.407,6.918,6.884,6.918,11.999c0,7.654-6.217,13.882-13.87,13.882    c-7.654,0-13.86-6.228-13.86-13.882c0-5.113,2.813-9.589,6.931-11.997c0.478-0.279,0.773-0.794,0.773-1.348V4.769    c0-0.521-0.261-1.009-0.695-1.298c-0.435-0.29-0.984-0.342-1.466-0.142C6.257,6.593,0.845,14.276,0.845,23.236    c0,11.92,9.653,21.58,21.572,21.58c11.917,0,21.555-9.66,21.555-21.58C43.971,14.276,38.554,6.593,30.727,3.33z"/></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    </a></li>
                   @else
                    <li><a href="{{route('auth.signup')}}"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 356.495 356.495" style="enable-background:new 0 0 356.495 356.495;" xml:space="preserve" width="20px" height="20px" class="svg-hover-effect" ><g><g id="Layer_5_38_"><g><path d="M214.386,117.285H196.68c0,0-3.229,0.175-3.229-2.319c0-4.654,0-18.615,0-18.615c0-8.396-6.807-15.204-15.204-15.204     s-15.204,6.808-15.204,15.204c0,0,0,13.07,0,17.427c0,3.682-3.78,3.507-3.78,3.507h-17.154c-8.397,0-15.204,6.807-15.204,15.203     s6.807,15.204,15.204,15.204h17.629c0,0,3.305-0.301,3.305,3.264c0,4.417,0,17.671,0,17.671c0,8.396,6.807,15.204,15.204,15.204     s15.204-6.807,15.204-15.204c0,0,0-13.432,0-17.91c0-2.969,3.822-3.025,3.822-3.025h17.112c8.397,0,15.204-6.808,15.204-15.204     S222.783,117.285,214.386,117.285z"/><path d="M335.006,16.583H21.49C9.64,16.583,0,26.224,0,38.073v225.868c0,11.85,9.641,21.49,21.49,21.49h112.476     c0,0,5.129-0.387,5.129,4.613c0,5.163,0,13.25,0,17.667c0,2.75-3.015,2.986-3.015,2.986H97.796     c-8.068,0-14.608,6.541-14.608,14.608s6.54,14.608,14.608,14.608h160.905c8.067,0,14.608-6.541,14.608-14.608     s-6.541-14.608-14.608-14.608h-37.246c0,0-4.054-0.111-4.054-2.986c0-4.417,0-12.503,0-17.667c0-4.833,4.161-4.613,4.161-4.613     h113.443c11.85,0,21.49-9.64,21.49-21.49V38.073C356.496,26.224,346.855,16.583,335.006,16.583z M178.248,265.946     c-7.583,0-13.732-6.148-13.732-13.732c0-7.584,6.148-13.732,13.732-13.732c7.584,0,13.732,6.147,13.732,13.732     C191.98,259.798,185.832,265.946,178.248,265.946z M331.496,216.96c0,7.75-8.041,7.538-8.041,7.538H31.704     c0,0-6.704,0.962-6.704-7.038c0-41.438,0-122.553,0-165.75c0-10.5,9.455-10.127,9.455-10.127h288.999     c0,0,8.042-0.123,8.042,9.627C331.496,88.25,331.496,188.628,331.496,216.96z"/></g></g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>

                    </a></li>
                    <li><a href="{{route('auth.login')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Layer_1" x="0px" y="0px" viewBox="0 0 489.4 489.4" style="enable-background:new 0 0 489.4 489.4;" xml:space="preserve" width="20px" height="20px" class="svg-hover-effect">
                            <g>
                              <g>
                                <path d="M407,0H82.4C37,0,0,37,0,82.6v162.1c0,9.9,8.1,18,18,18h276.7L255,302.4c-7,7-7,18.4,0,25.5c3.5,3.5,8.1,5.3,12.7,5.3    c4.6,0,9.2-1.8,12.7-5.3l70.4-70.4c7-7,7-18.4,0-25.5l-70.4-70.4c-7-7-18.4-7-25.5,0c-7,7-7,18.4,0,25.5l39.8,39.6H36V82.6    C36,56.9,56.8,36,82.4,36H407c25.6,0,46.4,20.9,46.4,46.6v324.2c0,25.7-20.8,46.6-46.4,46.6H82.4c-25.6,0-46.4-20.9-46.4-46.6v-42    c0-9.9-8.1-18-18-18c-9.9,0-18,8.1-18,18v42c0,45.5,37,82.6,82.4,82.6H407c45.4,0,82.4-37,82.4-82.6V82.6    C489.4,37.1,452.4,0,407,0z"/>
                              </g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g><g></g></svg>
                    </a></li>
                @endif
            </ul>
        </div>
    </div>
</nav>