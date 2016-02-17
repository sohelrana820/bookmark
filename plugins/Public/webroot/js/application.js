 var app = angular.module('application', ['ui.bootstrap', 'blockUI', 'truncate', 'ngMessages']);

app.controller('BookmarkController', ['$scope', '$filter', '$http', function ($scope, $filter, $http) {

    $scope.resourceDetails = null;

    $scope.previewEnable = false;
    $scope.isAjaxCalled = false;

    $scope.getUrlResources = function (url) {

        if(url && url != 'undefined'){
            $scope.isAjaxCalled = true;
            $scope.previewEnable = true;

            $http.get('resources/getRerouces?url=' + url)
                .success(function(response)
                {
                    $scope.isAjaxCalled = false;
                    $scope.url = url;
                    $scope.previewEnable = true;
                    $scope.resourceDetails = response;
                }
            );
        }
    }

    $scope.saveResources = function(){

        $http({
            url: 'resources/add',
            method: "POST",
            data: $scope.resourceDetails,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                toastr.success('Bookmark has been saved successfully');
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            });
        $scope.previewEnable = false;
    }
}]);
