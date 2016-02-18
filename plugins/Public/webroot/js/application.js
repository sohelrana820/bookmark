 var app = angular.module('application', ['ui.bootstrap', 'blockUI', 'truncate', 'ngMessages']);

app.controller('BookmarkController', ['$scope', '$filter', '$http', 'blockUI', '$modal', '$log', function ($scope, $filter, $http, blockUI, $modal, $log) {

    $scope.resourceDetails = null;
    $scope.previewEnable = false;
    $scope.isAjaxCalled = false;




    $scope.open = function () {
        $modal.open({
            templateUrl: 'createResourceModal.html',
            backdrop: true,
            windowClass: 'modal',
            controller: function ($scope, $modalInstance, $log, user) {

                $scope.getUrlResources = function (url) {
                    if(url && url != 'undefined'){
                        $scope.isAjaxCalled = true;
                        //$scope.previewEnable = true;

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

                $scope.createResources = function (resource) {
                    $scope.resourceDetails.boards = resource.BoardsIds;
                    $scope.resourceDetails.categories = resource.CategoriesIds;
                    $scope.resourceDetails.label = resource.label;
                    $scope.resourceDetails.tags = resource.tags;

                    $http({
                        url: 'resources/add',
                        method: "POST",
                        data: $scope.resourceDetails,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                        .success(function (response, status, headers, config) {
                            toastr.success('Resource has been saved successfully');
                            console.log(response);
                        })
                        .error(function (response, status, headers, config) {
                            toastr.error('Sorry, something went wrong');
                        });
                    $scope.previewEnable = false;
                    $modalInstance.dismiss('cancel');
                };
                $scope.cancelRemoveModal = function () {
                    $modalInstance.dismiss('cancel');
                };


                $scope.cancelRemoveModal = function () {
                    $modalInstance.dismiss('cancel');
                };
            },
            resolve: {
                user: function () {
                    return $scope.user;
                }
            }
        });
    };

}]);
