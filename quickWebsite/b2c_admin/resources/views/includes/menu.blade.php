<section class="main_content dashboard_part large_header_bg">
    <!-- menu  -->
    <div class="container-fluid no-gutters">
        <div class="row">
            <div class="col-lg-12 p-0 ">
                <div class="header_iner d-flex justify-content-between align-items-center">
                    <div class="sidebar_icon d-lg-none">
                        <i class="ti-menu"></i>
                    </div>
                    <!-- <label class="switch_toggle d-none d-lg-block" for="checkbox">
                            <input type="checkbox" id="checkbox">
                            <div class="slider round open_miniSide"></div>
                        </label> -->

                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="serach_field-area d-flex align-items-center">
                            <div class="search_inner">
                                <form action="#">
                                    <div class="search_field">
                                        <input type="text" placeholder="Search here...">
                                    </div>
                                    <button class="close_search"> <i class="ti-search"></i> </button>
                                </form>
                            </div>
                            <span class="f_s_14 f_w_400 ml_25 white_text text_white">Apps</span>
                        </div>

                    </div>
                    <div class="header_right d-flex justify-content-between align-items-center">
                        <div class="header_notification_warp d-flex align-items-center">
                            <!-- <li>
                                    <div class="serach_button">
                                        <i class="ti-search"></i>
                                        <div class="serach_field-area d-flex align-items-center">
                                            <div class="search_inner">
                                                <form action="#">
                                                    <div class="search_field">
                                                        <input type="text" placeholder="Search here..." >
                                                    </div>
                                                    <button class="close_search"> <i class="ti-search"></i> </button>
                                                </form>
                                            </div>
                                            <span class="f_s_14 f_w_400 ml_25 white_text text_white" >Apps</span>
                                        </div>
                                    </div>
                                </li> -->
                            <li>
                                <a class="bell_notification_clicker" href="#"> <img
                                        src="{{ asset('public/img/menu-icon/4.svg') }}" title="All Orders" alt="All Orders" name="All Orders">
                                    <!-- <div class="nav_title">
                                        <p>Orders</p>
                                    </div> -->
                                    <span>2</span>
                                </a>

                                <!-- Menu_NOtification_Wrap  -->
                               
                                <!--/ Menu_NOtification_Wrap  -->
                            </li>
                            <li>
                                <a class="" href="#"> <img
                                        src="{{ asset('public/img/menu-icon/9.svg') }}" title="Inventory" alt="Inventory" name="Inventory">
                                    <!-- <div class="nav_title">
                                        <p>Inventory</p>
                                    </div> -->
                                    <span>18</span>
                                </a>

                                <!-- Menu_NOtification_Wrap  -->
                                
                                <!--/ Menu_NOtification_Wrap  -->
                            </li>
                            <li>
                                <a class="bell_notification_clicker" href="#"> <img
                                        src="{{ asset('public/img/icon/bell.svg') }}" title="Notifications" alt="Notifications" name="Notifications">
                                    <!-- <div class="nav_title">
                                        <p>Inventory</p>
                                    </div> -->
                                    <span>18</span>
                                </a>

                                <!-- Menu_NOtification_Wrap  -->
                               
                                <!--/ Menu_NOtification_Wrap  -->
                            </li>
                         
                            <!-- <li>
                                <a class="CHATBOX_open" href="#"> <img src="{{ asset('public/img/icon/msg.svg') }}"
                                        alt=""> <span>2</span> </a>
                            </li> -->
                        </div>
                        <div class="profile_info">
                            <img src="{{ asset('public/img/client_img.png') }}" alt="#">
                            <div class="profile_info_iner">
                                <div class="profile_author_name">
                                    <p>Neurologist </p>
                                    <h5>Dr. Robar Smith</h5>
                                </div>
                                <div class="profile_info_details">
                                    <a href="#">My Profile </a>
                                    <a href="#">Settings</a>
                                    <a href="{{ url('logout') }}">Log Out </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ menu  -->