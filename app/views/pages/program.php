<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/navigation.php';
    
?>
<?php
    require APPROOT . '/views/includes/splash_screen.php';
    
?>


<section class="section container">
    <div class="program__container">
        <h1>Programs</h1>
        <?php foreach($data['programs'] as $program) : ?>
        <div class="program__content grid">
            <div class="program__img">
                <img src="<?php echo URLROOT . '/public/applicantimage/' . $program->image;?>"   alt="">
            </div>
            <div class="program__text">
                <h3><?php echo $program->name;?></h3>
                <p>
                    <?php echo $program->description;?>
                </p>
            </div>
           
        </div>
        <?php endforeach;?>
    </div>
</section>