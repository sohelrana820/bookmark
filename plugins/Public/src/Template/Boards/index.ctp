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
            <h4 class="red text-center not-found">Sorry, you have no board</h4>
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
                        <option value="9">9</option>
                        <option value="12">12</option>
                        <option value="15">15</option>
                    </select>
                    <span class="material-input"></span>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="col-lg-4 animate-repeat" ng-repeat="board in boards | filter:query">
                <div class="brand-panel panel panel-primary animate-repeat">
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
                            <a ng-click="editBoard(board.id)" class="lblue">
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
echo $this->Html->script(array('angular-messages'));
echo $this->Html->script(array('controller/bookmark'));
$this->end();
?>


<script type="text/ng-template" id="myModalContent.html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="cancelRemoveModal()">×</button>
                <h4 class="modal-title">New Board</h4>
            </div>
            <div class="modal-body">
                <form name="addNewBoardForm" ng-submit="createBoard(board)" novalidate>
                    <div class="form-group label-floating is-empty">
                        <label for="i5i" class="control-label">Your board name</label>
                        <input name="name" ng-model="board.name" class="form-control" id="i5i" required>
                        <span class="material-input help-desk-error">
                            <div ng-messages="addNewBoardForm.name.$error" ng-if="addNewBoardForm.name.$touched">
                                <div ng-message="required">Board name must be required required</div>
                            </div>
                        </span>
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="i55" class="control-label">Board description</label>
                        <textarea name="description" id="i55" ng-model="board.description" class="form-control" rows="5" required></textarea>
                        <span class="material-input help-desk-error">
                            <div ng-messages="addNewBoardForm.description.$error" ng-if="addNewBoardForm.description.$touched">
                                <div ng-message="required">Board description must be required required</div>
                            </div>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-raised btn-primary" ng-disabled="addNewBoardForm.$invalid">Save Board</button>
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

<script type="text/ng-template" id="editBoard.html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="cancelRemoveModal()">×</button>
                <h4 class="modal-title">New Board</h4>
            </div>
            <div class="modal-body">
                <form name="addNewBoardForm" ng-submit="editBoard(board)" novalidate>
                    <div class="form-group label-floating is-empty is-focused">
                        <label for="i5i" class="control-label">Your board name</label>
                        <input name="name" ng-model="board.name" class="form-control" id="i5i" required value="{{name}}">
                        <span class="material-input help-desk-error">
                            <div ng-messages="addNewBoardForm.name.$error" ng-if="addNewBoardForm.name.$touched">
                                <div ng-message="required">Board name must be required required</div>
                            </div>
                        </span>
                    </div>

                    <div class="form-group label-floating is-empty is-focused">
                        <label for="i55" class="control-label">Board description</label>
                        <textarea name="description" id="i55" ng-model="board.description" class="form-control" rows="5" required></textarea>
                        <span class="material-input help-desk-error">
                            <div ng-messages="addNewBoardForm.description.$error" ng-if="addNewBoardForm.description.$touched">
                                <div ng-message="required">Board description must be required required</div>
                            </div>
                        </span>
                    </div>
                    <button type="submit" class="btn btn-raised btn-primary" ng-disabled="addNewBoardForm.$invalid">Update Board</button>
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
