<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'admin';
    require APPROOT . '/views/includes/sidebar.php';
    
?>

<section class="admin section">
    <div class="dashboard container">
        <div class="dashboard__title">
            Academic Year
        </div>
        
        <div class="grid3">
            <?php if(semStart()):?>
            <div class="form__item">
                <input disabled type="text" class="form__input" name="semester" id="" value="<?php echo $_SESSION['year'] . " " . $_SESSION['semester']?>">
            </div>
            <?php else:?>
                <div class="form__item">
                    <input disabled type="text" class="form__input" name="semester" id="" value="" placeholder="Please Set Academic year">
                </div>
            <?php endif;?>
            <div class="form__item">
                <a href="<?php echo URLROOT;?>/admins/semester" class="form__btn green small__btn">Set</a>
            
            </div>
           
        </div>

        <div class="grid3 margin">
            <div class="form">
                <div class="form__title">
                    <p>Number of Approval</p>
                    <?php if(!empty($data['totalApproval'])):?>
                    <h2 class="margin"><?php echo $data['totalApproval']?></h2>
                    <?php endif;?>
                    <?php if(empty($data['totalApproval'])):?>
                    <h2 class="margin">0</h2>
                    <?php endif;?>

                </div>
            </div>
            <div class="form">
                <div class="form__title">
                    <p>Enrolled Student</p>
                    <?php if(!empty($data['totalEnrolled'])):?>
                    <h2 class="margin"><?php echo $data['totalEnrolled']?></h2>
                    <?php endif;?>
                    <?php if(empty($data['totalEnrolled'])):?>
                    <h2 class="margin">0</h2>
                    <?php endif;?>

                </div>
            </div>
            <div class="form">
                <div class="form__title">
                   <p>Total Users</p>
                   <?php if(!empty($data['total_users'])):?>
                   <h2 class="margin"><?php echo $data['total_users']?></h2>
                   <?php endif;?>
                   <?php if(empty($data['total_users'])):?>
                    <h2 class="margin">0</h2>
                    <?php endif;?>


                </div>
            </div>
        </div>
        <div class="grid3">
            <div class="form">
                <div class="form__title">
                    <p>Total Program</p>
                   <?php if(!empty($data['totalProgram'])):?>
                    <h2 class="margin"><?php echo $data['totalProgram']?></h2>
                   <?php endif;?>
                   <?php if(empty($data['totalProgram'])):?>
                    <h2 class="margin">0</h2>
                    <?php endif;?>


                </div>
            </div>
            <div class="form">
                <div class="form__title">
                    <p>Total Course</p>
                   <?php if(!empty($data['totalCourse'])):?>
                    <h2 class="margin"><?php echo $data['totalCourse']?></h2>
                   <?php endif;?>
                   <?php if(empty($data['totalCourse'])):?>
                    <h2 class="margin">0</h2>
                    <?php endif;?>


                </div>
            </div>
            <div class="form">
                <div class="form__title">
                    <p>Total Semester</p>
                   <?php if(!empty($data['total_semester'])):?>
                    <h2 class="margin"><?php echo $data['total_semester']?></h2>
                   <?php endif;?>
                   <?php if(empty($data['total_semester'])):?>
                    <h2 class="margin">0</h2>
                    <?php endif;?>

                </div>
            </div>
        </div>
       
        
        
       
    </div>
</section>

