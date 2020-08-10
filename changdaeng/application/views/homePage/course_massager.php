
      <div class="text-center mt-5 mb-5">
          <img src="<?=base_url('upload/h.png')?>">
          <h3 class="my-3 mb-5">จองคอร์สนวด</h3>
          <div class="container">
               <div class="row">
               <?php $login = $this->session->userdata('login'); ?>
               <?php $typeLogin = $this->session->userdata('type'); ?>
               <?php foreach ($query as $key => $value) { ?>
                <div class="card bg_course text-white mb-5 col-md-12">
                        <img src="<?php echo base_url('upload/courseMS');?>/<?php echo $value->img;?>" class="card-img" width="100%" height="100%">
                        <div class="card-img-overlay dt_course">
                            <h1 class="card-title wow fadeInUp" style="animation-delay: 0.1s;"><?php echo $value->course_name; ?></h1>
                            <p class="card-text wow fadeInUp" style="animation-delay: 0.3s;">
                              <?php echo $value->course_detail; ?>
                            </p><hr>
                            <?php if($typeLogin["type"]=="adviser"){?>
                              <h3>
                              <a href="<?=base_url('main/booking_detail_adviser/').$value->course_id?>" class="badge badge-warning">จองเลย</a>
                              </h3>
                            <?php }else{ ?>
                              <h3>
                                <a href="<?=base_url('main/booking_detail/').$value->course_id?>" class="badge badge-warning">จองเลย</a>
                              </h3>
                            <?php } ?>

                        </div>
                  </div>    
              <?php } ?>
               </div>
          </div>
     </div>