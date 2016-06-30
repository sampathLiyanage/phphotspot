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
<body ng-app="signUpNewUser">
<div ng-controller="signUpFormController" layout="column" ng-cloak class="md-inline-form">
    <div  layout="column" ng-cloak>
        <md-content layout-padding>
            <form id="reg" name="reg"  enctype="application/x-www-form-urlencoded" action="http://api.phpmyspot.com/v-2/client-register" method="post">
                <div class="material-select">
                    <label style="color:rgba(0,0,0,0.26)" for="country">Country</label><br>
                    <select name="country"  id="country" ng-model="signupFormData.country" ng-options="option.name for option in countries track by option.id" placeholder="Select a Country">
                    </select>
                </div>
                <md-input-container>
                    <label for="first_name">Name</label>
                    <input type="text" required name="first_name" id="first_name" ng-model="signupFormData.first_name">
                </md-input-container>
                <md-input-container>
                    <label for="email">Email address</label>
                    <input type="email" required name="email" id="email" ng-model="signupFormData.email">
                </md-input-container>
                <md-input-container>
                    <label for="password">Password</label>
                    <input type="password" required name="password" id="password" ng-model="signupFormData.password">
                </md-input-container>
                <md-input-container>
                    <label for="password_confirm">Confirm Password</label>
                    <input type="password" required name="password_confirm" id="password_confirm" ng-model="signupFormData.password_confirm">
                </md-input-container>
                <md-input-container>
                    <label for="captcha">Type the characters you see below</label><br/><img style="width:200px" id="signupCaptcha" alt="captcha" src="http://api.phpmyspot.com/captcha?transparent=1"/>
                    <input type="text" required name="captcha" id="captcha" ng-model="signupFormData.captcha" captcha_src="http://api.phpmyspot.com/captcha?transparent=1">
                </md-input-container>

                <md-button ng-submit class="md-raised md-primary">Register</md-button>
                </form>
        </md-content>
    </div>
</div>

        <script type = "text/javascript">
            $.urlParam = function(name){
                var results = new RegExp('[\\?&]' + name + '=([^&#]*)').exec(window.location.href);
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
                    $('<div class="error">').html(urldecode(err)).insertBefore('#reg');
                }
            });

        </script>
        <script src="bower_components/angular/angular.js"></script>
        <script src="bower_components/angular-aria/angular-aria.js"></script>
        <script src="bower_components/angular-animate/angular-animate.js"></script>
        <script src="bower_components/angular-material/angular-material.js"></script>
        <script>
            angular
                .module('signUpNewUser', ['ngMaterial'])
                .controller('signUpFormController', function($scope) {
                    $scope.signupFormData = {email:'',first_name:'',country:'',password:'',password_confirm:'',captcha:''};
                    for (key in $scope.signupFormData) {
                        var v = $.urlParam(key);
                        if(v) {
                            $scope.signupFormData[key] = urldecode(v);
                        }

                    }

                    $scope.countries = [{id:"AF", name:"Afghanistan"},
                        {id:'AL', name:'Albania'},
                        {id:"DZ", name:"Algeria"},
                        {id:"AS", name:"American Samoa"},
                        {id:"AD", name:"Andorra"},
                        {id:"AO", name:"Angola"},
                        {id:"AI", name:"Anguilla"},
                        {id:"AQ", name:"Antarctica"},
                        {id:"AG", name:"Antigua and Barbuda"},
                        {id:"AR", name:"Argentina"},
                        {id:"AM", name:"Armenia"},
                        {id:"AW", name:"Aruba"},
                        {id:"AU", name:"Australia"},
                        {id:"AT", name:"Austria"},
                        {id:"AZ", name:"Azerbaijan"},
                        {id:"BS", name:"Bahamas"},
                        {id:"BH", name:"Bahrain"},
                        {id:"BD", name:"Bangladesh"},
                        {id:"BB", name:"Barbados"},
                        {id:"BY", name:"Belarus"},
                        {id:"BE", name:"Belgium"},
                        {id:"BZ", name:"Belize"},
                        {id:"BJ", name:"Benin"},
                        {id:"BM", name:"Bermuda"},
                        {id:"BT", name:"Bhutan"},
                        {id:"BO", name:"Bolivia"},
                        {id:"BA", name:"Bosnia and Herzegovina"},
                        {id:"BW", name:"Botswana"},
                        {id:"BV", name:"Bouvet Island"},
                        {id:"BR", name:"Brazil"},
                        {id:"BQ", name:"British Antarctic Territory"},
                        {id:"IO", name:"British Indian Ocean Territory"},
                        {id:"VG", name:"British Virgin Islands"},
                        {id:"BN", name:"Brunei"},
                        {id:"BG", name:"Bulgaria"},
                        {id:"BF", name:"Burkina Faso"},
                        {id:"BI", name:"Burundi"},
                        {id:"KH", name:"Cambodia"},
                        {id:"CM", name:"Cameroon"},
                        {id:"CA", name:"Canada"},
                        {id:"CT", name:"Canton and Enderbury Islands"},
                        {id:"CV", name:"Cape Verde"},
                        {id:"KY", name:"Cayman Islands"},
                        {id:"CF", name:"Central African Republic"},
                        {id:"TD", name:"Chad"},
                        {id:"CL", name:"Chile"},
                        {id:"CN", name:"China"},
                        {id:"CX", name:"Christmas Island"},
                        {id:"CC", name:"Cocos [Keeling] Islands"},
                        {id:"CO", name:"Colombia"},
                        {id:"KM", name:"Comoros"},
                        {id:"CG", name:"Congo - Brazzaville"},
                        {id:"CD", name:"Congo - Kinshasa"},
                        {id:"CK", name:"Cook Islands"},
                        {id:"CR", name:"Costa Rica"},
                        {id:"HR", name:"Croatia"},
                        {id:"CU", name:"Cuba"},
                        {id:"CY", name:"Cyprus"},
                        {id:"CZ", name:"Czech Republic"},
                        {id:"CI", name:"Côte dIvoire"},
                        {id:"DK", name:"Denmark"},
                        {id:"DJ", name:"Djibouti"},
                        {id:"DM", name:"Dominica"},
                        {id:"DO", name:"Dominican Republic"},
                        {id:"NQ", name:"Dronning Maud Land"},
                        {id:"DD", name:"East Germany"},
                        {id:"EC", name:"Ecuador"},
                        {id:"EG", name:"Egypt"},
                        {id:"SV", name:"El Salvador"},
                        {id:"GQ", name:"Equatorial Guinea"},
                        {id:"ER", name:"Eritrea"},
                        {id:"EE", name:"Estonia"},
                        {id:"ET", name:"Ethiopia"},
                        {id:"FK", name:"Falkland Islands"},
                        {id:"FO", name:"Faroe Islands"},
                        {id:"FJ", name:"Fiji"},
                        {id:"FI", name:"Finland"},
                        {id:"FR", name:"France"},
                        {id:"GF", name:"French Guiana"},
                        {id:"PF", name:"French Polynesia"},
                        {id:"TF", name:"French Southern Territories"},
                        {id:"FQ", name:"French Southern and Antarctic Territories"},
                        {id:"GA", name:"Gabon"},
                        {id:"GM", name:"Gambia"},
                        {id:"GE", name:"Georgia"},
                        {id:"DE", name:"Germany"},
                        {id:"GH", name:"Ghana"},
                        {id:"GI", name:"Gibraltar"},
                        {id:"GR", name:"Greece"},
                        {id:"GL", name:"Greenland"},
                        {id:"GD", name:"Grenada"},
                        {id:"GP", name:"Guadeloupe"},
                        {id:"GU", name:"Guam"},
                        {id:"GT", name:"Guatemala"},
                        {id:"GG", name:"Guernsey"},
                        {id:"GN", name:"Guinea"},
                        {id:"GW", name:"Guinea-Bissau"},
                        {id:"GY", name:"Guyana"},
                        {id:"HT", name:"Haiti"},
                        {id:"HM", name:"Heard Island and McDonald Islands"},
                        {id:"HN", name:"Honduras"},
                        {id:"HK", name:"Hong Kong SAR China"},
                        {id:"HU", name:"Hungary"},
                        {id:"IS", name:"Iceland"},
                        {id:"IN", name:"India"},
                        {id:"ID", name:"Indonesia"},
                        {id:"IR", name:"Iran"},
                        {id:"IQ", name:"Iraq"},
                        {id:"IE", name:"Ireland"},
                        {id:"IM", name:"Isle of Man"},
                        {id:"IL", name:"Israel"},
                        {id:"IT", name:"Italy"},
                        {id:"JM", name:"Jamaica"},
                        {id:"JP", name:"Japan"},
                        {id:"JE", name:"Jersey"},
                        {id:"JT", name:"Johnston Island"},
                        {id:"JO", name:"Jordan"},
                        {id:"KZ", name:"Kazakhstan"},
                        {id:"KE", name:"Kenya"},
                        {id:"KI", name:"Kiribati"},
                        {id:"KW", name:"Kuwait"},
                        {id:"KG", name:"Kyrgyzstan"},
                        {id:"LA", name:"Laos"},
                        {id:"LV", name:"Latvia"},
                        {id:"LB", name:"Lebanon"},
                        {id:"LS", name:"Lesotho"},
                        {id:"LR", name:"Liberia"},
                        {id:"LY", name:"Libya"},
                        {id:"LI", name:"Liechtenstein"},
                        {id:"LT", name:"Lithuania"},
                        {id:"LU", name:"Luxembourg"},
                        {id:"MO", name:"Macau SAR China"},
                        {id:"MK", name:"Macedonia"},
                        {id:"MG", name:"Madagascar"},
                        {id:"MW", name:"Malawi"},
                        {id:"MY", name:"Malaysia"},
                        {id:"MV", name:"Maldives"},
                        {id:"ML", name:"Mali"},
                        {id:"MT", name:"Malta"},
                        {id:"MH", name:"Marshall Islands"},
                        {id:"MQ", name:"Martinique"},
                        {id:"MR", name:"Mauritania"},
                        {id:"MU", name:"Mauritius"},
                        {id:"YT", name:"Mayotte"},
                        {id:"FX", name:"Metropolitan France"},
                        {id:"MX", name:"Mexico"},
                        {id:"FM", name:"Micronesia"},
                        {id:"MI", name:"Midway Islands"},
                        {id:"MD", name:"Moldova"},
                        {id:"MC", name:"Monaco"},
                        {id:"MN", name:"Mongolia"},
                        {id:"ME", name:"Montenegro"},
                        {id:"MS", name:"Montserrat"},
                        {id:"MA", name:"Morocco"},
                        {id:"MZ", name:"Mozambique"},
                        {id:"MM", name:"Myanmar [Burma]"},
                        {id:"NA", name:"Namibia"},
                        {id:"NR", name:"Nauru"},
                        {id:"NP", name:"Nepal"},
                        {id:"NL", name:"Netherlands"},
                        {id:"AN", name:"Netherlands Antilles"},
                        {id:"NT", name:"Neutral Zone"},
                        {id:"NC", name:"New Caledonia"},
                        {id:"NZ", name:"New Zealand"},
                        {id:"NI", name:"Nicaragua"},
                        {id:"NE", name:"Niger"},
                        {id:"NG", name:"Nigeria"},
                        {id:"NU", name:"Niue"},
                        {id:"NF", name:"Norfolk Island"},
                        {id:"KP", name:"North Korea"},
                        {id:"VD", name:"North Vietnam"},
                        {id:"MP", name:"Northern Mariana Islands"},
                        {id:"NO", name:"Norway"},
                        {id:"OM", name:"Oman"},
                        {id:"PC", name:"Pacific Islands Trust Territory"},
                        {id:"PK", name:"Pakistan"},
                        {id:"PW", name:"Palau"},
                        {id:"PS", name:"Palestinian Territories"},
                        {id:"PA", name:"Panama"},
                        {id:"PZ", name:"Panama Canal Zone"},
                        {id:"PG", name:"Papua New Guinea"},
                        {id:"PY", name:"Paraguay"},
                        {id:"YD", name:"People's Democratic Republic of Yemen"},
                        {id:"PE", name:"Peru"},
                        {id:"PH", name:"Philippines"},
                        {id:"PN", name:"Pitcairn Islands"},
                        {id:"PL", name:"Poland"},
                        {id:"PT", name:"Portugal"},
                        {id:"PR", name:"Puerto Rico"},
                        {id:"QA", name:"Qatar"},
                        {id:"RO", name:"Romania"},
                        {id:"RU", name:"Russia"},
                        {id:"RW", name:"Rwanda"},
                        {id:"RE", name:"Réunion"},
                        {id:"BL", name:"Saint Barthélemy"},
                        {id:"SH", name:"Saint Helena"},
                        {id:"KN", name:"Saint Kitts and Nevis"},
                        {id:"LC", name:"Saint Lucia"},
                        {id:"MF", name:"Saint Martin"},
                        {id:"PM", name:"Saint Pierre and Miquelon"},
                        {id:"VC", name:"Saint Vincent and the Grenadines"},
                        {id:"WS", name:"Samoa"},
                        {id:"SM", name:"San Marino"},
                        {id:"SA", name:"Saudi Arabia"},
                        {id:"SN", name:"Senegal"},
                        {id:"RS", name:"Serbia"},
                        {id:"CS", name:"Serbia and Montenegro"},
                        {id:"SC", name:"Seychelles"},
                        {id:"SL", name:"Sierra Leone"},
                        {id:"SG", name:"Singapore"},
                        {id:"SK", name:"Slovakia"},
                        {id:"SI", name:"Slovenia"},
                        {id:"SB", name:"Solomon Islands"},
                        {id:"SO", name:"Somalia"},
                        {id:"ZA", name:"South Africa"},
                        {id:"GS", name:"South Georgia and the South Sandwich Islands"},
                        {id:"KR", name:"South Korea"},
                        {id:"ES", name:"Spain"},
                        {id:"LK", name:"Sri Lanka"},
                        {id:"SD", name:"Sudan"},
                        {id:"SR", name:"Suriname"},
                        {id:"SJ", name:"Svalbard and Jan Mayen"},
                        {id:"SZ", name:"Swaziland"},
                        {id:"SE", name:"Sweden"},
                        {id:"CH", name:"Switzerland"},
                        {id:"SY", name:"Syria"},
                        {id:"ST", name:"São Tomé and Príncipe"},
                        {id:"TW", name:"Taiwan"},
                        {id:"TJ", name:"Tajikistan"},
                        {id:"TZ", name:"Tanzania"},
                        {id:"TH", name:"Thailand"},
                        {id:"TL", name:"Timor-Leste"},
                        {id:"TG", name:"Togo"},
                        {id:"TK", name:"Tokelau"},
                        {id:"TO", name:"Tonga"},
                        {id:"TT", name:"Trinidad and Tobago"},
                        {id:"TN", name:"Tunisia"},
                        {id:"TR", name:"Turkey"},
                        {id:"TM", name:"Turkmenistan"},
                        {id:"TC", name:"Turks and Caicos Islands"},
                        {id:"TV", name:"Tuvalu"},
                        {id:"UM", name:"U.S. Minor Outlying Islands"},
                        {id:"PU", name:"U.S. Miscellaneous Pacific Islands"},
                        {id:"VI", name:"U.S. Virgin Islands"},
                        {id:"UG", name:"Uganda"},
                        {id:"UA", name:"Ukraine"},
                        {id:"SU", name:"Union of Soviet Socialist Republics"},
                        {id:"AE", name:"United Arab Emirates"},
                        {id:"GB", name:"United Kingdom"},
                        {id:"US", name:"United States"},
                        {id:"ZZ", name:"Unknown or Invalid Region"},
                        {id:"UY", name:"Uruguay"},
                        {id:"UZ", name:"Uzbekistan"},
                        {id:"VU", name:"Vanuatu"},
                        {id:"VA", name:"Vatican City"},
                        {id:"VE", name:"Venezuela"},
                        {id:"VN", name:"Vietnam"},
                        {id:"WK", name:"Wake Island"},
                        {id:"WF", name:"Wallis and Futuna"},
                        {id:"EH", name:"Western Sahara"},
                        {id:"YE", name:"Yemen"},
                        {id:"ZM", name:"Zambia"},
                        {id:"ZW", name:"Zimbabwe"},
                        {id:"AX", name:"Åland Islands"}];


                    if ($scope.signupFormData.country != '') {
                        for (var i=0; i<$scope.countries.length; i++) {
                            if ($scope.countries[i].id == $scope.signupFormData.country) {
                                $scope.signupFormData.country = $scope.countries[i];
                                break;
                            }
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
