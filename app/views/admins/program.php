<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    $page = 'program';
    require APPROOT . '/views/includes/sidebar.php';
    
?>


<section class="admin section">
    <div class="container">
        <div class="program__title">
            Programs
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
        <div class="form__item">
            <a href="<?php echo URLROOT;?>/admins/addProgram" class="form__btn program__btn green">Add</a>
        </div>
        <?php if(empty($data['searchItem'])): ?>
        <?php foreach($data['programs'] as $program):?>
        <div class="program__form form">
        <div class="program__grid">
            <div class="form__item">
                <label for="" class="form__label"><?php echo $program->name;?></label>
                    <div class="images">
                        <img src="<?php echo URLROOT . '/public/applicantimage/' . $program->image;?>" alt="">
                    </div>
            </div>
            <div class="form__item program__item">
                <p><?php echo $program->description;?></p>
            </div>
            <div class="form__item program__item">
                <div class="grid3">
                    <a href="<?php echo URLROOT . '/admins/editProgram/' . $program->id;?>" class="form__btn greeny">Edit</a>
                    <a href="<?php echo URLROOT . '/admins/deleteProgram/' . $program->id;?>" class="form__btn  red">Delete</a>
                </div>
            </div>
        </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>

        <?php if(!empty($data['searchItem'])): ?>
        <?php foreach($data['searchItem'] as $search):?>
        <div class="program__form form">
        <div class="program__grid">
            <div class="form__item">
                <label for="" class="form__label"><?php echo $search->name;?></label>
                    <div class="images">
                        <img src="<?php echo URLROOT . '/public/applicantimage/' . $search->image;?>" alt="">
                    </div>
            </div>
            <div class="form__item program__item">
                <p><?php echo $search->description;?></p>
            </div>
            <div class="form__item program__item">
                <div class="grid3">
                    <a href="<?php echo URLROOT . '/admins/editProgram/' . $search->id;?>" class="form__btn program__btn greeny">Edit</a>
                    <a href="<?php echo URLROOT . '/admins/deleteProgram/' . $search->id;?>" class="form__btn program__btn red">Delete</a>
                </div>
            </div>
        </div>
        </div>
        <?php endforeach;?>
        <?php endif;?>
    </div>
</section>