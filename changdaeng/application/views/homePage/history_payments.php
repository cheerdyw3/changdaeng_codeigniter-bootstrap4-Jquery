
     <div class="container my-5">
          <div class="row">

     <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">หลักฐานการโอน</th>
                <th scope="col">วันที่โอน</th>
            </tr>
        </thead>
        <tbody>
        <?php if(count($query)==0){?>
          <tr>
               <th><td colspan="3" class="text-center">**** ไม่มีข้อมูล *****</td></th>
          </tr>
        <?php }else{ ?> 
        <?php foreach ($query as $key => $value) { ?>
            <tr>
                <th scope="row"><?php echo $key+1?></th>
                    <td><img src="<?=base_url('upload/slip/'.$value->slip)?>" class="img_listdt"></td>
                    <td><?= dateTimeThai(date("d M Y H:i", strtotime($value->createDate)));?></td>
                    
            </tr>
            <?php } ?> 
            <?php } ?> 
        </tbody>
     </table>
          </div>
     </div>

 