
     <div class="mt-5 mb-5">
          <div class="text-center">
               <img src="<?=base_url('upload/h.png')?>">
               <h3 class="my-3 mb-5">ข่าวสารประชาสัมพันธ์</h3>
          </div>
          <div class="container">
               <div class="row">
               <?php foreach ($query as $key => $value) { ?>
                    <div class="col-12">
                         <div class="card mb-3 dt_new bg-light">
                              <div class="row no-gutters m-3">
                                   <div class="col-md-4">
                                        <img src="<?=base_url('upload/news/').$value->img?>" class="card-img" alt="...">
                                   </div>
                                   <div class="col-md-8">
                                        <div class="card-body">
                                             <h4 class="card-title"><?php echo $value->name; ?></h4>
                                             <hr>
                                             <p class="card-text"><?php echo $value->description; ?></p>
                                             <p class="card-text">
                                                  <small class="text-muted"><i class="far fa-calendar-alt"></i> 
                                                       <?= dateTimeThai(date("d M Y H:i", strtotime($value->updateDate)));?>
                                                  </small>
                                                  
                                             </p>
                                             <a href="<?=base_url('main/new_detail/').$value->news_id?>"><button type="button" class="btn btn-warning">อ่านต่อ >></button></a>
                                        </div>
                                   </div>
                              </div>
                         </div>
                    </div>

               <?php } ?>
               </div>
          </div>
     </div>
     <div class="container mb-5">
          <ul class="pagination justify-content-center">
            <li class="page-item disabled">
              <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class="page-item active"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
              <a class="page-link" href="#">Next <i class="fas fa-angle-right"></i></a>
            </li>
          </ul>
     </div>
     