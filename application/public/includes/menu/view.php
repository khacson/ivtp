 
 <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-classic" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-static" data-lg-device-layout="rd-navbar-static" data-md-stick-up-offset="46px" data-lg-stick-up-offset="46px">
            <div class="rd-navbar-top-panel-wrap">
              <div class="rd-navbar-top-panel">
                <div class="left-side">
                  <!-- Contact Info-->
                  <address class="contact-info text-left">
                    <div class="reveal-inline-block">
						<span class="unit-left ">
							<i class="fa fa-map-marker icon icon-sm" aria-hidden="true"></i>
						</span>
						<span class="unit-body">
							<span class="text-gray-lighter"><?=$finds->address;?></span>
						</span>
					</div>
					<div class="reveal-inline-block">
						<span class="unit-left ">
							 <i class="fa fa-clock-o icon icon-sm" aria-hidden="true"></i>
						</span>
						<span class="unit-body">
							<span class="text-gray-lighter"><?=$finds->work_time;?></span>
						</span>
					</div>
                    <div class="reveal-inline-block">
						<span class="unit-left ">
							<i class="fa fa-phone icon icon-sm " aria-hidden="true"></i>
						</span>
						<span class="unit-body">
							<span class="text-gray-lighter"><?=$finds->hotline;?></span>
						</span>
					</div>
                  </address>
                </div>
                <div class="right-side">
                  <ul class="list-inline list-inline-2 list-primary">
                    <li><a class="text-gray-lighter" href="<?=base_url();?>dang-nhap.html"><i class="icon icon-xs icon-circle fa fa-user text-gray-lighter" href="dangnhap.html"></i> Đăng nhập<a></li>
                    <li><a class="text-gray-lighter" href="<?=base_url();?>dang-ky.html"><i class="icon icon-xs icon-circle fa fa-edit text-gray-lighter" href="dangky.html"></i> Đăng ký</a></li>
                  </ul>
                </div>
              </div>
            </div>
            <div class="rd-navbar-inner">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-left-side">
                <div class="rd-navbar-panel">
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                  <!-- RD Navbar Brand-->
                  <div class="rd-navbar-brand"><a class="brand-name" href="<?=base_url();?>trang-chu.html"><img class="center-block" src="<?=base_url();?>files/logo/<?=$finds->logo;?>"  height="60" style="margin-top:-5px;" alt=""></a></div>
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-toggle-search-fixed veil-md reveal-tablet" data-rd-navbar-toggle=".rd-navbar-search-wrap-fixed"></button>
                  <!-- RD Navbar Toggle-->
                  <button class="rd-navbar-collapse-toggle veil-lg reveal-md-inline-block" data-rd-navbar-toggle=".rd-navbar-top-panel"><span></span></button>
                </div>
              </div>
              <div class="rd-navbar-right-side">
                <div class="rd-navbar-nav-wrap reveal-inline-block">
                  <!-- RD Navbar Nav-->
                  <ul class="rd-navbar-nav">
                    <li class="active"><a href="<?=base_url();?>trang-chu.html">Trang chủ</a></li>
                    <li><a href="<?=base_url();?>gioi-thieu.html">Giới thiệu</a> </li>
                    <li><a href="<?=base_url();?>xu-huong-thi-truong.html">Xu hướng thị trường</a>
                      <!-- RD Navbar Dropdown-->
					  <?php if (!empty($markettendCatalogs)) { ?>
                      <ul class="rd-navbar-dropdown">
						<?php foreach($markettendCatalogs as $item){?>
                        <li><a href="<?=base_url();?>xu-huong-thi-truong/<?=$item->max_id;?>.html"><?=$item->catalog_name;?></a></li>
						<?php }?>
                      </ul>
					  <?php }?>
                    </li>
					<li><a href="<?=base_url();?>tu-van.html">Tổ tư vấn độc lập</a> </li>
                    <li><a href="javascript:;">Danh mục đầu tư</a>
                      <!-- RD Navbar Dropdown-->
                      <ul class="rd-navbar-dropdown">
						<li><a href="<?=base_url();?>danh-muc-tang-truong.html">Danh mục tăng trưởng</a></li>
					    <?php foreach($investmentCatalogs as $item){?>
							<li><a href="<?=base_url();?>danh-muc-dau-tu/<?=$item->friendlyurl;?>.html"><?=$item->catalog_name;?></a></li>
						<?php }?>
                      </ul>
                    </li>
					<li><a href="<?=base_url();?>dich-vu.html">Dịch vụ</a></li>
                    <li><a href="<?=base_url();?>lien-he.html">Liên hệ</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </nav>
        </div>