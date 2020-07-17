<?php
$page_nav = 'users';
include ('includes/header.php');
$users = User::find_all();
?>
<div class="container">
    <div class="row">
        <div class="col-12 mb-5">
            <h1 class="text-left">Homepagina: users</h1>
            <?php foreach ($users as $user): ?>
            <div class="border border-primary mb-4 rounded text-center">

                <div class="">
                    <div class="bg-primary text-white h3">
                        <?php echo $user->username ?></div>
                </div>
                <div class="">
                    <div class="">
                        First name: <?php echo $user->first_name ?></div>
                </div>
                <div class="">
                    <div class="">
                        Last name: <?php echo $user->last_name ?></div>
                </div>
                <div class="">
                    <div class="">
                        User-id: <?php echo $user->id ?></div>
                </div>
                <div class="">
                    <div class="">
                        <img style="max-width: 18rem" class="img-thumbnail" src="<?php echo 'admin'.DS.'img'.DS.'users'.DS.$user->user_image; ?>" alt="">

                    </div>
                </div>


            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php
include ('includes/footer.php');
?>
