       <!-- Begin Page Content -->
       <div class="container-fluid">

         <!-- Page Heading -->
         <div class="d-sm-flex align-items-center justify-content-between mb-4">
           <h1 class="h3 mb-0 text-gray-800"><?= $title; ?></h1>
         </div>

         <!-- Content Row -->
         <div class="row">

           <div class="col">
             <div class="row">

               <!-- Area Chart -->
               <div class="col-xl-12 col-lg-7">
                 <div class="card shadow mb-4" style="min-height: 543px">
                   <!-- Card Header - Dropdown -->
                   <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                     <h6 class="m-0 font-weight-bold text-primary">Stamp your Attendance!</h6>
                   </div>
                   <!-- Card Body -->
                   <div class="card-body">
                     <?php if ($weekends == true) : ?>
                       <h1 class="text-center my-3">THANK YOU FOR THIS WEEK</h1>
                       <h5 class="card-title text-center mb-4 px-4">Have a Good Rest.</h5>
                       <p class="text-center text-primary pt-3">See You Monday!</p>
                       <div class="row">
                         <button disabled class="btn btn-danger btn-circle mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                           <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                         </button>
                       </div>
                     <?php else : ?>
                       <?php if ($in == false) : ?>
                         <?= form_open_multipart('attendance') ?>
                         <div class="row mb-3">
                           <div class="col-lg-5">
                             <label for="work_shift" class="col-form-label">Work Shift</label>
                             <input class="form-control" type="text" placeholder="<?= $account['shift']; ?>" value="<?= $account['shift']; ?>" name="work_shift" readonly>
                           </div>
                           <div class="col-lg-5 offset-lg-1">
                             <label for="location" class="col-form-label">Check In Location</label>
                             <select class="form-control" name="location" id="location">
                               <?php foreach ($location as $lct) : ?>
                                 <option value="<?= $lct['id'] ?>"><?= $lct['id']; ?> = <?= $lct['name'] ?></option>
                               <?php endforeach; ?>
                             </select>
                           </div>
                         </div>
                         <div class="row mb-3">
                           <div class="col-lg-5 text-center">
                             <div class="row col">
                               <label for="image" class="col-form-label float-left">Upload Your Image</label>
                             </div>
                             <img id="output" style="max-height: 252px;" class="img-thumbnail rounded mb-2" src="<?= base_url('images/attendance/default.png') ?>">
                             <input type="file" class="d-block" id=image name="image" accept="image/*" onchange="loadFile(event)">
                             <script>
                               var loadFile = function(event) {
                                 var output = document.getElementById('output');
                                 output.src = URL.createObjectURL(event.target.files[0]);
                                 output.onload = function() {
                                   URL.revokeObjectURL(output.src) // free memory
                                 }
                               };
                             </script>
                           </div>
                           <div class="col-lg-5 offset-lg-1 text-center">
                             <label for="notes" class="float-left">Notes</label>
                             <textarea maxlength="120" class="form-control mb-4" name="notes" id="notes" rows="3" style="resize: none;"></textarea>
                             <hr>
                             <button type="submit" class="btn btn-info btn-circle" style="font-size: 20px; width: 100px; height: 100px">
                               <i class="fas fa-fw fa-sign-in-alt fa-2x"></i>
                             </button>
                             <p class="text-center text-primary pt-3">Turn it in!</p>
                             <hr>
                           </div>
                         </div>
                         <?= form_close() ?>
                       <?php else : ?>
                         <h1 class="text-center my-3">THANK YOU FOR TODAY</h1>
                         <h5 class="card-title text-center mb-4 px-4">The world of business survives less on leadership skills and more on the commitment and dedication of passionate employees like you.<br>Thank you for your hard work.</h5>
                         <?php if ($disable == false) : ?>
                           <p class="text-center text-primary pt-3">Check Out!</p>
                           <div class="row">
                             <a href="<?= base_url('attendance/checkout') ?>" onclick="return confirm('Check out now? Make sure you are done with you work!')" class="btn btn-danger btn-circle mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                               <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                             </a>
                           <?php else : ?>
                             <p class="text-center text-primary pt-3">See You Tomorrow!</p>
                             <div class="row">
                               <button disabled class="btn btn-danger btn-circle mx-auto" style="font-size: 35px; width: 200px; height: 200px">
                                 <i class="fas fa-fw fa-sign-out-alt fa-2x"></i>
                               </button>
                             <?php endif; ?>
                             </div>
                           <?php endif; ?>
                         <?php endif; ?>
                           </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
           <!-- End  -->
         </div>
         <!-- /.container-fluid -->

       </div>
       <!-- End of Main Content -->