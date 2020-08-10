
    <div class="mt-5 mb-5">
        <div class="text-center">
            <img src="<?=base_url('upload/h.png')?>">
            <h3 class="my-3 mb-5">ข่าวสารประชาสัมพันธ์</h3>
        </div>
        <div class="container">
        <?php foreach ($query as $key => $value) { ?>
            <div class="new_detsilsimg">
                <img src="<?=base_url('upload/news/').$value->img?>" class="img-fluid" alt="Responsive image">
            </div>
            <div class="card mb-3 mt-3 p-4">
                <div class="card-body">
                    <h2 class="card-title"><?php echo $value->name; ?></h2><hr class="mb-4">
                    <p class="card-text text-muted"><?php echo $value->description; ?></p>
                    <p class="card-text"><small class="text-muted"><i class="far fa-calendar-alt"></i> <?= dateTimeThai(date("d M Y H:i", strtotime($value->updateDate)));?></small></p>
                </div>
            </div>
        <?php } ?>
        </div>
    </div>

    