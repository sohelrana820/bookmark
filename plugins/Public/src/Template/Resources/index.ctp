<?php echo $this->assign('title', 'My Resources'); ?>

<div ng-controller="BookmarkController as bookmarkCtrl">

    <div>
        <h1 class="header pull-left">My Resources</h1>
        <button class="pull-right btn btn-raised btn-primary" ng-click="open()">New Resource</button>
    </div>
    <div class="clearfix"></div>
    <hr class="divider"/>
    <br/>

    <div class="well page">
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
                            </div>
                            <p class="lead">{{resourceDetails.content}}</p>
                        </div>

                        <label for="i53" class="control-label">Boards</label>
                        <div class="form-group label-floating is-empty">
                            <select ng-model="resource.BoardsIds" multiple="multiple" name="boards[_ids][]" class="form-control" id="i53">
                                <?php foreach($boards as $board => $value): ?>
                                    <option value="<?php echo $board;?>"><?php echo $value;?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <label for="i54" class="control-label">Category</label>
                        <div class="form-group label-floating is-empty">
                            <select ng-model="resource.CategoriesIds"  multiple="multiple" name="boards[_ids][]" class="form-control" id="i54">
                                <?php foreach($categories as $category => $value): ?>
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

                        <label for="tags" class="control-label">Tags</label>
                        <div class="form-group label-floating is-empty">
                            <input id="tags" ng-model="resource.tags" type="text" class="tags" />
                        </div>

                        <button type="submit" class="btn btn-raised btn-primary">Save Board</button>

                    </div>
                </form>
            </div>
        </div>
    </div>

</div>






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

