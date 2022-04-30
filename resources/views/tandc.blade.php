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
                    <h2>Terms And Conditions </h2>
                    
                    <strong> this website, you agree to the following terms and conditions: </strong>
                    <p>
                    The following expressions apply to these Terms and Conditions, Privacy Statement and any disclaimer Notice and any or all Agreements: Any person, who is visiting or accessing Our Site and accepting the Company’s Terms and Conditions, is considered as- “Client”, “You” and “Your”. “The Company”, “Ourselves”, “We” and “Us”, refers to Social Media Connect. “Party”, “Parties”, or “Us”, refers to either the Client or ourselves, or both the Client or ourselves. All terms refer to the offer, acceptance and consideration of payment necessary to undertake the process of our assistance to the Client in the most appropriate manner, whether by formal meetings of a fixed duration, or any other means, for the express purpose of meeting the Client’s needs in respect of provision of the Company’s stated services/products, in accordance with and subject to, prevailing United States Law. Any use of the above expressions or other words in the singular, plural, capitalization and/or he/she or they, are taken as interchangeable and therefore as referring to the same.
                    Privacy Statement</p>
                    <P>
                    We, at Social Media Connect are here to protect and safeguard your privacy. The information collected from any individual client is allowed to share with any employee of the company, when found urgent or required to do so. We always and persistently keep a check on our systems and information to provide the best possible services to our clients and users. If any damage or unauthorized action is found against any data or the system, required action will be taken to recover damage. 
                    Confidentiality
                    </P>
                    <p>
                    Any data, regarding or referring to the Client and their respective Client Records may be passed to third parties. Though, the records of clients data are considered confidential, hence it should not be exposed to any third party, other than our employees and if legally required to do so, must follow the appropriate authorities. It's totally in the right of the clients to request or ask to see or for copies of their records that we are keeping. Clients have the right to request sight of, and copies of any and all Client Records we keep, but prior to that we need to get a proper reasonable request from your/ client’s end. For the benefit of both the parties, We shall issue client’s record copies or written information to the Clients as part of an agreed contract. 
                    Under law, We shall and we will not be using any of Our Client’s information for any unauthorized purpose and also not be selling, sharing or renting Our Client’s personal information or data to any Third Party. In case, the sharing of data is required for any specific purpose, then it should be under the law and authorized agreement. 
                    </p>
                    <strong>Disclaimer</strong>
                    <strong>Prohibitions and Limitations</strong>
                    <p>
                    The information on this web site is provided on an “as is” basis. To the fullest extent permitted by law, this Company:
                    Excludes all representations and warranties relating to this website and its contents or which is or may be provided by any affiliates or any other third party, including in relation to any inaccuracies or omissions in this website and/or the Company’s literature; and
                    Excludes all liability for damages arising out of or in connection with your use of this website. This includes, without limitation, direct loss, loss of business or profits (whether or not the loss of such profits was foreseeable, arose in the normal course of things or you have advised this Company of the possibility of such potential loss), damage caused to your computer, computer software, systems and programs and the data thereon or any other direct or indirect, consequential and incidental damages
                    All the mentioned prohibitions and limitations are applied only to the extent as authorized by law and as a client or a consumer, none of your legal rights are affected. However, We do not exclude liability for any personal death or any personal injury, caused by its negligence.
                    </p>
                    <strong>Accessibility</strong>
                    <p>
                    The Company strictly prohibits the republication or redistribution of any particular part of the site, without any written consent of the company. Though We try to deliver the best of the services we can, yet We can not guarantee that the services provided by Us will be, always, error-free, on- time or successive. Thereby, reading this and using Our services, You agree to protect the company, its employees, agents and affiliates against any loss or damage caused in whatsoever way. 
                    </p>

                    <strong>Log Files</strong>
                    <p>
                    To survey about the trends, examine the site, collect varied demographic and statistical information and data and even to track User’s movement, We use IP addresses for this entire use as Ip addresses do not reveal about your personal information. It gives anonymous data. Our web servers automatically log standard acquire information including browser type, access times/open mail, URL requested, and referral URL to administer the system, detect usage patterns and other troubleshooting purposes. However, any such information is only used by the Company, when found needful and neither in any way different to that mentioned above and nor will be shared to any Third party.
                    </p>
                    <strong>Cookies</strong>
                    <p>
                    This Site uses Cookies to get the users or clients details, like most of the other sites. Though they are used only in some of the areas of our site and not all. But to check upon something in detail or for better functionality, you need to agree to the use of Cookies. Apart from us, some of our partners, known as Third Party, might also use these Cookies. 
                    </p>
                    <strong>
                    Links to this website
                    </strong>
                    <p>
                    You need to have a written prior consent from Us to make a link to any page of Our site. However, if you do that without bringing that to Our knowledge, it will be totally done at your own risk and the exclusions and limitations set out above will apply to your use of this website by linking to it and nowhere we will be involved in that. 
                    </p>
                    <strong>
                    Links from this website
                    </strong>
                    <p>
                    Our company does not take charge of any loss or harm caused from your end for revealing your personal information to any Third Party, in whatsoever way. Our site does not review the content, linked to from our site. Other such websites, expressing their opinions or appearing any material is none of our concern and We should not be considered as the publishers of any such thing, including content or privacy practices. We encourage our users to be well-aware about the privacy terms of any site they are using or visiting, before sharing any personal data with them.
                    </p>
                    <strong>
                    Copyright and Trademark
                    </strong>
                    <p>
                    Copyright and other relevant intellectual property rights do apply on the entire content related to the company and available on the website. 
                    </p>
                    <strong>
                    Communication
                    </strong>
                    <p>
                    Social Media Connect is located at Sewak Park Dwarka Mod , New Delhi, India.
                    Regarding any query, You can contact us by emailing at enquiry@360digitalidea.com
                    </p>
                    <strong>
                    Inevitable Accident or Act Of God
                    </strong>
                    <p>
                    Under any agreement, none of the two parties is responsible for any failure to perform any liability, caused due to any act, beyond their control. This might include terrorism, war, riot, natural calamity like flood or earthquake, civil unrest or any such event, which causes the termination of an agreement or contract. Any Party affected by such event shall forthwith inform the other Party of the same and shall use all reasonable endeavors to comply with the terms and conditions of any Agreement contained herein.
                    </p>
                    <strong>
                    Disclaimer
                    </strong>
                    <p>
                    Failure of either Party to insist upon strict performance of any provision of this or any Agreement or the failure of either Party to exercise any right or remedy to which it, he or they are entitled hereunder shall not constitute a waiver thereof and shall not cause a diminution of the obligations under this or any Agreement. No waiver of any of the provisions of this or any Agreement shall be effective unless it is expressly stated to be such and signed by both Parties.
                    </p>
                    <strong>
                    General
                    </strong>
                    <p>
                    The mentioned terms and conditions are governed by the laws of the Indian States. You are hereby, while using the site or products or services, agreeing to the terms and conditions. If any such case arises, when any of the mentioned terms or conditions are not found correct or invalid, which might include the prohibitions and limitations too, then that or those particular parts will be cut off from the site’s terms and conditions and rest all will be continued as it were. Failure of the Company to enforce any of the provisions set out in these Terms and Conditions and any Agreement, or failure to exercise any option to terminate, shall not be construed as waiver of such provisions and shall not affect the validity of these Terms and Conditions or of any Agreement or any part thereof, or the right thereafter to enforce each and every provision. Noone, except the main authorized employees or representatives of the company has the right to modify, amend, edit or add on any terms and conditions or only if they sign in writing regarding the same. 
                    </p>
                     
                    <strong>Cancellation</strong>
                    <p>
                    There is no boundation on your choice to hold or quit your account. We understand and respect your choices and whenever you want, you can shift or take a break from Our site, Social Media Connect. We provide full support in the process and make it easier for you.  
                    Note: You are free to ask for the cancellation request, anytime, but after the processing and ending of the billing cycle, it will come into effect.
                    We have provided complete freedom to you to make the cancellation process much easier, efficient and transparent. In case you require any help, you can freely put up your enquiry to us from your registered email address at enquiry@360digitalidea.com.
                    </p>
                    <strong>Refund</strong>
                    <p>
                    Social Media Connect works with an upright refund policy. However, the refund will not get applied and processed in case you have an annual subscription. Regarding any query or concern, contact us at enquiry@360digitalidea.com.
                    </p>
                    <strong>Upgrades and Downgrades</strong>
                    <p>
                    You are free to switch any plans during your subscription, anytime. In case you go from a higher to a lower cost plan, then you will only have to pay for the number of days of the plan usage while the rest, unused amount will be safely and securely credited to your Social Media Connect account, which will be useful at the time of future billing. At the same time, if you want to move from a lower to a higher cost plan, you will have to pay as per your old plan usage for the number of days it was used, while the rest amount will be adjusted on a pro rata basis and then you will only have to pay for the new higher-priced plan. 
                    If you have any query regarding it, you can easily contact us from your registered email address at enquiry@360digitalidea.com.
                    </p>
                    <strong>Notification of Changes</strong>
                    <p>
                    It's all in the reserved right of the company to change and update the terms and conditions from time to time. And, if we make any such change to our privacy policy, it will be announced on our home page or other relevant pages of our site. Also, the site will post regarding any change to the privacy policy, prior 30 days to them coming into effect. The clients affected by the changes made to the site’s clients’ personal information, will be notified by email or postal mail.  If you continue using the site that means, you are agreeing to the terms and conditions mentioned at the site. Therefore, you are advised to keep a check on the terms and conditions and the statements regularly.
                    </p>
                    <small>©2021 Social Media Connect All Rights Reserved.</small>

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
