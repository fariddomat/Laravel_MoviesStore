
<footer class="footer-distributed">

    <div class="footer-left">

        <h3>{{setting('site_name') ? setting('site_name') : 'Movie'}}<span>Flix</span></h3>

    <!--
        <p class="footer-links">
            <a href="#">Home</a>
            ·
            <a href="#">Blog</a>
            ·
            <a href="#">Pricing</a>
            ·
            <a href="#">About</a>
            ·
            <a href="#">Faq</a>
            ·
            <a href="#">Contact</a>
        </p>
    -->
        <br>
        <p class="footer-company-name">Developed By {{setting('developer_name') ? setting('developer_name') : 'Developer Name'}} © 2020<br><br>
        Developed for Test reason only.
        </p>
    </div>

    <div class="footer-center">

        <div>
            <i class="fa fa-map-marker"></i>
            <p><span>{{setting('site_st') ? setting('site_st') : 'Street'}}</span> {{setting('site_location') ? setting('site_location') : 'Location'}}</p>
        </div>

        <div>
            <i class="fa fa-phone"></i>
            <p>{{setting('site_phone') ? setting('site_phone') : '+963 000000000'}}</p>
        </div>

        <div>
            <i class="fa fa-envelope"></i>
            <p><a href="mailto:{{setting('site_email')}}">{{setting('site_email') ? setting('site_email') : 'admin@test.com'}}</a></p>
        </div>

    </div>

    <div class="footer-right">

        <p class="footer-company-about">
            <span>About</span>
            {{setting('site_about') ? setting('site_about') : 'SVUFlixify service,
            This service developed by '}}
            <object style="color: #5383d3;">PHP Laravel.</object> <br>

        </p>

        <div class="footer-icons">

            <a href="{{setting('facebook_link')}}"><i class="fa fa-facebook"></i></a>
            <a href="{{setting('twitter_link')}}"><i class="fa fa-twitter"></i></a>
            <a href="{{setting('linkedin_link')}}"><i class="fa fa-linkedin"></i></a>
            <a href="{{setting('github_link')}}"><i class="fa fa-github"></i></a>

        </div>

    </div>

</footer>
