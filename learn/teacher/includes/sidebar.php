<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                   <?php $query=mysql_query("select uname from university where uemail='".$_SESSION['login']."'");
                  while($row=mysql_fetch_array($query)) 
                  {
                   ?> 
               <h5 class="centered"><?php echo htmlentities($row['uname']);?></h5>
                  <?php } ?>
              	  	<br/>   <br/>
                  <li class="sub-menu">
                      <a href="teacherhome.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="enrollstudents.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Enroll Students</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="enrollstudentlist.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Enroll Students List</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="assignsubject.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Subject Assign Students </span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="assignsubjectlist.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Subject Assign List </span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="addnewcourse.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Add Course</span>
                      </a>
                      
                  </li>
                  
                  <li class="sub-menu">
                      <a href="addedcourselist.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Added Course List</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Add Exam</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="examhome.php">Exam </a></li>
                          <li><a  href="examvideohome.php">Video Based Exam</a></li>
                        
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="addedexamlist.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Added Exam List</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="markevaluate.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Mark Evaluvation</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Assignment</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="addassignment.php">Add Assignment </a></li>
                          <li><a  href="assignmentlist.php">Added Assignment List </a></li>
                          <li><a  href="assmarks.php">Enter Mark & View </a></li>
                      </ul>
                  </li>
              
                  <li class="sub-menu">
                      <a href="uploadstudyvedios.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Upload Study Vedios</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="upvideolist.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Upload Study Vedios List</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="uploadstudymeterial.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Upload Study Meterials</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="updocculist.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Upload Study Meterials List</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="sendemail.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Send Email To Parents</span>
                      </a>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cogs"></i>
                          <span>Account Setting</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="profile.php">Profile</a></li>
                          <li><a  href="change-password.php">Change Password</a></li>
                        
                      </ul>
                  </li>
                  
                  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>