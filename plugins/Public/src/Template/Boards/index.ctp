<?php echo $this->assign('title', 'New User'); ?>

<div ng-controller="BoardController as BoardCtrl">


    <h1 class="header">My Board</h1>
    <hr class="divider"/>
    <br/>

    <div class="row">
        <div class="col-lg-6">
            <div class="well page active">
                <h3>New Board</h3>
                <form  name="addNewTagForm" ng-submit="createBoard(board)">

                    <div class="form-group label-floating is-empty">
                        <label for="i5i" class="control-label">Your board name</label>
                        <input ng-model="board.name" class="form-control" id="i5i">
                        <span class="help-block">Your board name</span>
                        <span class="material-input"></span>
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="i55" class="control-label">Board description</label>
                        <textarea  id="i55" ng-model="board.description" class="form-control" rows="5"></textarea>
                        <span class="help-block">Board description</span>
                        <span class="material-input"></span>
                    </div>

                    <div class="form-group">

                    </div>

                    <button type="submit" class="btn btn-raised btn-primary">Save Board</button>
                </form>
            </div>
        </div>

        <div class="col-xs-6">

            <div class="panel panel-info" ng-repeat="board in boards | filter:query">
                <div class="panel-heading">
                    <h3 class="panel-title">{{board.name}}</h3>
                </div>
                <div class="panel-body">
                    <div class="list-group">
                        <div class="list-group-item">
                            <div class="row-content">
                                <h4 class="list-group-item-heading">{{board.name}}</h4>
                                <p class="list-group-item-text">{{board.description}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div ng-if="1 > totalItems">
                        <h4 class="red text-center">Sorry, result not found</h4>
                    </div>
                    <div ng-if="0 < totalItems">
                        <div class="row">
                            <div class="col-lg-3">
                                <input class="form-control pull-left" ng-model="query" ng-blur="searchBoard(query)" placeholder="Search board"/>
                            </div>
                            <div class="col-lg-9">
                                <div class="pull-right" id="example_length">
                                    <label>Record per page</label>
                                    <select class="form-control" ng-init="pageSize = 5" ng-model="pageSize" ng-change="pageSizeChanged()">
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="25">25</option>
                                        <option value="50">50</option>
                                        <option value="100">100</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <table class="table theme-table">
                            <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr ng-repeat="board in boards | filter:query">
                                <td>
                                    <a href="boards/view/{{board.uuid}}" class="theme">
                                        {{board.name}}
                                    </a>
                                </td>
                                <td>
                                    {{board.description}}
                                </td>
                                <td>
                                    <div ng-if="1 == board.status">
                                        <label class="green text-uppercase">Active</label>
                                    </div>
                                    <div ng-if="0 == board.status">
                                        <label class="red text-uppercase">Inactive</label>
                                    </div>
                                </td>
                                <td class="text-right">
                                    <a href="boards/view/{{board.uuid}}" class="green">
                                        <i class="fa fa-gear t-icon"></i>
                                    </a>
                                    <a href="/bookmark/users/edit/e6a40e81-3b6d-4b88-96e2-bcb8afdf" class="lblue">
                                        <i class="fa fa-pencil t-icon"></i>
                                    </a>
                                    <a class="red" ng-click="removeBoard(board.id)">
                                        <i class="fa fa-times t-icon"></i>
                                    </a>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div>
                            <div class="dataTables_paginate paging_simple_numbers">
                                <div>{{endItem}} of {{totalItems}} entries</div>
                                <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged()"items-per-page="pageSize" max-size="3" boundary-links="true"rotate="false">
                                </pagination>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>

<?php
$this->start('cssTop');
echo $this->Html->css(array('angular-block'));
echo $this->Html->css(array('toaster.min.css'));
$this->end();
?>

<?php
$this->start('jsBottom');
echo $this->Html->script(['select2.full.min', 'datepicker']);
echo $this->Html->script(array('angular'));
echo $this->Html->script(array('ui-bootstrap-tpls-0.12.0.js'));
echo $this->Html->script(array('application'));
echo $this->Html->script(array('angular-block-ui'));
echo $this->Html->script(array('toastr.min'));
$this->end();
?>
