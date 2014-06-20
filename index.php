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


      <div style=" background-color:#06333d; widht:100%; height:200px; ">
            
      </div>
      
      <h2>You're looking for  {{sort}}  {{place}} </h2>

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
                      

                        <img ng-src="{{yelpa.img}}" class="img-thumbnail "/>
                        <br/>
                       <!-- <a style="color:#9a2452;" ng-mouseover="test()" href="#/detail/{{yelpa.id}}">{{yelpa.name}} </a>-->
                        <a style="color:#9a2452;" href="#/detail/{{yelpa.idItem}}">{{yelpa.name}} </a>
                        <br/> 
                        <label>Raiting: {{yelpa.raiting}}   </label>
                        <br/>
                       
                        <label>Location: {{yelpa.location}}</label>
                        <br/>
                     
                      
                  </div>
                  

                  </div>

                  <div class="col-sm-4" >


                         <div class="panel panel-default">  
                              <div class="panel-body">
                                    <h3>Deals </h3>
                                    
                                    <label ng-model="alertDeal">{{alertDeal}}</label>
                                    <br/>

                                    <div ng-repeat="yelpo in yelp"> 


                                          <!--<div class="test"  ng-hide="yelpo.length">
                                                No items found.
                                          </div>-->

                                        <!--  <div ng-repeat-empty>There are no results found</div>-->

                                          <h5 ng-repeat="deals in yelpo.deals">{{deals.what_you_get}}</h5>
                                    </div>



                              </div>
                        </div>

                  </div>

                  <div class="col-sm-4">
                        <div class="panel panel-default">  
                              <div class="panel-body">
                                 
                                    <div class="row center-block align" >
                                          <div class="col-sm-12"  >
                                                <input type="text" require  ngMinlength=1 style=" filter: alpha(opacity=55); -webkit-box-shadow: none;box-shadow: none;opacity: .55;"  ng-model="name"  placeholder="Email or name"/>
                                          </div>
                                    </div>

                                    <br/>
                                    <div class="row center-block align" >
                                          <div class="col-sm-12">
                                                <input type="text" require ngMinlength=1 style=" filter: alpha(opacity=55); -webkit-box-shadow: none;box-shadow: none;opacity: .55;"  ng-model="txt" placeholder="Msg"/>
                                          </div>

                                    </div>

                                    <div class="clearfix"></div>
                                    <br/>
                                    
                                    <div class="row center-block align" >
                                           <a class="btn btn-default btn-sm" ng-click="addMsg()">Add message</a> 
                                    </div>


                                      <ul >
                                          <li ng-repeat="messages in message">{{messages.message}} by {{messages.name}}
                                                <label style="display:none;">{{messages.idMessage}}</label>
                                                <a ng-click="deleteMsg(messages.idMessage)">Delete me</a>
                                          </li>

                                    </ul>

                                
                              </div> 
                        </div>  
                  </div>

            </div>
      </div>


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