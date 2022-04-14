
<section class="admin__sidebar section">
    <div class="admin__container container">
        <div class="sidebar-menu form">
                <div class="close-menu">
                    <i class="ri-close-line"></i>
                </div>
            <nav class="sidebar__nav">
                <a href="<?php echo URLROOT; ?>/admins/admin" class="sidebar__link <?php if($page=='admin'){echo 'actived';}?>">Dashboard</a>
                <a href="<?php echo URLROOT; ?>/admins/onlineapproval" class="sidebar__link  <?php if($page=='onlineapproval'){echo 'actived';}?>">Online approval</a>
                <a href="<?php echo URLROOT; ?>/admins/enrolled" class="sidebar__link <?php if($page=='enrolled'){echo 'actived';}?>">Enrolled student</a>
                <a href="<?php echo URLROOT; ?>/admins/program" class="sidebar__link <?php if($page=='program'){echo 'actived';}?>">Program</a>
                <a href="<?php echo URLROOT; ?>/admins/course" class="sidebar__link <?php if($page=='course'){echo 'actived';}?>">Courses</a>
                <a href="<?php echo URLROOT; ?>/admins/semester" class="sidebar__link <?php if($page=='semester'){echo 'actived';}?> ">Set semester</a>
                <a href="<?php echo URLROOT; ?>/admins/users" class="sidebar__link <?php if($page=='users'){echo 'actived';}?>">Users</a>
            </nav>
        </div>
    </div>
</section>

<script src="<?php echo URLROOT; ?>/public/javascript/adminsidebar.js"></script>