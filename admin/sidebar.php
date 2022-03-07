<!-- Sidebar  -->
      <nav id="sidebar">
          <div class="sidebar-header">
            <h3>Admin Panel</h3>
          </div>
          <!-- ul/menu items start-->
          <ul class="list-unstyled components">
          <!-- homepage view dropdown-->
            <li class="<?php if($page=='home'){echo 'active';}?>">
              <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
              <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                  <a href="../index.php">Log In</a>
                </li>
              </ul>
            </li>

            <!-- member editing dropdown-->
            <li class="<?php if($page=='users'){echo 'active';}?>">
              <a href="#pageSubmenu1" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">
                Users</a>
              <ul class="collapse list-unstyled" id="pageSubmenu1">
                <li class="<?php if($page=='add_user'){echo 'active';}?>">
                  <a href="add_user.php">Add new user</a>
                </li>
                <li class="<?php if($page=='edit-users'){echo 'active';}?>">
                  <a href="edit-users.php">Edit existing user</a>
                </li>
              </ul>
            </li>

            <!-- film information editing dropdown-->
            <li class="<?php if($page=='products'){echo 'active';}?>">
              <a href="#pageSubmenu2" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Products</a>
              <ul class="collapse list-unstyled" id="pageSubmenu2">
                <li class="<?php if($page=='add_products'){echo 'active';}?>">
                  <a href="add_products.php">Add new product</a>
                </li>
                <li class="<?php if($page=='edit-products'){echo 'active';}?>">
                  <a href="edit-products.php">Edit existing product</a>
                </li>
                <li class="<?php if($page=='edit_product_images'){echo 'active';}?>">
                  <a href="edit_product_images.php">Edit Product Images</a>
                </li>
              </ul>
            </li>

             <!-- orders-->
      <li class="nav-item <?php if($page=='orders'){echo 'active';}?>">
      <a href="#pageSubmenu3" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Orders</a>
      <ul class="collapse list-unstyled" id="pageSubmenu3">
                <li class="<?php if($page=='orders'){echo 'active';}?>">
                  <a href="orders.php">View Orders</a>
                </li>
              </ul>
      </li>
      <!--/orders-->

          </ul>

          <ul class="list-unstyled CTAs">
            <li>
              <a href="logout.php" class="article">Log out</a>
            </li>
          </ul>
          </nav>
          <!-- SIDE NAV END-->