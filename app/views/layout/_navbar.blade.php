        <div id="sidebar-wrapper">
            <ul class="sidebar-nav">
                <li class="sidebar-brand"><a href="/home">fraucCityWide.com</a>
                </li>
                @if(!Sentry::check())
                    <li><a href="/signin">Sign in </a></li>
                    <li><a href="/signup">Create an account</a></li>
                @else
                    <li><a href="/home">Dashboard</a></li>
                    <li><a href="/signup">My Yardsale</a></li>
                    <li><a href="/logout">Logout</a></li>
                @endif
                <li style="margin-top: 100px;"><a href="http://frauc.com">frauc.com</a></li>
                <li><a href="http://www.bbbsnn.org/site/c.aiINI5NMKeKYF/b.7529395/k.F024/Home_Page.htm">bbbs.com</a></li>
                <li><a href="#contactModal" role="button" data-toggle="modal">Email Updates!</a></li>
                <li><a href="#contactModal" role="button" data-toggle="modal">Contact us</a></li>

            </ul>
        </div>
