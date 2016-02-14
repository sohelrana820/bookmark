<?php echo $this->assign('title', 'New User'); ?>

<div ng-controller="BoardController as BoardCtrl">


    <div class="page-title">
        <span class="title">Boards</span>
        <div class="description">Your boards information</div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <div class="title">New Board</div>
                    </div>
                </div>
                <div class="card-body">
                    <form  name="addNewTagForm" ng-submit="newBoard(board)">
                        <div class="form-group">
                            <label>Name</label>
                            <input ng-model="board.name" class="form-control" placeholder="Board name">
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea  ng-model="board.description" placeholder="Board description" class="form-control" rows="5"></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Board</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>





<?php
$this->start('cssTop');
echo $this->Html->css(array('select2.min', 'datepicker'));
$this->end();

$this->start('jsTop');
$this->end();

$this->start('jsBottom');
echo $this->Html->script(['select2.full.min', 'datepicker']);
$this->end(); ?>