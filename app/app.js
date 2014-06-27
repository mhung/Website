


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

      $scope.whichItem=$routeParams.id;

      if ($routeParams.id>0)
      {
            $scope.prevItem=Number($routeParams.id)-1;

      }
      else
      {
            $scope.prevItem=$scope.yelp.length-1;
      }

       if ($routeParams.id<$scope.yelp.length-1)
      {
            $scope.nextItem=Number($routeParams.id)+1;

      }
      else
      {
            $scope.nextItem=0;
      }
      

     /* $location.hash($scope.id);
      $timeout(function()
      {
         $anchorScroll();   
      });*/
      
      //callYelp(type,place);

      //$scope.whichItem=$routeParams.id;
});



app.controller("tasksController", function($scope, $http,$window) 
{
     
      $scope.init=function ()
      {
           $scope.sort="Restaurant";
           $scope.place="New York";
            var place= "New York";
            var type= "Restaurant";
            callYelp(type,place);
            callChat();



          
      }


      function checkDeal()
      {
            var cont=0;
            for (var i=0;i<$scope.yelp.length;i++)
            {
                  if ($scope.yelp[i].contDeals==0)
                  {

                  }
                  else
                  {
                        cont=cont+1;
                 
                  }
                 

            }
            if (cont<1)
            {
                  $scope.alertDeal="Sorry! No deals for this moment";
            }
            else
            {
                  $scope.alertDeal=" ";
            }

      }


       
      $scope.addBill= function()
      {
            var type=$scope.sort;
            var place=$scope.place;
           callYelp(type,place);
           
           

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
                        $scope.name="";
                        $scope.txt="";
                        callChat();
                        $window.alert("Thank you for adding a comment.");
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
                  
                  $scope.name="";
                  $scope.txt="";
                  callChat();
                  $window.alert("You have deleted an item.");

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
                              var cont=0;
                              var contDeals=0;
                              for (var i=0;i<answer.length;i++)
                              {
                                          //cont=cont+1;

                                          var obj={};
                                          obj["idItem"]=cont;
                                          obj["name"]=answer[i].name;
                                          obj["is_claimed"]=answer[i].is_claimed;                                          
                                          obj["raiting"]=answer[i].rating;
                                          obj["ratingImg"]=answer[i].rating_img_url;
                                          obj["phone"]=answer[i].display_phone;
                                          obj["img"]=answer[i].image_url;
                                          
                                         
                                          obj["location"]=answer[i].location.address[0];
                                         

                                          obj["zipCode"]=answer[i].postal_code;
                                          obj["is_closed"]=answer[i].postal_code;
                                          obj["snippet_text"]=answer[i].snippet_text;
                                          obj["snippet_image_url"]=answer[i].snippet_image_url;
                                          obj["id"]=answer[i].id;
                                          obj["categories"]=answer[i].categories[0][0];
                                          //obj["reviews"]=answer[i].reviews;

                                          if (answer[i].deals)
                                          {
                                                obj["deals"]=answer[i].deals;
                                                obj["contDeals"]=contDeals+1;
                                          }
                                          else
                                          {
                                                obj["contDeals"]=contDeals;
                                                obj["deals"]=0;
                                          }

                                          cont++;
                                          
                                          
                                          console.log (obj);
                                          businesses.push(obj);


                              }
                                   
                              
                              $scope.yelp=businesses;
                              checkDeal();       
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

  