<?php echo $this->assign('title', 'Users List'); ?>

<div class="page-title">
    <span class="title">Users List</span>
    <div class="description">All application users</div>
</div>

<div class="row">
    <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                        <?php
                        echo $this->Html->link('New User', ['controller' => 'users', 'action' => 'add'], ['class' => 'btn btn-primary btn-theme', 'escape' => false]);
                        ?>
                    </div>

                </div>
                <div class="card-body">
                    <?php if(!$users->isEmpty()):?>
                    <table class="table theme-table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>City</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach($users as $user):?>
                            <tr>
                                <td>
                                    <?php echo $this->Html->link($user->profile->name, ['controller' => 'users', 'action' => 'view', $user->uuid], ['class' => 'theme']); ?>
                                </td>
                                <td>
                                    <?php echo $user->username; ?>
                                </td>
                                <td>
                                    <?php
                                    if($user->profile->phone)
                                    {
                                        echo $user->profile->phone;
                                    }
                                    else{
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($user->role == 1)
                                    {
                                        echo '<label>Admin</label>';
                                    }
                                    else{
                                        echo '<label>General</label>';
                                    }
                                    ?>
                                </td>

                                <td>
                                    <?php
                                    if($user->profile->city)
                                    {
                                        echo $user->profile->city;
                                    }
                                    else{
                                        echo 'N/A';
                                    }
                                    ?>
                                </td>
                                <td>
                                    <?php
                                    if($user->status)
                                    {
                                        echo '<label class="green text-uppercase">Active</label>';
                                    }
                                    else{
                                        echo '<label class="red text-uppercase">Inactive</label>';
                                    }
                                    ?>
                                </td>
                                <td class="text-right">

                                    <?php

                                    echo $this->Html->link('<i class="fa fa-gear t-icon"></i>', ['controller' => 'users', 'action' => 'view', $user->uuid], ['escape' => false, 'class' => 'green']);

                                    if($user->role == 2){
                                        echo $this->Html->link('<i class="fa fa-pencil t-icon"></i>', ['controller' => 'users', 'action' => 'edit', $user->uuid], ['escape' => false, 'class' => 'lblue']);
                                        echo $this->Html->link('<i class="fa fa-times t-icon"></i>',
                                            [
                                                'controller' => 'users',
                                                'action' => 'delete',
                                                $user->id
                                            ],
                                            [
                                                'escape' => false,
                                                'class' => 'red',
                                                'confirm' => __('Are you sure you want to delete this user?', $user->id)
                                            ]
                                        );
                                    }
                                    else{
                                        echo '<span class="lblue"><i class="fa fa-pencil t-icon"></i></span>';
                                        echo '<span class="red"><i class="fa fa-times t-icon"></i></span>';
                                    }

                                    ?>

                                </td>
                            </tr>
                        <?php endforeach;?>
                        </tbody>
                    </table>
                    <div class="paginator pull-right">
                        <ul class="pagination">
                            <?php echo $this->Paginator->prev(__('«')) ?>
                            <?php echo $this->Paginator->numbers() ?>
                            <?php echo $this->Paginator->next(__('»')) ?>
                        </ul>
                        <p><?php echo $this->Paginator->counter() ?></p>
                    </div>
                    <?php else:?>
                        <?php echo $this->element('not_found');?>
                    <?php endif;?>
                </div>
            </div>
    </div>
</div>
<?php $this->start('jsBottom'); ?>
<?php $this->end(); ?>
