var app = angular.module('application', ['ui.bootstrap', 'blockUI']);

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


app.controller('BoardController', ['$scope', '$filter', '$http', 'blockUI', function ($scope, $filter, $http, blockUI) {

    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 5;
    $scope.query = '';
    getBoards();

    function getBoards() {
        blockUI.start();
        $http.get('boards/lists?page=' + $scope.currentPage + '&size=' + $scope.pageSize + '&search=' + $scope.query)
            .success(function(res)
            {
                $scope.activity = [];
                $scope.totalItems = res.count;
                $scope.startItem = ($scope.currentPage - 1) * $scope.pageSize + 1;
                $scope.endItem = $scope.currentPage * $scope.pageSize;
                $scope.boards = res.boards;
                blockUI.stop();
            }
        );
    }

    $scope.pageChanged = function() {
        getBoards();
    }

    $scope.pageSizeChanged = function() {
        $scope.currentPage = 1;
        getBoards();
    }

    $scope.searchTextChanged = function(query) {
        $scope.query = query;
        $scope.currentPage = 1;
        getBoards();
    }

    $scope.tag = '';

    $scope.newBoard = function(board) {
        $http({
            url: 'boards/add',
            method: "POST",
            data: board,
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                console.log(response);
                /*toastr.success('Tag has been saved successfully');*/
                /*$scope.tags.unshift(response);*/
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            });

        getBoards();
    };

    $scope.removeBoard = function(boardID) {
        $http({
            url: 'boards/removeBoard',
            method: "POST",
            data: {id: boardID},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                console.log(response);
                /*toastr.success('Tag has been saved successfully');*/
                /*$scope.tags.unshift(response);*/
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            });
        getBoards();
    };
}]);