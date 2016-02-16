<?php echo $this->assign('title', 'New User'); ?>

<div ng-controller="BoardController as BoardCtrl">

    <div>
        <h1 class="header pull-left">My Boards</h1>
        <button class="pull-right btn btn-raised btn-primary" ng-click="open()">New Board</button>
    </div>
    <div class="clearfix"></div>
    <hr class="divider"/>
    <br/>

    <div class="row">
        <div ng-if="1 > totalItems">
            <h4 class="red text-center">Sorry, you have no board</h4>
        </div>
        <div ng-if="0 < totalItems">
            <div class="col-lg-2 col-sx-12">
                <div class="form-group label-floating is-empty">
                    <label for="i52" class="control-label">Search board</label>
                    <input id="i52" class="form-control pull-left" ng-model="query" ng-blur="searchBoard(query)" />
                    <span class="material-input"></span>
                </div>
            </div>
            <div class="col-lg-10 col-sx-12">
                <div class="form-group label-floating is-empty per-page-show">
                    <label for="i53" class="control-label">Per page show</label>
                    <select id="i53" class="form-control" ng-model="pageSize" ng-change="pageSizeChanged(pageSize)">
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select>
                    <span class="material-input"></span>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-4" ng-repeat="board in boards | filter:query">
                <div class="brand-panel panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{board.name}}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <h4 class="list-group-item-heading">{{board.name}}</h4>
                        {{ board.description | characters:400 }}
                        <div class="pull-right delete-icons">
                            <a href="boards/view/{{board.uuid}}" class="green">
                                <i class="fa fa-gear t-icon"></i>
                            </a>
                            <a href="/bookmark/users/edit/e6a40e81-3b6d-4b88-96e2-bcb8afdf" class="lblue">
                                <i class="fa fa-pencil t-icon"></i>
                            </a>
                            <a class="red" ng-click="removeBoard(board.id)">
                                <i class="fa fa-times t-icon"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-12">
                <div class="dataTables_paginate paging_simple_numbers">
                    <div>{{endItem}} of {{totalItems}} entries</div>
                    <pagination total-items="totalItems" ng-model="currentPage" ng-change="pageChanged(currentPage)" items-per-page="pageSize" max-size="3" boundary-links="true"rotate="false">
                    </pagination>
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
echo $this->Html->script(array('angular'));
echo $this->Html->script(array('ui-bootstrap-tpls-0.12.0.js'));
echo $this->Html->script(array('application'));
echo $this->Html->script(array('angular-block-ui'));
echo $this->Html->script(array('toastr.min'));
echo $this->Html->script(array('truncate'));
$this->end();
?>

<script type="text/ng-template" id="myModalContent.html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title">New Board</h4>
            </div>
            <div class="modal-body">
                <form name="addNewTagForm" ng-submit="createBoard(board)">
                    <div class="form-group label-floating is-empty">
                        <label for="i5i" class="control-label">Your board name</label>
                        <input ng-model="board.name" class="form-control" id="i5i">
                        <span class="material-input"></span>
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="i55" class="control-label">Board description</label>
                        <textarea  id="i55" ng-model="board.description" class="form-control" rows="5"></textarea>
                        <span class="material-input"></span>
                    </div>
                    <button type="submit" class="btn btn-raised btn-primary">Save Board</button>
                </form>
            </div>
            <div class="modal-footer">
                <button ng-click="cancelRemoveModal()" type="button" class="btn btn-primary" data-dismiss="modal">
                    Dismiss
                    <div class="ripple-container">
                        <div class="ripple ripple-on ripple-out" style="left: 32.1562px; top: 31px; transform: scale(10.875); background-color: rgb(0, 150, 136);"></div>
                        <div class="ripple ripple-on ripple-out" style="left: 50.1562px; top: 19px; transform: scale(10.875); background-color: rgb(0, 150, 136);"></div>
                    </div>
                </button>
            </div>
        </div>
    </div>
</script>
