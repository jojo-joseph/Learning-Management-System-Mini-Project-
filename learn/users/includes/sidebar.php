<aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="profile.php"><img src="assets/img/ui-sam.jpg" class="img-circle" width="60"></a></p>
                   <?php $query=mysql_query("select fullName from users where userEmail='".$_SESSION['login']."'");
                 while($row=mysql_fetch_array($query)) 
                {
                  ?> 
              	  <h5 class="centered"><?php echo htmlentities($row['fullName']);?></h5>
                  <?php } ?>
              	  	
                  <li class="mt">
                      <a href="studenthome.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Home</span>
                      </a>
                  </li>
                  
                  
                  <li class="sub-menu">
                      <a href="enrollnewcourse.php" >
                          <i class="fa fa-tasks"></i>
                          <span>Exams</span>
                      </a>
                      
                  </li>
                  <li class="sub-menu">
                      <a href="viewvedio.php" >
                          <i class="fa fa-book"></i>
                          <span>Video Based Exam </span>
                      </a>
                    </li>
                    <li class="sub-menu">
                      <a href="assignmenthome.php" >  
                          <i class="fa fa-tasks"></i>
                          <span>Upload Assignment </span>
                      </a>
                     </li> 
                  </li>
                  <li class="sub-menu">
                      <a href="assignmentmark.php" >  
                          <i class="fa fa-tasks"></i>
                          <span>Assignment Marks </span>
                      </a>
                     </li> 
                  </li>
                  <li class="sub-menu">
                      <a href="exammarks.php" >  
                          <i class="fa fa-tasks"></i>
                          <span>My Exam Marks </span>
                      </a>
                     </li> 
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
              
          </div>
      </aside>