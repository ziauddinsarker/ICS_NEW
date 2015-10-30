
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-6">

            <div class="wrap">
              <div class="task-list">
                  <h3>To Do List</h3>
                <ul>
                    <?php foreach($todos as $todo){?>
                   <li>
                    <span><?php echo $todo->task;?></span>
                    <img id="<?php echo $todo->id;?>" class="delete-button" width="10px" src="<?php base_url() ?>assets/images/close.svg" />
                  </li>

                   <?php }?>
                </ul>
              </div>
              <form class="add-new-task" autocomplete="off">
                <input type="text" name="new-task" placeholder="Add a new item..." />
              </form>
            </div><!-- #wrap -->
            </div>


