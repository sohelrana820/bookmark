 var app = angular.module('application', ['ui.bootstrap', 'blockUI', 'truncate', 'ngMessages']);

app.controller('BookmarkController', ['$scope', '$filter', '$http', 'blockUI', '$modal', '$log', function ($scope, $filter, $http, blockUI, $modal, $log) {

    $scope.resourceDetails = null;
    $scope.previewEnable = false;
    $scope.isAjaxCalled = false;


    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 6;
    $scope.query = '';
    getResources();

    function getResources() {
        blockUI.start();
        $http.get('resources/lists?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.query)
            .success(function (res) {
                $scope.activity = [];
                $scope.totalItems = res.count;
                $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;

                $scope.endItem = $scope.currentPage * $scope.pageSize;
                if (($scope.currentPage * $scope.pageSize) >= $scope.totalItems) {
                    $scope.endItem = $scope.totalItems;
                }

                console.log(res);

                $scope.resources = res.resources;
                blockUI.stop();
            }
        );
    }




    $scope.open = function () {
        $modal.open({
            templateUrl: 'createResourceModal.html',
            backdrop: true,
            windowClass: 'modal',
            controller: function ($scope, $modalInstance, $log, user) {

                $scope.getUrlResources = function (url) {
                    if(url && url != 'undefined'){
                        $scope.isAjaxCalled = true;
                        $http.get('resources/getRerouces?url=' + url)
                            .success(function(response)
                            {
                                console.log(response);
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
                    getResources();
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

    $scope.removeResource = function (boardID) {
        $http({
            url: 'resources/removeBoard',
            method: "POST",
            data: {id: boardID},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                toastr.error('Resource has been removed successfully');
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            });
        getResources();
    };


    $scope.searchResource = function (query) {
        $scope.query = query;
        $scope.currentPage = 1;
        getResources();
    }

    $scope.pageSizeChanged = function (pageSize) {
        $scope.pageSize = pageSize;
        $scope.currentPage = 1;
        getResources();
    }
}]);
