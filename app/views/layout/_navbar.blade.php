        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="/home">fraucCityWide.com</a>
                </li>
                @if(!Sentry::check())
                    <li><a href="/signin">Sign in </a></li>
                    <li><a href="/signup">Create an account</a></li>
                @else
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/dashboard/yardsale">My Yardsale</a></li>
                    <li><a href="/logout">Logout</a></li>
                @endif
                <li style="margin-top: 100px;"><a href="http://frauc.com">frauc.com</a></li>
                <li><a href="http://www.bbbsnn.org/site/c.aiINI5NMKeKYF/b.7529395/k.F024/Home_Page.htm">bbbs.com</a></li>
                <li><a href="#myModal" role="button" data-toggle="modal">Email Updates!</a></li>
                <li style="margin-bottom:50px;"><a href="#contactModal" role="button" data-toggle="modal">Contact us</a></li>
                
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
