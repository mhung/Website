//var app=angular.module("myApp", []);
 

/*app.config( function($routeProvider)
{
      $routeProvider.when('/detail/:id',
      {
            templateUrl:'./view/details.html',
            controller:'DetailsController'
      });
    
});

app.controller('DetailsController', function($scope, $routeParams) {
      $scope.id = $routeParams.orderId;
});*/


var app=angular.module("myApp", ["ngRoute","ngAnimate"]);



app.config(['$routeProvider',function($routeProvider)
{

      $routeProvider.when('/detail/:id',
      {
            templateUrl:'view/details.html',
            controller:'DetailsController'
      }).
      otherwise(
      {
                 // redirectTo:'/'
      });
    
}]);

app.controller('DetailsController', function($scope, $routeParams) 
{

      $scope.id = $routeParams.id;
     
      //callYelp(type,place);

      //$scope.whichItem=$routeParams.id;
});



app.controller("tasksController", function($scope, $http,$window) 
{
      //var place= "New York";
      //var type= "Restaurant";
      //callyelp(type,place);
      $scope.init=function ()
      {
            //$scope.alertBusiness=" ";
            var place= "New York";
            var type= "Restaurant";
            callYelp(type,place);
            callChat();
          
      }



       
      $scope.addBill= function()
      {
            var type=$scope.sort;
            var place=$scope.place;
           callYelp(type,place);
           // console.log("ENTRO AQUI");
           

      }

      $scope.mouseover= function()
      {
         
      }



      function callChat()
      {
            $http.get("bd/getInfo.php").success(
            function(data,status, headers, config)
            {
                  $scope.message=data;
            })
            .error(function(response, status, headers, config) 
            {
                  // called asynchronously if an error occurs
                  // or server returns response with an error status.
                       $scope.loading = false;
                        $scope.errors.push(status);
                        console.log("hello");
                         
            });
            

      }

      $scope.addMsg= function ()
      {
            var txt=$scope.txt;
            var title=$scope.name;

            if ((txt==null) && (title==null))
            {
                  $window.alert("Fill all the fields");
            }
            else
            {
                  $http.get("bd/addMsg.php?name="+title+"&message="+txt).success(
                  function(data,status, headers, config)
                  {
                        //$scope.message=data;
                        callChat();
                  })
                  .error(function(response, status, headers, config) 
                  {
                      
                               
                  });
            }
      }

      $scope.deleteMsg=function(idMessage)
      {
            var id=idMessage;
           
            $http.get("bd/deleteMsg.php?id="+id).success(
            function (data,status,headers,config)
            {
                  callChat();
            })
            .error(function(response, status, headers, config) 
            {
                
                  $scope.loading = false;
                  $scope.errors.push(status);
                  console.log("hello");       
            });


      }
      

      function checkDeals(info)
      {
          for (var i=0;i<info.lenght;i++)
          {
            if (info[i].deals.length==0)
            {
                  return true;
            }
            else
            {
                  return false;
            }
          }
      }


      function callYelp(type,place)
      {
            if ((type==null) && (place==null))
            {
                  $window.alert("Fill all the fields");
            }
            else
            {
                  $http.get("./yelpRequest.php?type="+type+"&place="+place).success(
                  function(response,status, headers, config)
                  {
                            
                        angular.forEach(response, function(answer)
                        {


                              var businesses=[];
                                  
                              for (var i=0;i<answer.length;i++)
                              {

                                          var obj={};
                                          obj["name"]=answer[i].name;
                                          obj["is_claimed"]=answer[i].is_claimed;
                                          obj["raiting"]=answer[i].rating;
                                          obj["ratingImg"]=answer[i].rating_img_url;
                                          obj["phone"]=answer[i].display_phone;
                                          obj["img"]=answer[i].image_url;
                                          obj["location"]=answer[i].location.address;
                                          obj["zipCode"]=answer[i].postal_code;
                                          obj["is_closed"]=answer[i].postal_code;
                                          obj["snippet_text"]=answer[i].snippet_text;
                                          obj["id"]=answer[i].id;

                                          if (answer[i].deals)
                                          {
                                                obj["deals"]=answer[i].deals;
                                          }
                                          else
                                          {
                                                obj["deals"]=0;
                                          }

                                          
                                          obj["snippetText"]=answer[i].snippet_text
                                          console.log (obj);
                                          businesses.push(obj);


                              }
                                   
                              
                              $scope.yelp=businesses;
                                     
                        });
                

                  })
                  .error(function(response, status, headers, config) 
                  {
                        // called asynchronously if an error occurs
                        // or server returns response with an error status.
                             $scope.loading = false;
                             $scope.errors.push(status);
                             console.log("hello");
                               
                  });

            }
      }



      
});

  