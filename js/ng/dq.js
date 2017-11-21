var app = angular.module("dq", ["ngRoute"]);
app.config(['$routeProvider', '$provide', function ($routeProvider, $provide) {
        $routeProvider
                .when('/', {
                    redirectTo: '/dashboard'
                })
                .when('/:page', {// we can enable ngAnimate and implement the fix here, but it's a bit laggy
                    templateUrl: function ($routeParams) {
                        return 'views/' + $routeParams.page + '.php';
                    },
                    controller: 'GlobalController'
                            //controller: 'PageViewController'
                })
                .when('/:page/:child*', {
                    templateUrl: function ($routeParams) {
                        return 'views/' + $routeParams.page + '/' + $routeParams.child + '.php';
                    },
                    controller: 'GlobalController'
                })
                .otherwise({
                    redirectTo: '/dashboard'
                });
    }]);

app.filter('hideIfEmptyDate', function ($filter) {
    return function (dateString, format) {
        if ((dateString == "0000-00-00") || (dateString == '0') || (dateString == null) || (dateString == "-2211773400000")) {
            return "-";
        } else {
            return $filter('date')(dateString, format.toString());
        }
    };
});
app.directive('formattedDate', function (dateFilter) {
    return {
        require: 'ngModel',
        scope: {
            format: "="
        },
        link: function (scope, element, attrs, ngModelController) {
            ngModelController.$parsers.push(function (data) {
                formattedDate = "";
                dateSplitted = '';
                if (data != "" && data != 'NULL' && data != '0000-00-00' && data != null) {
                    var dateSplitted = data.split('-');
                    var formattedDate = dateSplitted[2] + '-' + dateSplitted[1] + '-' + dateSplitted[0];
                    //convert data from view format to model format
                }
                return formattedDate; //converted
            });
            ngModelController.$formatters.push(function (data) {
                //convert data from model format to view format
                if (data != "" && data != 'NULL' && data != '0000-00-00' && data != null) {
                    return dateFilter(data, 'dd-MM-yyyy'); //converted
                }
            });
        }
    };
});
app.controller('GlobalController', function ($scope,$window) {
    $scope.goto = function (url) {
        $window.location.href = '#/' + url;
    }
});
app.controller('QuestionsController', function ($scope, $http) {
    $http.get("api/getQuestions/1").success(function (data) {
        $scope.QuestionsList = data;
    });
    $scope.toTimeStamp = function (date) {
        var dateTime = date.split(' ');
        var dateSplitted = dateTime[0].split('-'); // date must be in DD-MM-YYYY format
        var formattedDate = dateSplitted[1] + '/' + dateSplitted[2] + '/' + dateSplitted[0];
        formattedDate = formattedDate + ' ' + dateTime[1];
        return new Date(formattedDate).getTime();
    };
});
  