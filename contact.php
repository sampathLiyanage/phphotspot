<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="bower_components/angular-material/angular-material.css">
    <script type = "text/javascript" src="jquery.js"></script>
    <style>
        .error h3, .info h3, .success h3 {
            color:#FFFFFF;
            margin:0;
            padding:0 0 3px;
            font-size:1.8em;
            line-height:1.7em;
        }
        .error p, .info p, .success p {
            line-height:18px !important;
            margin:0 0 10px !important;
            padding:0 !important;
        }
        .error, .info, .success  {
            color:#FFFFFF !important;
            margin:10px 0 10px !important;
            padding:15px 90px 5px 20px !important;
        }

        .error {
            -moz-background-clip:border !important;
            -moz-background-inline-policy:continuous !important;
            -moz-background-origin:padding !important;
            background:#E25F53 url(images/red_alert.png) no-repeat scroll right bottom !important;
        }
        div.material-select {
            padding-bottom: 26px;
        }
        div.material-select select {
            font-size: 100%;
            padding: 3px;
            padding-left:0px;
            background: rgb(255, 255, 255);
            border-top: none !important;
            border-left: none;
            border-right: none;
            border-color: rgba(0, 0, 0, 0.12);
        }
        div.material-select label {
            margin-left:2px;
        }
    </style>
</head>
<body ng-app="contactUs">
<div ng-controller="contactFormController" layout="column" ng-cloak class="md-inline-form">
    <div  layout="column" ng-cloak>
        <md-content layout-padding>
            <form id="contactForm" action="http://api.phpmyspot.com/v-2/contact-form" method="post">
                <md-input-container>
                    <label for="api_author_email">Your E-mail</label>
                    <input name="author_email" required id="api_author_email" ng-model="contactFormData.author_email" type="email"/>
                </md-input-container>
                <md-input-container>
                    <label for="api_author_name">Your Name</label>
                    <input name="author_name" required id="api_author_name" type="text" ng-model="contactFormData.author_name"/>
                </md-input-container>
                <md-input-container>
                    <label for="api_subject">Subject</label>
                    <input name="subject" required id="api_subject" type="text" ng-model="contactFormData.subject"/>
                </md-input-container>
                <md-input-container>
                    <label for="api_content">Message</label>
                    <textarea name="content" required id="api_content" cols="25" rows="5" ng-model="contactFormData.content"></textarea>
                </md-input-container>
                <md-input-container>
                    <label for="captcha">Type the characters you see below</label><br/><img style="width:200px" id="contactCaptcha" alt="captcha" src="http://api.phpmyspot.com/captcha?transparent=1"/>
                    <input type="text" name="captcha" required id="captcha" ng-model="signupFormData.captcha" captcha_src="http://api.phpmyspot.com/captcha?transparent=1">
                </md-input-container>

                <md-button ng-submit class="md-raised md-primary">Submit</md-button>
                </form>
        </md-content>
    </div>
</div>
        <script type = "text/javascript">
                $.urlParam = function(name){
                    var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
                    if(results) {
                        return results[1] || 0;
                    }
                    return '';
                }

                function urldecode(url) {
                    return decodeURIComponent(url.replace(/\+/g, ' '));
                }

                $(function() {
                var err = $.urlParam('error_msg');
                if(err) {
                    $('<div class="error">').html(urldecode(err)).insertBefore('#contactForm');
                }
            });

        </script>
        <script src="bower_components/angular/angular.js"></script>
        <script src="bower_components/angular-aria/angular-aria.js"></script>
        <script src="bower_components/angular-animate/angular-animate.js"></script>
        <script src="bower_components/angular-material/angular-material.js"></script>
        <script>
            angular
                .module('contactUs', ['ngMaterial'])
                .controller('contactFormController', function($scope) {
                    $scope.contactFormData = {author_email:'',author_name:'',subject:'',content:'',captcha:''};
                    for (key in $scope.contactFormData) {
                        var v = $.urlParam(key);
                        if(v) {
                            $scope.contactFormData[key] = urldecode(v);;
                        }

                    }
                })
                .config(function($mdThemingProvider) {
                    // Configure a dark theme with primary foreground yellow
                    $mdThemingProvider.theme('docs-dark', 'default')
                        .primaryPalette('yellow')
                        .dark();
                });
        </script>

</body>
</html>
