<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'users';
    require APPROOT . '/views/includes/sidebar.php';
    
?>

<section class="admin section">
    <div class="users__container container">
            <div class="users__title">
                Users
            </div>
            <form action="" method="post" class="search">
            <div class="search__item">
                <input type="text" class="form__input search__input" name="search" placeholder="Search">
                <span class="invalidFeedback">
                    <?php echo $data['searchError']; ?>
                </span>
                <button class="form__btn search__btn" id="search">search</button>
            </div>
            </form>
                        
        
        <div class="table__content">
        <table class="content-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Created at</th>
                        <th align="center" colspan="2">Action</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data['searchItem'])):?>

                    <?php foreach($data['users'] as $user):?>
                
                    <tr>
                       <td><?php echo $user->firstname . " " . $user->lastname; ?></td>
                       <td><?php echo $user->email; ?></td>
                       <td><?php echo $user->created_at; ?></td>
                       <td>
                           <a class="form__btn edit__btn" href="<?php echo URLROOT . "/admins/updateUser/" . $user->id?>">Edit</a>
                       </td>
                       <td>
                           
                           <a  href="<?php echo URLROOT . "/admins/deleteUser/" . $user->id?> "class="form__btn delete__btn" id="modal-btn">Delete</a>
                       </td>

                    </tr>
                   <?php endforeach;?>
                   <?php endif;?>
                    <?php if(!empty($data['searchItem'])):?>

                    <?php foreach($data['searchItem'] as $search):?>
                
                    <tr>
                       <td><?php echo $search->firstname . " " . $search->lastname; ?></td>
                       <td><?php echo $search->email; ?></td>
                       <td><?php echo $search->created_at; ?></td>
                       <td>
                           <a class="form__btn edit__btn" href="<?php echo URLROOT . "/admins/updateUser/" . $search->id?>">Edit</a>
                       </td>
                       <td>
                           <a  href="<?php echo URLROOT . "/admins/deleteUser/" . $search->id?> "class="form__btn delete__btn" id="modal-btn">Delete</a>
                       </td>

                    </tr>
                   <?php endforeach;?>
                   <?php endif;?>

                   
                </tbody>
               
            </table>
        </div>
    </div>
</section>