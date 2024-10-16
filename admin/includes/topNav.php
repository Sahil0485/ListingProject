<div class="apps-header navbar">
    <div class="apps-logo-block">
        <a href="index.php">
            <img src="images/logo.png" alt="img" class="img-responsive">
            <div class="logo-text-block">
                <h3 class="logo-text">Yellow<strong>Pages</strong></h3>
            </div>
        </a>
    </div>
    <div class="top-menu">
        <ul class="top-controller-icons pull-left">
            <li>
                <a id="showLeftPush" href="javascript:void(0)" class="toggolebtn">
                    <span class="ti-view-grid"></span>
                </a>
            </li>
            <li>
                <form class="searchbox">
                    <input type="search" placeholder="Search......" name="search" class="searchbox-input"
                        onkeyup="buttonUp();" required>
                    <input type="submit" class="searchbox-submit" value="">
                    <span class="searchbox-icon ti-search"></span>
                </form>
            </li>
        </ul>
        <ul class="nav navbar-nav">
            <!-- <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <img src="images/misc/lan1.png" alt="img">
                    English
                    <span class="ti-angle-down"></span>
                    <div class="ripple-container"></div>
                </a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="javascript:void(0)">
                            <img src="images/misc/lan4.png" alt="img">
                            UK
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="images/misc/lan2.png" alt="img">
                            German
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0)">
                            <img src="images/misc/lan3.png" alt="img">
                            Italy
                        </a>
                    </li>
                </ul>
            </li>
            <li class="dropdown icon-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <span class="badge badge-default warning-two-bg">8</span>
                    <div class="ripple-container"></div>
                </a>
                <ul class="dropdown-menu card-dropdown left">
                    <li>
                        <div class="drop-title">You have 4 new messages</div>
                    </li>
                    <li>
                        <div class="card-inner-block">
                            <a href="javascript:void(0)">
                                <div class="user-img">
                                    <img src="images/misc/avatar1.jpg" alt="user">
                                    <span class="profile-status"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Steven Smith</h5>
                                    <span class="mail-desc">Congratulation you win th</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)">
                                <div class="user-img">
                                    <img src="images/misc/avatar2.jpg" alt="user" class="img-circle">
                                    <span class="profile-status"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Robart John</h5>
                                    <span class="mail-desc">Hello! sir,we are glade to</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)">
                                <div class="user-img">
                                    <img src="images/misc/avatar2.jpg" alt="user" class="img-circle">
                                    <span class="profile-status"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Mike Danny</h5>
                                    <span class="mail-desc">There is no marcy form th</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                            </a>
                            <a href="javascript:void(0)">
                                <div class="user-img">
                                    <img src="images/misc/avatar1.jpg" alt="user">
                                    <span class="profile-status"></span>
                                </div>
                                <div class="mail-contnet">
                                    <h5>Steven Smith</h5>
                                    <span class="mail-desc">Congratulation you win th</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="drop-footer"><a href="mail-inbox.php">Check all mail</a></div>
                    </li>
                </ul>
            </li>
            <li class="dropdown icon-dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                    <span class="badge badge-default primary-bg">7</span>
                    <i class="fa fa-bell-o" aria-hidden="true"></i>
                </a>
                <ul class="dropdown-menu card-dropdown right">
                    <li>
                        <div class="drop-title">Notification</div>
                    </li>
                    <li>
                        <div class="card-inner-block notification-block">
                            <a href="javascript:void(0)">
                                <i class="notification-icon fa fa-clock-o info-bg"></i>
                                <div class="notification-details">
                                    <h5>Events</h5>
                                    <span class="mail-desc">Todayes 5 events still Remaning</span>
                                    <span class="time">9:30 AM</span>
                                </div>
                                <span class="time"></span>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="notification-icon fa fa-users primary-bg"></i>
                                <div class="notification-details">
                                    <h5>Meetings</h5>
                                    <span class="mail-desc">Todayes Meeting were cancle</span>
                                    <span class="time">10:30 AM</span>
                                </div>
                                <span class="time"></span>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="notification-icon fa fa-plane warning-two-bg"></i>
                                <div class="notification-details">
                                    <h5>Travel</h5>
                                    <span class="mail-desc">US Airline Departure time</span>
                                    <span class="time">5:30 PM</span>
                                </div>
                                <span class="time"></span>
                            </a>
                            <a href="javascript:void(0)">
                                <i class="notification-icon fa fa-pie-chart warning-bg"></i>
                                <div class="notification-details">
                                    <h5>Revenue</h5>
                                    <span class="mail-desc">Todayes Revenue Cross 2 crore</span>
                                    <span class="time">11:20 PM</span>
                                </div>
                                <span class="time"></span>
                            </a>
                        </div>
                    </li>
                    <li>
                        <div class="drop-footer"><a href="mail-inbox.php">Check all notification</a></div>
                    </li>
                </ul>
            </li> -->
            <li style="float: right;">
                <a href="./autherization/logout.php"
                    style="background-color: #e1e1e1;border-radius: 1rem;margin: 1.25rem;padding: 0.5rem;">
                    Log Out
                </a>
            </li>
        </ul>
    </div>
    <div class="clearfix"></div>
</div>