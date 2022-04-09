<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add or Update Users</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <form id="addform" method="POST" enctype="multipart/form-data">
                        <div class="modal-body">
                            <!-- Username -->
                            <label for="usernameinput" class="form-label">Username:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" class="form-control" id="usernameinput" name="username" placeholder="Enter Username" autocomplete="off" required/>
                            </div>        
                            
                            <!-- Email address -->
                            <label for="emailinput" class="form-label">Email address:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                <input type="email" class="form-control" id="emailinput" name="user_email" placeholder="Enter email address" autocomplete="off" required/>
                            </div>

                            <!-- Mobile Number -->
                            <label for="mobileinput" class="form-label">Mobile Number:</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="tel" class="form-control" id="mobileinput" name="user_mobile" placeholder="Enter Phone Number" autocomplete="off" required/>
                            </div>

                            <!-- Profile Image -->
                            <label for="inputFile" class="form-label">Profile Image:</label>
                            <div class="input-group mb-3">
                                <input type="file" class="form-control" id="inputFile" name="user_image" aria-describedby="inputFile" aria-label="Upload">
                                <!-- <button class="btn btn-outline-secondary" type="button" id="inputFile">Pick Image</button> -->
                            </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="submit" class="btn btn-success">Save changes</button>
                            <!-- 2 input hidden fields -->
                            <input type="hidden" name="action" value="adduser">
                            <input type="hidden" name="userid" id="userId" value=""> 
                        </div>
                      </form>
                    </div>
                  </div>
                </div>