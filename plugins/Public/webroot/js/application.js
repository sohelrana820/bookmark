 var app = angular.module('application', ['ui.bootstrap', 'blockUI', 'truncate']);

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
                    console.log(response);
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


app.controller('BoardController', ['$scope', '$filter', '$http', 'blockUI', '$modal', '$log', function ($scope, $filter, $http, blockUI, $modal, $log) {

    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 5;
    $scope.query = '';
    getBoards();

    $scope.open = function () {
        $modal.open({
            templateUrl: 'myModalContent.html',
            backdrop: true,
            windowClass: 'modal',
            controller: function ($scope, $modalInstance, $log, user) {
                $scope.user = user;
                $scope.createBoard = function(board) {
                    $modalInstance.dismiss('cancel');
                    $http({
                        url: 'boards/add',
                        method: "POST",
                        data: board,
                        headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                    })
                        .success(function (response, status, headers, config) {
                            toastr.success('Board has been created successfully');
                        })
                        .error(function (response, status, headers, config) {
                            toastr.error('Sorry, something went wrong');
                        });
                    getBoards();
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


    function getBoards() {
        blockUI.start();
        $http.get('boards/lists?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.query)
            .success(function(res)
            {
                $scope.activity = [];
                $scope.totalItems = res.count;
                $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;

                $scope.endItem = $scope.currentPage * $scope.pageSize;
                if (($scope.currentPage * $scope.pageSize) >= $scope.totalItems) {
                    $scope.endItem = $scope.totalItems;
                }

                $scope.boards = res.boards;
                blockUI.stop();
            }
        );
    }

    $scope.pageChanged = function(currentPage) {
        console.log(currentPage);
        $scope.currentPage = currentPage;
        getBoards();
    }

    $scope.pageSizeChanged = function(pageSize) {
        $scope.pageSize = pageSize;
        $scope.currentPage = 1;
        getBoards();
    }

    $scope.searchBoard = function(query) {
        $scope.query = query;
        $scope.currentPage = 1;
        getBoards();
    }

    $scope.tag = '';



    $scope.removeBoard = function(boardID) {
        $http({
            url: 'boards/removeBoard',
            method: "POST",
            data: {id: boardID},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                toastr.error('Board has been remopved');
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            });
        getBoards();
    };
}]);