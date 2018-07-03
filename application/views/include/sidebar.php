<aside class="sidebar">
    <div class="sidebar-header">
        <span class="sidebar-header-name">Administrator</span>
        <span class="sidebar-header-icon"><i class="fa fa-lg fa-bars"></i></span>
    </div>
    
    <!--<div class="profile-photo"></div>-->
    
    <nav class="sidebar-nav">
        <ul class="metismenu" id="menu">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search" aria-describedby="basic-addon2">
              <span class="input-group-addon" id="basic-addon2"><i class="fa fa-fw fa-search"></i></span>
            </div>
            <li class="sidebar-heading">Dashboard</li>
            <li>
                <a href="#" aria-expanded="true">
                    <span class="sidebar-nav-item-icon fa fa-dashboard fa-lg"></span>
                    <span class="sidebar-nav-item">Dashboard</span>
                    <span class="fa arrow"></span>
                </a>
                <ul aria-expanded="true">
                    <li><a href="Welcome">Dashboard</a></li>
                    <li><a href="#">Manage Setting</a></li>
                    <li><a href="#">Create Page</a></li>
                    <li><a href="#">Add Product Feature</a></li>
                </ul>
            </li>
            <li class="sidebar-heading">Product</li>
            <li>
                <a href="#" aria-expanded="true">
                    <span class="sidebar-nav-item-icon fa fa-product-hunt fa-lg"></span>
                    <span class="sidebar-nav-item">Set Preliminary</span>
                    <span class="fa arrow"></span>
                </a>
                <ul aria-expanded="true">
                    <li><a href="<?=base_url()?>Category">Main Category</a></li>
                    <li><a href="<?=base_url()?>SubCategory">Sub Category</a></li>
                    <li><a href="<?=base_url()?>Feature">Product Features</a></li>
                    <li><a href="<?=base_url()?>ProductCategory">Product Category</a></li>
                    <li><a href="<?=base_url()?>Brand">Brands</a></li>
                </ul>
            </li>            
            
            
            <li>
                <a href="#" aria-expanded="true">
                    <span class="sidebar-nav-item-icon fa fa-gift fa-lg"></span>
                    <span class="sidebar-nav-item">Products</span>
                    <span class="fa arrow"></span>
                </a>
                <ul aria-expanded="true">
                    <li><a href="<?=base_url()?>Product">Product</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</aside>