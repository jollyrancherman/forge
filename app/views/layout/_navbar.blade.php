        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="/home">Home</a>
                </li>
                @if(!Sentry::check())
                    <li><a href="/signin">Sign in </a></li>
                    <li><a href="/signup">Create an account</a></li>
                    <li><a href="#myModal" role="button" data-toggle="modal">Email Updates!</a></li>
                @else
                    <li><a href="/dashboard">Dashboard</a></li>
                    @if(!Session::get('yardsale.created'))
                        <li ><a href="/dashboard/yardsale">
                            Create my yard sale<i class="fa fa-exclamation-triangle" style="color: red;"></i>
                        </a></li>
                    @else
                        <li><a href="/dashboard/yardsale">Edit my yard sale</a></li>
                        <li><a href="/yardsale/{{Session::get('yardsale.id')}}">View my yard sale</a></li>
                    @endif

                    <li ><a href="/payment">
                        Make Donation<i class="fa fa-smile-o"></i>
                    </a></li>

                    <li><a href="/logout">Logout</a></li>
                @endif

                <hr />
                <!-- <li><a href="#">Maps Coming Soon!</a></li> -->
                <li><a href="/yardsale/find/douglas">Gardnerville/Minden</a></li>
                <!-- <li><a href="/yardsale/find/carson">Carson</a></li> -->
                <!-- <li><a href="/yardsale/find/reno">Reno</a></li> -->
                <li><a href="/yardsale/find/sparks">Sparks</a></li>
                <hr />

                <li><a href="/tos">Terms and Conditions</a></li>
                <li><a href="http://frauc.com">frauc.com</a></li>
                <li><a href="http://www.bbbsnn.org/site/c.aiINI5NMKeKYF/b.7529395/k.F024/Home_Page.htm">BigBrothersBigSisters</a></li>
                <li style="margin-bottom:20px;"><a href="#contactModal" role="button" data-toggle="modal">Contact Us</a></li>
                
                <a href="https://www.facebook.com/fraucfreeauction" style="margin:0 20px 0 10px;">
                    {{ HTML::image("/img/icons/fb.png", "facebook",['height' => '40']) }}
                </a>
                <a href="https://twitter.com/FraucCom" style="margin-right:20px;">
                    {{ HTML::image("/img/icons/twitter.png", "twitter",['height' => '40']) }}
                </a>
                <a href="https://www.youtube.com/channel/UCnk4b5TVAMkH-jPgbp9yWHg" style="margin-right:20px;">
                    {{ HTML::image("/img/icons/youtube.png", "youtube",['height' => '40']) }}
                </a>

            </ul>
        </div>
