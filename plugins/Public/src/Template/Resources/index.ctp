<?php echo $this->assign('title', 'My Resources'); ?>

<div ng-controller="BookmarkController as bookmarkCtrl">

    <div>
        <h1 class="header pull-left">My Resources</h1>
        <button class="pull-right btn btn-raised btn-primary" ng-click="open()">New Resource</button>
    </div>
    <div class="clearfix"></div>
    <hr class="divider"/>
    <br/>

    <div class="row">
        <div ng-if="1 > totalItems">
            <h4 class="red text-center not-found">Sorry, you have no resources</h4>
        </div>
        <div ng-if="0 < totalItems">

            <div class="col-lg-2 col-sx-12">
                <div class="form-group label-floating is-empty">
                    <label for="i52" class="control-label">Search resource</label>
                    <input id="i52" class="form-control pull-left" ng-model="query" ng-blur="searchResource(query)" />
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

            <div class="col-lg-4 animate-repeat" ng-repeat="resource in resources | filter:query">
                <div class="resources-panel panel panel-primary animate-repeat">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            {{resource.label}}
                        </h3>
                    </div>
                    <div class="panel-body">
                        <h4 class="list-group-item-heading">{{resource.title}}</h4>

                        <div class="resource-thumb-img">
                            <img ng-if="resource.img" src="{{resource.img}}" class="img-thumbnail" alt="{{resource.title}}">
                            <div class="row text-center" ng-hide="resource.img">
                                <?php echo $this->Html->image('default.jpg', ['class' => 'img-thumbnail']);?>
                            </div>
                        </div>
                        <p>{{ resource.content | characters:200 }}</p>
                        <div class="pull-right delete-icons">
                            <a href="resources/view/{{resource.uuid}}" class="green">
                                <i class="fa fa-gear t-icon"></i>
                            </a>
                            <a ng-click="editBoard(resource.id)" class="lblue">
                                <i class="fa fa-pencil t-icon"></i>
                            </a>
                            <a class="red" ng-click="removeResource(resource.id)">
                                <i class="fa fa-times t-icon"></i>
                            </a>
                        </div>
                        <div class="resource-footer-part">
                            <div class="boards">
                                <strong>Board:</strong>
                                <span ng-repeat="board in resource.boards">
                                <a href="boards/view/{{board.uuid}}">{{board.name}}</a>
                                </span>
                            </div>
                            <div class="categories">
                                <strong>Category:</strong>
                                <label class="label label-info" ng-repeat="category in resource.categories">
                                    {{category.name}}
                                </label>
                            </div>
                            <a href="{{resource.url}}" target="_blank">{{resource.url | characters:45}}</a>
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


<script type="text/ng-template" id="createResourceModal.html">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true" ng-click="cancelRemoveModal()">×</button>
                <h4 class="modal-title">New Resource</h4>
            </div>
            <div class="modal-body">
                <div>
                    <div class="form-group label-floating is-empty">
                        <label for="i5i" class="control-label">Paste your url</label>
                        <input id="i5i" type="text" class="form-control" ng-model="url" ng-blur="getUrlResources(url)">
                    </div>

                    <div class="row text-center" ng-show="isAjaxCalled">
                        <?php echo $this->Html->image('ajax.gif');?>
                    </div>

                    <div class="row" ng-show="previewEnable">
                        <form name="addNewResourceForm" ng-submit="createResources(resource)">
                            <div class="panel-body">
                                <div class="form-group">
                                    <h3>{{resourceDetails.title}}</h3>
                                </div>

                                <div class="form-group">
                                    <div class="preview_img text-center">
                                        <img class="img-thumbnail"src="{{resourceDetails.img}}">
                                        <br/>
                                        <br/>
                                    </div>
                                    <p class="lead">{{resourceDetails.content}}</p>
                                </div>

                                <?php if(!$boards->isEmpty()):?>
                                <label for="i53" class="control-label">Select Boards</label>
                                <div class="form-group label-floating is-empty">
                                    <select ng-model="resource.BoardsIds" multiple="multiple" name="boards[_ids][]" class="form-control" id="i53">
                                        <?php foreach($boards as $board => $value): ?>
                                            <option value="<?php echo $board;?>"><?php echo $value;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php endif;?>

                                <label for="i54" class="control-label">Select Category</label>
                                <div class="form-group label-floating is-empty">
                                    <select ng-model="resource.CategoriesIds"  multiple="multiple" name="boards[_ids][]" class="form-control" id="i54">
                                        <?php foreach($categoriesList as $category => $value): ?>
                                            <option value="<?php echo $category;?>"><?php echo $value;?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group label-floating is-empty">
                                    <label for="i55" class="control-label">Custom Label</label>
                                    <input name="label" ng-model="resource.label" class="form-control" id="i55">
                                                <span class="material-input help-desk-error">
                                                    <div ng-messages="addNewResourceForm.label.$error" ng-if="addNewResourceForm.label.$touched">
                                                        <div ng-message="required">Label must be required required</div>
                                                    </div>
                                                </span>
                                </div>

                                <button type="submit" class="btn btn-raised btn-primary">Save Resource</button>

                            </div>
                        </form>
                    </div>
                </div>
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





<?php
$this->start('cssTop');
echo $this->Html->css(array('angular-block'));
echo $this->Html->css(array('toaster.min.css'));
echo $this->Html->css(array('jquery.tagsinput'));
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
echo $this->Html->script(array('controller/board'));
echo $this->Html->script(array('jquery.tagsinput'));
?>
<script type="text/javascript">
    $(function() {
        $('#tags').tagsInput({width:'auto'});
    });
</script>
<?php $this->end(); ?>

