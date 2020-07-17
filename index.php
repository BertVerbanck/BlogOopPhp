<?php
$page_nav = 'home';
include ('includes/header.php');

$page = !empty($_GET['page'])? (int)$_GET['page'] : 1;
$items_per_page = 4;
$items_total_count = Photo::count_all();

$paginate = new Paginate($page, $items_per_page, $items_total_count);

$sql = "SELECT * FROM photo ";
$sql .= "LIMIT {$items_per_page} ";
$sql .= "OFFSET {$paginate->offset()}";

$photos = Photo::find_this_query($sql);
?>
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Homepagina: photos</h1>
            <?php foreach ($photos as $photo): ?>
                <div class="text-center">

                    <a href="photo.php?id=<?php echo $photo->id; ?>">
                        <div class="h3"><span class="bg-dark text-white rounded"> <?php echo $photo->title  ?> </span></div>
                        <img style="max-width: 18rem" src="<?php echo 'admin'.DS.$photo->picture_path(); ?>" alt="" class="img-thumbnail mb-5">

                    </a>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="row">
            <div class="col">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <?php

                        if ($paginate->has_previous()) {
                            echo "<li class='previous page-item'>
<a class='page-link' href='index.php?page={$paginate->previous()}'>&laquo;</a>
</li>";



                        }
                        for ($i = 1; $i <= $paginate->page_total(); $i++) {
                            if ($i == $paginate->current_page) {
                                echo "<li class='page-item active'><a class='page-link' href='index.php?page={$i}'> {$i} </a> </li>";
                            } else {
                                echo "<li class=''><a class='page-link' href='index.php?page={$i}'> {$i} </a> </li>";
                            }
                        }
                        if ($paginate->page_total() > 1) {
                            if ($paginate->has_next()) {
                                echo "<li class=''><a class='page-link' href='index.php?page={$paginate->next()}'>&raquo;</a></li>";
                            }
                        }
                        ?>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</div>
<?php
include ('includes/footer.php');
?>
