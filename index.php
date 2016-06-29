<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="bower_components/angular-material/angular-material.css">
    <script type = "text/javascript" src="jquery.js"></script>
    <style>
        .md-top.md-right {
            top: 10%;
            margin-left: auto;
            margin-right: auto;
            left: 0; right: 0;
        }
        .tabsdemoDynamicHeight md-content {
            background-color: transparent !important;
        }
        .tabsdemoDynamicHeight md-content md-tabs {
            background: #f6f6f6;
            border: 1px solid #e1e1e1;
        }
        .tabsdemoDynamicHeight md-content md-tabs md-tabs-wrapper {
            background: white;
        }
        .tabsdemoDynamicHeight md-content h1:first-child {
            margin-top: 0;
        }
        md-tabs > md-tabs-wrapper > md-tabs-canvas > md-pagination-wrapper > md-ink-bar {
            color: red;
            background: red;
        }
        md-tabs > md-tabs-wrapper > md-tabs-canvas > md-pagination-wrapper > md-tab-item:not([disabled]) {
            color: grey;
        }
        md-tabs > md-tabs-wrapper > md-tabs-canvas > md-pagination-wrapper > md-tab-item:not([disabled]).md-active {
            color: darkblue;
        }
        .logo {
            width: 50px;
        }
        .fixed-toolbar {
            position: fixed;
        }
        .tab-panel {
            padding-top:80px;
        }
        .left-panel {
            padding-top:120px;
        }
        md-card > md-card-content {
            padding: 8px;
        }
        md-card-content > p {
            font-size: 14px;
        }
        md-input-container {
            font-size: 14px;
            padding-bottom: 0px;
        }
        md-card .md-title {
            font-size: 16px;
            margin-bottom: 0px;
        }
        .md-mini span {
            color: gray;
        }
        .listdemoListControls md-divider {
            margin-top: 10px;
            margin-bottom: 10px; }
        .listdemoListControls md-list-item > p, .listdemoListControls md-list-item > .md-list-item-inner > p, .listdemoListControls md-list-item .md-list-item-inner > p, .listdemoListControls md-list-item .md-list-item-inner > .md-list-item-inner > p {
            -webkit-user-select: none;
            /* Chrome all / Safari all */
            -moz-user-select: none;
            /* Firefox all */
            -ms-user-select: none;
            /* IE 10+ */
            user-select: none;
            /* Likely future */ }
        md-list-item p {
            padding-top: 5px;
            padding-bottom: 5px;
        }
        h1 span.main-title {
            margin-left: 10px;
        }
        .md-subheader .md-subheader-inner {
            padding-top:0px;
        }
        #loginPanel md-icon {
            color: rgba(0,0,0,0.54) !important;
        }
    </style>
</head>
<body ng-app="webHosting">
<md-toolbar ng-controller="toolbarController" class="fixed-toolbar">
    <div class="md-toolbar-tools">
        <img ng-src="logo.png" class="md-card-image" alt="Washed Out">
        <h1>
            <span class="main-title">Free Web Hosting</span>
        </h1>
        <span flex></span>
        <md-button ng-click="showSignup()" style="right:70px" class="md-raised md-warn">Sign Up</md-button>
    </div>
</md-toolbar>
<div id="loginPanel" ng-controller="loginPanelController" style="position:fixed;right:0;z-index:999">
    <md-fab-speed-dial md-open="loginPanel.isOpen" md-direction="{{loginPanel.selectedDirection}}"
                       ng-class="loginPanel.selectedMode">
        <md-fab-trigger>
            <md-button aria-label="login" class="md-fab md-warn">
                <md-tooltip md-direction="down">
                    Log-In
                </md-tooltip>
                <md-icon md-svg-src="login.svg"></md-icon>
            </md-button>
        </md-fab-trigger>
        <md-fab-actions>
            <md-button ng-click="loginCpanel()" aria-label="settings" class="md-fab md-raised md-mini">
                <md-tooltip md-direction="left">
                    C-Panel Log-In
                </md-tooltip>
                <md-icon md-svg-src="settings.svg" aria-label="settings"></md-icon>
            </md-button>
            <md-button ng-click="loginWebMail()" aria-label="mail" class="md-fab md-raised md-mini">
                <md-tooltip md-direction="left">
                    Web Mail Log-in
                </md-tooltip>
                <md-icon md-svg-src="mail.svg" aria-label="mail"></md-icon>
            </md-button>
        </md-fab-actions>
    </md-fab-speed-dial>
</div>
<div layout="row">
    <div flex="10">
    </div>
    <div flex="60" ng-controller="tabsController">
        <div ng-cloak>
            <md-content class="tab-panel">
                <md-tabs md-dynamic-height md-border-bottom md-selected="tabs.selectedIndex">
                    <md-tab label="Free Hosting">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Hosting Plans</h1>
                            <md-card>
                             <img ng-src="plan.png" class="md-card-image" alt="Washed Out">
                                    <md-card-content>
                            <p>
                                Before purchasing our 'vip' or 'super vip' plans you have to SIGN UP for a free account. Then you can upgrate your account.
                            </p>
                            </md-card-content>
                            </md-card></md-content>
                    </md-tab>
                    <md-tab label="Sign Up">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Sign Up</h1>
                            <div id="api-client-signup" ng-controller="signupIframeLoadController">
                                <iframe id="signUpIframe" iframe-onload="iframeLoadedCallBack(this)" frameBorder="0" width="400" height="800" src="signup.php"></iframe>
                            </div>
                             </md-content>
                    </md-tab>
                    <md-tab label="Contact Us">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Contact Us</h1>
                            <h4 style="margin-left: 5px">Send an email to <a href="mailto:admin@phpmyspot.com">admin@phpmyspot.com</a> or Submit a support ticket with the following form</h4>
                            <div id="api-client-signup" ng-controller="contactIframeLoadController">
                                <iframe id="contactIframe" iframe-onload="iframeLoadedCallBack(this)" frameBorder="0" width="400" height="800" src="contact.php"></iframe>
                            </div>
                        </md-content>
                    </md-tab>
                    <md-tab label="Terms">
                        <md-content class="md-padding">
                            <h1 class="md-display-2">Terms</h1>
                            <md-list ng-cloak>
                                <md-subheader class="md-no-sticky">You agree to not use the Service to:</md-subheader>
                                <md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any Content that is unlawful, harmful, threatening, abusive, harassing, tortious, defamatory, vulgar, obscene, libelous, invasive of another's privacy, hateful, or racially, ethnically or otherwise objectionable.</p>
                                </md-list-item>
                                <md-divider></md-divider>
                                <md-list-item ">
                                    <p>Impersonate any person or entity, including, but not limited to, a Byet official, forum leader, guide or host, or falsely state or otherwise misrepresent your affiliation with a person or entity.</p>
                                </md-list-item>
                                <md-divider></md-divider>
                                <md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any Content that you do not have a right to make available under any law or under contractual or fiduciary relationships (such as inside information, proprietary and confidential information learned or disclosed as part of employment relationships or under nondisclosure agreements).</p>
                                </md-list-item>
                                <md-divider></md-divider>
                                <md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any Content that infringes any patent, trademark, trade secret, copyright or other proprietary rights ("Rights") of any party; This includes linking to or redirecting to any content or copyright files hosted on a 3rd party resource / servers.</p>
                                </md-list-item>
                                <md-divider></md-divider><md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any unsolicited or unauthorized advertising, promotional materials, "junk mail," "spam," "chain letters," "pyramid schemes," or any other form of solicitation, except in those areas (such as shopping) that are designated for such purpose (please read our complete Spam Policy).</p>
                                </md-list-item>
                                <md-divider></md-divider><md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any material that contains software viruses or any other computer code, files or programs designed to interrupt, destroy or limit the functionality of any computer software or hardware or telecommunications equipment.</p>
                                </md-list-item>
                                <md-divider></md-divider><md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any material that is of broadcast / streaming types.</p>
                                </md-list-item>
                                <md-divider></md-divider>
                                <md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any material that is of,
                                        keylogging / proxy service / irc / shell(s) if any type / file hosting / file sharing types.</p>
                                </md-list-item>
                                <md-divider></md-divider>
                                <md-list-item ">
                                    <p>Upload, post, email, transmit or otherwise make available any material on free hosting accounts that is of pornographic nature. This excludes premium paid hosting accounts (cPanel/WHM hosting accounts).</p>
                                </md-list-item>
                                <md-divider></md-divider><md-list-item ">
                                    <p>Interfere with or disrupt the Service or servers or networks connected to the Service, or disobey any requirements, procedures, policies or regulations of networks connected to the Service.</p>
                                </md-list-item>
                                <md-divider></md-divider>
                                <md-list-item ">
                                    <p>Intentionally or unintentionally violate any applicable local, state, national or international law, including, but not limited to, regulations promulgated by the U.S. Securities and Exchange Commission, any rules of any national or other securities exchange, including, without limitation, the New York Stock Exchange, the American Stock Exchange or the NASDAQ, and any regulations having the force of law.</p>
                                </md-list-item>
                                <md-divider></md-divider><md-list-item ">
                                    <p>Provide material support or resources (or to conceal or disguise the nature, location, source, or ownership of material support or resources) to any organization(s) designated by the United States government as a foreign terrorist organization pursuant to section 219 of the Immigration and Nationality Act.</p>
                                </md-list-item>
                            </md-list>
                        </md-content>
                    </md-tab>
                </md-tabs>
            </md-content>
        </div>
    </div>
    <div flex="20">
            <div flex>
                <div  ng-controller="leftPanelController"  ng-cloak>
                    <md-content class="md-padding left-panel">
                        <md-card>
                            <img ng-src="php-mysql.jpg" class="md-card-image" alt="Washed Out">
                            <md-card-content>
                                <p>
                                    Professional, PHP, MySQL hosting, powered by clustered technology. We use only the highest quality hardware and up-to-date software.
                                </p>
                            </md-card-content>
                        </md-card>
                        <br>
                        <md-card>
                            <img ng-src="no-add.jpg" class="md-card-image" alt="Washed Out">
                            <md-card-content>
                                <p>
                                    We don't put any kind of advertisement or any other content on your webpages.
                                </p>
                            </md-card-content>
                        </md-card>
                        <br/>
                        <md-card>
                            <img ng-src="one-click-install.jpg" class="md-card-image" alt="Washed Out">
                            <md-card-content>
                                <p>
                                    Install more than 60 apps including joomla, wordpress and drupal with just a single click.
                                </p>
                            </md-card-content>
                        </md-card>
                        <br/>
                        <md-card>
                            <img ng-src="99.jpg" class="md-card-image" alt="Washed Out">
                            <md-card-content>
                                <p>
                                    Our hosting comes with 99% uptime guarantee. Servers are powerful and stable. Servers utilize 1 Gbps internet connections.
                                </p>
                            </md-card-content>
                        </md-card>
                    </md-content>
                </div>
            </div>
    </div>
    <div flex="10">
    </div>
</div>


<script>
    function changeLocationIfSignUp($window, toastService) {
        try{
            var iFrame = document.getElementById("signUpIframe").contentWindow;
            var href = iFrame.location.href.toString();
        }catch(exception) {
            if (exception.name == 'SecurityError' && navigator.onLine) {
                $window.scrollTo(0, 0);
                document.getElementById("signUpIframe").src = "signup.php";
                toastService.showToast("Signed up Successfully. You'll receive an email with activation link soon...");
                window.open('http://cpanel.phpmyspot.com','_blank');
            }
        }
    }
    function showTicketSubmitSuccess($window, toastService) {
        try{
            var iFrame = document.getElementById("contactIframe").contentWindow;
            var href = iFrame.location.href.toString();
        }catch(exception){
            if (exception.name == 'SecurityError' && navigator.onLine) {
                $window.scrollTo(0, 0);
                document.getElementById("contactIframe").src = "contact.php" ;
                toastService.showToast("Ticket Submitted Successfully. Our team will contact you soon...");
            }
        }
    }
</script>
<script src="bower_components/angular/angular.js"></script>
<script src="bower_components/angular-aria/angular-aria.js"></script>
<script src="bower_components/angular-animate/angular-animate.js"></script>
<script src="bower_components/angular-material/angular-material.js"></script>
<script>
    angular.module('webHosting', ['ngMaterial'])
        .directive('iframeOnload', [function(){
            return {
                scope: {
                    callBack: '&iframeOnload'
                },
                link: function(scope, element, attrs){
                    element.on('load', function(){
                        return scope.callBack();
                    })
                }
             }
        }])
        .controller('leftPanelController', function($scope) {
            $scope.imagePath = "http://cdn.thumbr.io/7a5920d28234569b213660f322165bab/KhPZbWboUluRxv8PG87L/www.freepik.com/blog/wp-content/uploads/2015/11/Thanksgiving-day.jpg/800/thumb.jpg";
        })
        .controller('signupController', function($scope,$http) {
            var oringinalCaptchaUrl = "http://api.phpmyspot.com/captcha?transparent=1";
            $scope.singupFormData = {};
            $scope.captchaUrl = oringinalCaptchaUrl;
            $scope.submit = function() {
                console.log($scope.singupFormData);
                var req = {
                    method: 'POST',
                    url: "http://api.phpmyspot.com/v-2/client-register",
                    data: JSON.stringify($scope.singupFormData),
                    headers: { 'X-Requested-With':"", "enctype":"application/x-www-form-urlencoded"}
                }

                $http(req).then(function successCallback(response) {
                    console.log("success");
                    if ('error' in response.data) {
                        $scope.captchaUrl = oringinalCaptchaUrl+'&cb='+(new Date()).toString();
                    }
                    console.log(response);
                }, function errorCallback(response) {
                    $scope.captchaUrl = oringinalCaptchaUrl+'&cb='+(new Date()).toString();
                    console.log('error')
                    console.log(response);
                });
            }
        }).controller('loginPanelController', function($scope) {
            $scope.loginPanel = {};
            $scope.loginPanel.topDirections = ['left', 'up'];
            $scope.loginPanel.bottomDirections = ['down', 'right'];
            $scope.loginPanel.isOpen = false;
            $scope.loginPanel.availableModes = ['md-fling', 'md-scale'];
            $scope.loginPanel.selectedMode = 'md-fling';
            $scope.loginPanel.availableDirections = ['up', 'down', 'left', 'right'];
            $scope.loginPanel.selectedDirection = 'down';
            $scope.loginCpanel = function() {
                window.open('http://cpanel.phpmyspot.com','_blank');
            };
            $scope.loginWebMail = function() {
                window.open('http://webmail.phpmyspot.com','_blank');
            };
        }).controller('tabsController', ['$scope','tabService',function($scope,tabService) {
            $scope.tabs = {};
            $scope.tabs.selectedIndex = 0;
            tabService.initTabs($scope.tabs);
        }]).controller('toolbarController', ['$scope','tabService',function($scope,tabService) {
            $scope.showSignup = function() {
                tabService.setTabIndex(1);
            }
        }]).controller('signupIframeLoadController', ['$scope', '$window', 'toastService', function($scope, $window, toastService){
            $scope.iframeLoadedCallBack = function(iFrame){
                changeLocationIfSignUp($window, toastService, iFrame);
            }
        }]).controller('contactIframeLoadController', ['$scope',  '$window','toastService', function($scope, $window, toastService){
            $scope.iframeLoadedCallBack = function(iFrame){
                showTicketSubmitSuccess($window, toastService, iFrame);
            }
        }]).service('tabService',function(){
            var tabs;
            return {
                initTabs : function(tbs) {
                    tabs = tbs;
                },
                setTabIndex : function(index) {
                    tabs.selectedIndex = index;
                }
            };
        }).service('toastService',function($mdToast){
            var tabs;
            var last = {
                bottom: false,
                top: true,
                left: true,
                right: true
            };
            var toastPosition = angular.extend({},last);
            var getToastPosition = function() {
                sanitizePosition();
                return Object.keys(toastPosition)
                    .filter(function(pos) { return toastPosition[pos]; })
                    .join(' ');
            };
            function sanitizePosition() {
                var current = toastPosition;
                if ( current.bottom && last.top ) current.top = false;
                if ( current.top && last.bottom ) current.bottom = false;
                if ( current.right && last.left ) current.left = false;
                if ( current.left && last.right ) current.right = false;
                last = angular.extend({},current);
            }
            return {
                showToast : function(content) {
                    var toast = $mdToast.simple()
                        .content(content)
                        .action('OK')
                        .highlightAction(true)
                        .hideDelay(30000)
                        .position(getToastPosition());
                    $mdToast.show(toast).then(function(response) {
                        if ( response == 'ok' ) {
                            $mdToast.hide();
                        }
                    });
                }}
    });

</script>

</body>
</html>
