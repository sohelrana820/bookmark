<?php echo $this->assign('title', 'New User'); ?>

    <div class="page-title">
        <span class="title">Bookmark</span>
        <div class="description">Provide all information for adding  new user</div>
    </div>

    <div class="row">
        <div class="col-xs-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        Bookmark
                    </div>
                </div>
                <div class="card-body">
                    <div ng-controller="BookmarkController as bookmarkCtrl">
                        <div>
                            <input type="text" class="form-control" ng-model="url" ng-blur="getUrlResources(url)" placeholder="Paste your url">
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
    </div>



<?php
$this->start('cssTop');
echo $this->Html->css(array('select2.min', 'datepicker','all'));
$this->end();

$this->start('jsTop');
echo $this->Html->script(array('country'));
$this->end();

$this->start('jsBottom');
echo $this->Html->script(['select2.full.min', 'datepicker']);
?>

    <script language="javascript">
        populateCountries("country", "state");
    </script>

<?php $this->end(); ?>