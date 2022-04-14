<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'onlineapproval';
    require APPROOT . '/views/includes/sidebar.php';
    
?>

<section class="admin section">
    <div class="users__container container">
            <div class="onlineapproval__title">
                    Online Approval
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
                        <th>Action</th>
                        <th >Status</th>
                        <th>Control No.</th>
                        <th>Semester</th>
                        <th>Year</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Contact No.</th>
                        
                        
                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php if(empty($data['searchItem'])):?>

                    <?php foreach($data['applicant'] as $appli):?>
                
                    <tr>
                        <?php if($appli->status != "Pre-Enrolled"):?>
                        <td>
                           <a class="form__btn edit__btn" href="<?php echo URLROOT . "/admins/viewUser/" . $appli->users_id?>">View</a>
                       </td>
                       <?php else:?>
                        <td>
                           <a class="form__btn edit__btn" href="<?php echo URLROOT . "/admins/officialEnrolled/" . $appli->users_id?>">View</a>
                       </td>
                       <?php endif;?>

                       <td><?php echo $appli->status; ?></td>
                       <td><?php echo $appli->control_no; ?></td>
                       <td><?php echo $appli->semester; ?></td>
                       <td><?php echo $appli->academic_year; ?></td>
                       <td><?php echo $appli->firstName . " " . $appli->LastName; ?></td>
                       <td><?php echo $appli->applicantEmail; ?></td>
                       <td><?php echo $appli->applicantContact; ?></td>
                       
                       
                       
                      

                    </tr>
                   <?php endforeach;?>
                   <?php endif;?>
                    <?php if(!empty($data['searchItem'])):?>

                        <?php foreach($data['searchItem'] as $search):?>
                
                    <tr>
                        <?php if($search->status != "Pre-Enrolled"):?>
                        <td>
                           <a class="form__btn edit__btn" href="<?php echo URLROOT . "/admins/viewUser/" . $search->users_id?>">View</a>
                       </td>
                       <?php else:?>
                        <td>
                           <a class="form__btn edit__btn" href="<?php echo URLROOT . "/admins/officialEnrolled/" . $search->users_id?>">View</a>
                       </td>
                       <?php endif;?>
                       <td><?php echo $search->status; ?></td>
                       <td><?php echo $search->control_no; ?></td>
                       <td><?php echo $search->semester; ?></td>
                       <td><?php echo $search->academic_year; ?></td>
                       <td><?php echo $search->firstName . " " . $search->LastName; ?></td>
                       <td><?php echo $search->applicantEmail; ?></td>
                       <td><?php echo $search->applicantContact; ?></td>
                       

                    </tr>
               <?php endforeach;?>
               <?php endif;?>

                   
                </tbody>
               
            </table>
        </div>
    </div>
</section>
