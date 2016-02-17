app.controller('BoardController', ['$scope', '$filter', '$http', 'blockUI', '$modal', '$log', function ($scope, $filter, $http, blockUI, $modal, $log) {

    $scope.currentPage = 1;
    $scope.totalItems = 0;
    $scope.pageSize = 6;
    $scope.query = '';
    getBoards();

    $scope.open = function () {
        $modal.open({
            templateUrl: 'myModalContent.html',
            backdrop: true,
            windowClass: 'modal',
            controller: function ($scope, $modalInstance, $log, user) {
                $scope.createBoard = function (board) {
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
            .success(function (res) {
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

    $scope.pageChanged = function (currentPage) {
        $scope.currentPage = currentPage;
        getBoards();
    }

    $scope.pageSizeChanged = function (pageSize) {
        $scope.pageSize = pageSize;
        $scope.currentPage = 1;
        getBoards();
    }

    $scope.searchBoard = function (query) {
        $scope.query = query;
        $scope.currentPage = 1;
        getBoards();
    }

    $scope.removeBoard = function (boardID) {
        $http({
            url: 'boards/removeBoard',
            method: "POST",
            data: {id: boardID},
            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
        })
            .success(function (response, status, headers, config) {
                toastr.error('Board has been removed successfully');
            })
            .error(function (response, status, headers, config) {
                toastr.error('Sorry, something went wrong');
            });
        getBoards();
    };

    $scope.editBoard = function (boardID) {
        $scope.board;
        $modal.open({
            templateUrl: 'editBoard.html',
            backdrop: true,
            windowClass: 'modal',
            controller: function ($scope, $modalInstance, $log, user) {

                $http({
                    url: 'boards/getBoardByID',
                    method: "POST",
                    data: {id: boardID},
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                })
                    .success(function (response, status, headers, config) {
                        $scope.board = response;

                    })
                    .error(function (response, status, headers, config) {
                        toastr.error('Sorry, something went wrong');
                    });

                $scope.editBoard = function (board) {

                    if ($scope.board.id) {
                        board.id = $scope.board.id;
                        $modalInstance.dismiss('cancel');
                        $http({
                            url: 'boards/edit',
                            method: "POST",
                            data: board,
                            headers: {'Content-Type': 'application/x-www-form-urlencoded'}
                        })
                            .success(function (response, status, headers, config) {
                                if (response == 1) {
                                    toastr.success('Board has been updated successfully');
                                }
                                else {
                                    toastr.error('Sorry, something went wrong');
                                }
                            })
                            .error(function (response, status, headers, config) {
                                toastr.error('Sorry, something went wrong');
                            });
                        getBoards();
                    }
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