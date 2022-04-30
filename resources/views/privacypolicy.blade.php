<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{env('APP_NAME')}}</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: rgb(255, 255, 255);
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }
            .logo{
                font-size: 80px;
            }

            .title {
                font-size: 60px;
            }

            .subtitle {
                font-size: 25px;
            }

            .links{
                margin-top: 5px;
            }
            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 1px;
            }

            .copyright{
                margin-top: 5px;
            }

            .textarea {
                width: 1200px;
                margin-right: auto;
                margin-top: 20px;
                background-color: white;
                box-shadow: #3d4c50 1px 0px;
                border-style: groove;
                
                padding: 15px 15px 15px 15px;
                overflow-y: scroll;
                max-height: 350px;
                text-align: justify;
                text-justify: inter-word;
            }

        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
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

            <div class="content">
                <div class="logo m-b-md"> 
                    <img src="{{config('cms.logo')}}" width="150px" >
                </div>

               
                <div class='textarea'>
<h2>Privacy and Cookie Policy</h2>
<p>This Policy is to show that social media connect (we) respect every individual’s privacy and why we collect and use visitors’/customers’/clients’ (your) personal information (as provided by you), when you visit or login to our website. Your acceptance to our privacy policy is considered upon your first use of our site. You must read and agree to it to use it further. 
Information About Us</p>
<ul>
    <li>Our Site, SocialMediaConnect, is owned and operated by 360 Digital Idea Agency, headquartered at Sewak Park, Dwarka Mod, New Delhi, India.</li>
    <li>You can contact to our data protection team at privacy@socialmediaconnect.in</li>
</ul>

<strong>What happens with your collected data ?</strong>
<p>
When you visit our website, socialmediaconnect.in, stores your information to provide you a better experience on our site by using the information provided by you. 
</p>
<strong> data do we collect from you ?</strong>
<p>
On the basis of how much you use and visit our website, we collect the data from you, where some are automatically collected data by our log files or cookies, which might include user’s web browser version, IP address, time zone, searched things, your viewed items and how have you interacted with the site.
</p>
<strong> do we use your data ?</strong>
<p>
We use your data to provide you better services and better browser experience on our website. We store it in our records and do not remove it until we are asked from users’ end. 
</p>
<strong>GDPR (General Data Protection Regulation)</strong>
<p>If you are a resident of India,</p>
<p> 
If you are an Indian resident, you have the right to fit and access the information we have collected about you, to port it to a new service or to ask to correct, remove or update them. And, to activate and exercise these rights, you can contact us on the contact information provided below. 
</p>
<strong>Updates</strong>
<p>
Any change made to our website or it’s privacy policy, we will be updating it from time to time to bring it to your notice and be up to date with legal, operational and regulatory things. 
</p>
<strong>Contact</strong>
<p>
For any business related or privacy policy related query or for any further information about our business, contact us here.
Send email- privacy@socialmediaconnect.in
</p>
                </div>
                
                

                <div class="links">
                    <a href="https://docs.google.com/document/d/1CHC_tIl8CnDNyKUIYywnkhNy61TREVmnVev84SJUQY4/edit?usp=sharing">Docs</a>
                    <a href="https://docs.google.com/spreadsheets/d/1BlbzNJG6tRVjXFftcosIXMmEbfHYgx-UFG14EAzifFg/edit?usp=sharing" target="_blank">Timeline</a>
                    <a href="#">News</a>
                    <a href="#">Blog</a>
                    <a href="#">GitHub</a>
                    <a href="./privacypolicy">Privacy Policy</a>
                    <a href="./tandc">Terms and Conditions</a>
                    <a href="#">About us</a>
                </div>

                <div class="copyright">
                    <small>
                        <i>{{config('cms.copyright')}}</i> &copy; 2021 
                    </small>    
                </div>

            </div>
        </div>
    </body>
</html>
