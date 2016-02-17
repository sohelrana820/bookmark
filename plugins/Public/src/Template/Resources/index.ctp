<?php echo $this->assign('title', 'New User'); ?>

    <div>
        <h1 class="header pull-left">My Resources</h1>
        <button class="pull-right btn btn-raised btn-primary" ng-click="open()">New Resource</button>
    </div>
    <div class="clearfix"></div>
    <hr class="divider"/>
    <br/>

    <div class="row">
        <div class="col-xs-12">
            <div class="well page">
                <div ng-controller="BookmarkController as bookmarkCtrl">

                    <div class="clearfix">
                        <div class="form-group label-floating is-empty">
                        <label for="i5i" class="control-label">Paste your url</label>
                        <input id="i5i" type="text" class="form-control" ng-model="url" ng-blur="getUrlResources(url)">
                    </div>

                    <div class="form-group label-floating is-empty">
                        <label for="i52" class="control-label">Paste your url</label>
                        <select class="form-control" id="i52">
                            <?php foreach($boards as $board => $value): ?>
                                <option value="<?php echo $board;?>"><?php echo $value;?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>



                    <div class="row" ng-show="previewEnable">
                        <div class="col-lg-12">
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Bookmark Preview</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group">
                                        <h3 ng-model="urlTitle">{{resourceDetails.title}}</h3>
                                    </div>

                                    <div class="form-group">
                                        <div class="preview_img text-center">
                                            <img class="img-thumbnail" ng-model="urlImg" src="{{resourceDetails.img}}">
                                        </div>
                                        <p class="lead" ng-model="urlDescription">{{resourceDetails.content}}</p>
                                    </div>

                                    <div class="form-group">
                                        <button class="btn btn-info btn-lg" ng-click="saveResources()">Save as Bookmark</button>
                                    </div>
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
echo $this->Html->script(array('angular'));
echo $this->Html->script(array('ui-bootstrap-tpls-0.12.0.js'));
echo $this->Html->script(array('application'));
echo $this->Html->script(array('angular-block-ui'));
echo $this->Html->script(array('toastr.min'));
echo $this->Html->script(array('truncate'));
echo $this->Html->script(array('angular-messages'));
echo $this->Html->script(array('controller/board'));
$this->end();
?>