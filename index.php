<html ng-app="myApp">
<head></head>
<title>My App</title>
<link rel="stylesheet" type="text/css" href="./css/css.css">
<link rel="stylesheet" type="text/css" href="./css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.16/angular.min.js"></script>
<!--<script src-"js/angular-animate.min.js" type="text/javascript"></script>-->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.13/angular-animate.js"></script>
<script src="js/angular-route.js" type="text/javascript" ></script>
<body>
<form action="index.php" name="myForm" method="POST" novalidate="" ng-controller="tasksController" >

<header>
      <div class="banner"></div>
</header>
		<!--<div ng-controller="MyController">-->
<div  ng-init="init()" class="container">


      <!--<div style=" background-color:#06333d; widht:10%; height:200px; ">-->

     <!-- <div style=" background-color:#ffffff; widht:10%; height:200px; ">
            
      </div>-->




      <div class="col-sm-12">
            <div style="text-align:right;">
                  <img src="./images/stick.png"/>
            </div>
      </div>

      <br/>
      <br/>
      <br/>
      <br/>
      <br/>


     <!-- <ul class="nav nav-pills" >
            <li > 
                  <h3 class="greenSymbol">Home</h3>
            </li>
            <li>
                  <h3 class="greenSymbol">About</h3>
            </li>
      </ul>-->

     

      <br/>

      <div class="line"></div>


      
      <h2>You're looking for  {{sort}} in {{place}} </h2>

      <div style="clear:both;"></div>

      <div class="container-fluid">

            <div class="row">
                  <div class="form-inline">
                        <div class="form-group">  
                              <input type="text" ng-minlength="1" required   ng-model="sort" class="form-control" placeholder="Restaurant,spa,gym"/>
                        </div>  
                        <div class="form-group">
                              <input type="text" ng-minlength="1" required  ng-model="place" class="form-control" placeholder="Manhattan,Brooklyn"/>
                              <a ng-click="addBill()" class="btn btn-default btn-md" >Search</a> 
                        </div>                                      
                  <div>
                  <br/>
            </div>


            <div class="row">
                  <div class="col-sm-8">
                        <h2 ng-model="alertBusiness" ng-if="yelp.length==0">Sorry! No items found</h2>
                  </div>
            </div>


            <div class="row">
                 <div class="col-sm-8">
                        <div class="col-sm-3" ng-repeat="yelpa in yelp" style="height:250px; text-align:center;"  autoscroll>
                              <img ng-src="{{yelpa.img}}" class="img-thumbnail"/>
                              <br/>
                              <br/>
                              <!--<a style="color:#9a2452;" href="#/detail/{{yelpa.idItem}}">{{yelpa.name}} </a>-->
                              <label>{{yelpa.name}}</label>
                              <br/>
                              <label class="fontSubtitle">{{yelpa.location}}</label>
                              <br/>
                              <label><a style="color:#9a2452; font-weight: lighter;" href="#/detail/{{yelpa.idItem}}">More info</a></label>
                              
                        </div>
                 </div>

                  <div class="col-sm-4" >


                         <div class="panel panel-default">  
                              <div class="panel-body">
                                    <h3>Deals </h3>                                    
                                    <label class="fontBox" ng-model="alertDeal">{{alertDeal}}</label>
                                    <br/>
                                    <div ng-repeat="yelpo in yelp"> 
                                          <h5 ng-repeat="deals in yelpo.deals">
                                          <label class="fontBox">{{deals.what_you_get}}</label>
                                          </h5>
                                    </div>

                              </div>
                        </div>

                        <br/>

                        <div class="panel panel-default">  
                              <div class="panel-body" >
                                    <h3>Top rating</h3>
                                    <ul>
                                          <li ng-repeat="ratelist in yelp" >
                                                <label class="fontBox" ng-if="ratelist.raiting>4.40" >
                                                      <span class="greenSymbol">&#10004;</span>
                                                      {{ratelist.name}}
                                                </label>
                                          </li>
                                    </ul>
                              </div>
                        </div>

                        <br/>

                         <div class="panel panel-default">  
                              <div class="panel-body">
                                    <h3>Comments room: </h3> 
                                    <br/>
                                    <div class="row center-block align" >
                                          <div class="col-sm-12"  >
                                                <input type="text" require  ngMinlength=1 class="boxImput" ng-model="name"  placeholder="Email or name"/>
                                          </div>
                                    </div>

                                    <br/>
                                    <div class="row center-block align" >
                                          <div class="col-sm-12">
                                                <!--<input type="text" require ngMinlength=1 style=" filter: alpha(opacity=55); -webkit-box-shadow: none;box-shadow: none;opacity: .55;"  ng-model="txt" placeholder="Msg"/>-->
                                                <textarea ng-model="txt" rows="6" cols="21" class="boxImput" ></textarea>
                                          </div>

                                    </div>

                                    <div class="clearfix"></div>
                                    <br/>
                                    
                                    <div class="row center-block align" >
                                           <a class="btn btn-default btn-sm" ng-click="addMsg()">Add message</a> 
                                    </div>




                                      <ul >
                                          <li>
                                                <label>{{txt}}<label>
                                          </li>
                                          <li ng-repeat="messages in message">
                                                <label class="fontBox">{{messages.message}} by {{messages.name}}</label>
                                                <label style="display:none;" >{{messages.idMessage}}</label>
                                                <a ng-click="deleteMsg(messages.idMessage)">Delete me</a>
                                          </li>

                                    </ul>
                              </div> 
                        </div> 


                  </div>
            </div>


      </div>
      <br/>

       <!--<div ng-view></div>-->
       
</div>

<div class="page" ng-view autoscroll></div>


<div class="container">
      <footer class="row">
            <nav class="col-lg-12">
                  <ul class="breadcrumb">
                        <li>About me </li>
                        <li>Contact me </li>
                  </ul>
            </nav>
      </footer>
</div>

</form>
<script type="text/javascript" src="app/app.js"></script>






<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>-->


</body>
</html>