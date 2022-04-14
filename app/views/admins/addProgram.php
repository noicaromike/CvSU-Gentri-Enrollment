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
    <div class="programcontainer container">
        <div class="program__title">
            Programs
        </div>
        <form action="<?php echo URLROOT;?>/admins/addProgram" enctype="multipart/form-data" method="POST">
        <div class="form__item">
            <label for="image" class="form__label">Upload Image</label>
            <input type="file" class="form__input" name="image"placeholder="">
            <span class="invalidFeedback">
                <?php echo $data['imageError']; ?>
             </span>
        </div>
        <div class="form__item">
            <label for="name" class="form__label">Title</label>
            <input type="text" class="form__input" name="name" placeholder="Enter Program">
            <span class="invalidFeedback">
                <?php echo $data['nameError']; ?>
             </span>
        </div>
        <div class="form__item">
            <label for="description" class="form__label">description</label>
            <textarea name="description" class="form__input" id="" cols="30" rows="10"></textarea>
            <span class="invalidFeedback">
                <?php echo $data['descriptionError']; ?>
             </span>
        </div>
        <div class="form__item program__item">
            <button type="submit" class="form__btn program__btn">Save</button>
        </div>
        </form>
    </div>
</section>