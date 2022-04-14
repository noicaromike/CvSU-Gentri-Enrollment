<?php
    require APPROOT . '/views/includes/header.php';
    
?>
<?php
    require APPROOT . '/views/includes/admin_header.php';
    
?>
<?php
    
    require APPROOT . '/views/includes/sidebar.php';
    
?>


<section class="admin section">
    <div class="reject container">
        <div class="reject__title">
            Reason for rejecting.
        </div>
      <form action="" method="POST">
          <?php echo $data['email'];?>
        <div class="grid3">
        <div class="form__item">
            <label for="subject" class="form__label">Subject</label>
            <input type="text" class="form__input" name="subject" placeholder="Enter Subject">
            <span class="invalidFeedback">
                    <?php echo $data['subjectError']; ?>
            </span>
        </div>
        </div>
        <div class="grid3">
        <div class="form__item">
            <label for="" class="form__label">Message</label>
            <textarea class="form__input" name="message" id="" cols="30" rows="10">
                
            </textarea>
            <span class="invalidFeedback">
                    <?php echo $data['messageError']; ?>
            </span>
        </div>
        </div>
        <div class="grid3">
            
            <div class="form__item">
                <button type="submit"class="form__btn">Send</button>
            </div>

        </div>
        </form>
    </div>
</section>